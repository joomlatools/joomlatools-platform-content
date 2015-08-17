<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_contenthistory
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('ContenthistoryHelper'        , __DIR__ . '/helpers/contenthistory.php');
JLoader::register('ContenthistoryHelperHistory' , __DIR__ . '/helpers/history.php');

$controller = JControllerLegacy::getInstance('Contenthistory', array('base_path' => JPATH_COMPONENT_ADMINISTRATOR));
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
