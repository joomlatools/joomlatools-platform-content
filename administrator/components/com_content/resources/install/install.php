<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class com_contentInstallerScript
{
    /**
     * Runs right after any installation action is preformed on the component.
     *
     * @param  string    $type   - Type of PostFlight action. Possible values are:
     *                           - * install
     *                           - * update
     *                           - * discover_install
     * @param  \stdClass $parent - Parent object calling object.
     *
     * @return void
     */
    function postflight($type, $parent)
    {
        if ($type == 'install')
        {
            $db = JFactory::getDbo();
            $query = <<<EOL
# Dumping data for table `assets`
INSERT INTO `assets` (`parent_id`, `lft`, `rgt`, `level`, `name`, `title`, `rules`)
VALUES
  ((SELECT `id` FROM (SELECT * FROM `assets`) AS `assets_table` WHERE `assets_table`.`name` = 'com_content'), (SELECT `rgt` FROM (SELECT * FROM `assets`) AS `assets_table` WHERE `assets_table`.`parent_id` = 1 ORDER BY `rgt` DESC LIMIT 1), (SELECT `rgt` + 1 FROM (SELECT * FROM `assets`) AS `assets_table` WHERE `assets_table`.`parent_id` = 1 ORDER BY `rgt` DESC LIMIT 1), 2, (SELECT CONCAT('com_content.category.', `id`) FROM `categories` WHERE `title` = 'Uncategorised' AND `extension` = 'com_content'), 'Uncategorised', '{}');
EOL;

            $db->setQuery($query);
            $db->execute();

            $query = <<<EOL
# Set the asset_id of Uncategorised category
UPDATE `categories` SET `asset_id` = (SELECT `id` FROM `assets` WHERE `name` = (SELECT CONCAT('com_content.category.', `categories_table`.`id`) FROM (SELECT * FROM `categories`)  AS `categories_table` WHERE `categories_table`.`title` = 'Uncategorised' AND `categories_table`.`extension` = 'com_content')) WHERE `title` = 'Uncategorised' AND `extension` = 'com_content';
EOL;

            $db->setQuery($query);
            $db->execute();
        }
    }
}