<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Content Table Base
 *
 * @package     Joomla.Administrator
 * @subpackage  com_content
 * @since       3.1
 */
class ContentTableBase extends JTable
{
    /**
     * Constructor
     *
     * @param   JDatabaseDriver  $db  A database connector object
     *
     * @since   3.1
     */
    public function __construct($db)
    {
        parent::__construct('#__content_ucm_base', 'ucm_id', $db);
    }
}