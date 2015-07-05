<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_tags
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Contenthistory Table Observer
 *
 * @package     Joomla.Administrator
 * @subpackage  com_tags
 * @since       3.2
 */
class ContenthistoryTableObserverHistory extends JTableObserver
{
	/**
	 * Helper object for storing and deleting version history information associated with this table observer
	 *
	 * @var    ContenthistoryHelperHistory
	 * @since  3.2
	 */
	protected $contenthistoryHelper;

	/**
	 * The pattern for this table's TypeAlias
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $typeAliasPattern = null;


	/**
	 * Creates the associated observer instance and attaches it to the $observableObject
	 * Creates the associated content history helper class instance
	 * $typeAlias can be of the form "{variableName}.type", automatically replacing {variableName} with table-instance variables variableName
	 *
	 * @param   JObservableInterface  $observableObject  The subject object to be observed
	 * @param   array                 $params            ( 'typeAlias' => $typeAlias )
	 *
	 * @return  ContenthistoryTableObserverHistory
	 *
	 * @since   3.2
	 */
	public static function createObserver(JObservableInterface $observableObject, $params = array())
	{
		$typeAlias = $params['typeAlias'];

		$observer = new self($observableObject);

		$observer->contenthistoryHelper = new ContenthistoryHelperHistory($typeAlias);
		$observer->typeAliasPattern = $typeAlias;

		return $observer;
	}

	/**
	 * Post-processor for $table->store($updateNulls)
	 *
	 * @param   boolean  &$result  The result of the load
	 *
	 * @return  void
	 *
	 * @since   3.2
	 */
	public function onAfterStore(&$result)
	{
		if ($result)
		{
			$this->parseTypeAlias();
			$aliasParts = explode('.', $this->contenthistoryHelper->typeAlias);

			if (JComponentHelper::getParams($aliasParts[0])->get('save_history', 0))
			{
				$this->contenthistoryHelper->store($this->table);
			}
		}
	}

	/**
	 * Pre-processor for $table->delete($pk)
	 *
	 * @param   mixed  $pk  An optional primary key value to delete.  If not set the instance property value is used.
	 *
	 * @return  void
	 *
	 * @since   3.2
	 * @throws  UnexpectedValueException
	 */
	public function onBeforeDelete($pk)
	{
		$this->parseTypeAlias();
		$aliasParts = explode('.', $this->contenthistoryHelper->typeAlias);

		if (JComponentHelper::getParams($aliasParts[0])->get('save_history', 0))
		{
			$this->parseTypeAlias();
			$this->contenthistoryHelper->deleteHistory($this->table);
		}
	}

	/**
	 * Internal method
	 * Parses a TypeAlias of the form "{variableName}.type", replacing {variableName} with table-instance variables variableName
	 * Storing result into $this->contenthistoryHelper->typeAlias
	 *
	 * @return  void
	 *
	 * @since   3.2
	 */
	protected function parseTypeAlias()
	{
		$this->contenthistoryHelper->typeAlias = preg_replace_callback('/{([^}]+)}/',
			function($matches)
			{
				return $this->{$matches[1]};
			},
			$this->typeAliasPattern
		);
	}
}
