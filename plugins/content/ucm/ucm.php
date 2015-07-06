<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.joomla
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * UCM Content Plugin
 *
 * @package     Joomla.Plugin
 * @subpackage  Content.joomla
 * @since       1.6
 */
class PlgContentUcm extends JPlugin
{
	/**
	 * Change the state in core_content if the state in a table is changed
	 *
	 * @param   string   $context  The context for the content passed to the plugin.
	 * @param   array    $pks      A list of primary key ids of the content that has changed state.
	 * @param   integer  $value    The value of the state that the content has been changed to.
	 *
	 * @return  boolean
	 *
	 * @since   3.1
	 */
	public function onContentChangeState($context, $pks, $value)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select($db->quoteName('core_content_id'))
			->from($db->quoteName('#__content_ucm_core'))
			->where($db->quoteName('core_type_alias') . ' = ' . $db->quote($context))
			->where($db->quoteName('core_content_item_id') . ' IN (' . $pksImploded = implode(',', $pks) . ')');
		$db->setQuery($query);
		$ccIds = $db->loadColumn();

		$cctable = new ContentTableCore($db);
		$cctable->publish($ccIds, $value);

		return true;
	}
}
