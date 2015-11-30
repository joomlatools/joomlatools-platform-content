<?php
/**
 * Joomlatools Platform - http://developer.joomlatools.org/platform
 *
 * @copyright	Copyright (C) 2015 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/joomlatools/joomlatools-platform for the canonical source repository
 */

//Provide a specialised version of JHelperTags found in /lib/libraries/cms/helper/tags.php
JLoader::register('JHelperTags'            , JPATH_ADMINISTRATOR . '/components/com_tags/helpers/tags.php');
JLoader::registerAlias('TagsHelperTags'    , 'JHelperTags');

JLoader::register('TagsTableObserverTags'  , JPATH_ADMINISTRATOR . '/components/com_tags/tables/observer/history.php');
JLoader::registerAlias('JTableObserverTags', 'TagsTableObserverTags');

JLoader::register('ContenthistoryHelperHistory'       , JPATH_ADMINISTRATOR . '/components/com_contenthistory/helpers/history.php');
JLoader::register('ContenthistoryTableObserverHistory', JPATH_ADMINISTRATOR . '/components/com_contenthistory/tables/observer/history.php');

JLoader::registerAlias('JHelperContenthistory'        , 'ContenthistoryHelperHistory');
JLoader::registerAlias('JTableObserverContenthistory' , 'ContenthistoryTableObserverHistory');

JLoader::register('JFormFieldTag'           , JPATH_ADMINISTRATOR . '/components/com_tags/models/fields/tag.php');
JLoader::register('JFormFieldContenthistory', JPATH_ADMINISTRATOR . '/components/com_contenthistory/models/fields/history.php');

JLoader::register('JFormFieldContenttype'   , JPATH_ADMINISTRATOR . '/components/com_content/models/fields/contenttype.php');
JLoader::register('JFormFieldOrdering'      , JPATH_ADMINISTRATOR . '/components/com_content/models/fields/ordering.php');
JLoader::register('JFormFieldModal_Article' , JPATH_ADMINISTRATOR . '/components/com_content/models/fields/modal/article.php');

JLoader::register('ContentTableContent'    , JPATH_ADMINISTRATOR . '/components/com_content/tables/content.php');
JLoader::register('ContentTableCore'       , JPATH_ADMINISTRATOR . '/components/com_content/tables/core.php');
JLoader::register('ContentTableTypes'      , JPATH_ADMINISTRATOR . '/components/com_content/tables/types.php');

JLoader::registerAlias('JTableContent'    , 'ContentTableContent');
JLoader::registerAlias('JTableCorecontent', 'ContentTableCore');
JLoader::registerAlias('JTableContenttype', 'ContentTableTypes');

JLoader::register('ContentTableUcmBase'    , JPATH_ADMINISTRATOR . '/components/com_content/tables/ucm/base.php');
JLoader::register('ContentTableUcmContent' , JPATH_ADMINISTRATOR . '/components/com_content/tables/ucm/content.php');
JLoader::register('ContentTableUcmType'    , JPATH_ADMINISTRATOR . '/components/com_content/tables/ucm/type.php');
JLoader::register('ContentTableUcm'        , JPATH_ADMINISTRATOR . '/components/com_content/tables/ucm/ucm.php');

JLoader::registerAlias('JUcmBase'   , 'ContentTableUcmBase');
JLoader::registerAlias('JUcmContent', 'ContentTableUcmContent');
JLoader::registerAlias('JUcmType'   , 'ContentTableUcmType');
JLoader::registerAlias('JUcm'       , 'ContentTableUcm');

JHtml::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_content/helpers/html');
JHtml::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_contenthistory/helpers/html');
JHtml::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_tags/helpers/html');