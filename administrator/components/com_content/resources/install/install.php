<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class com_contentInstallerScript
{
    /**
     * This method is called after a component is installed.
     *
     * @param  \stdClass $parent - Parent object calling this method.
     *
     * @return void
     */
    public function install($parent)
    {
        $db = JFactory::getDbo();
        $query = <<<EOL

# Dumping data for table `assets`
INSERT INTO `assets` (`parent_id`, `lft`, `rgt`, `level`, `name`, `title`, `rules`)
VALUES
  ((SELECT `id` FROM (SELECT * FROM `assets`) AS `assets_table` WHERE `name` = 'com_content'), (SELECT `rgt` FROM (SELECT * FROM `assets`) AS `assets_table` WHERE `parent_id` = 1 ORDER BY `rgt` DESC LIMIT 1), (SELECT `rgt` + 1 FROM (SELECT * FROM `assets`) AS `assets_table` WHERE `parent_id` = 1 ORDER BY `rgt` DESC LIMIT 1), 2, (SELECT CONCAT('com_content.category.', `id`) FROM `categories` WHERE `title` = 'Uncategorised' AND `extension` = 'com_content'), 'Uncategorised', '{}');

# Set the asset_id of Uncategorised category
UPDATE `categories` SET `asset_id` = (SELECT `id` FROM `assets` WHERE `name` = (SELECT CONCAT('com_content.category.', `id`) FROM (SELECT * FROM `categories`)  AS `categories_table` WHERE `categories_table`.`title` = 'Uncategorised' AND `categories_table`.`extension` = 'com_content')) WHERE `title` = 'Uncategorised' AND `extension` = 'com_content';

EOL;
        $db->setQuery($query);
        $db->execute();
    }
}