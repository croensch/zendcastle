<?php
/**
 * Castle Framework
 * 
 * @link      http://github.com/croensch/zendcastle
 * @copyright 2011-2012 Christoph Roensch
 * @license   Simplified BSD License
 */

/**
 * Translate resource
 * 
 *  - provides a log instance to the translator
 * 
 * @category   Castle
 * @package    Castle_Application
 * @subpackage Resource
 */
class Castle_Application_Resource_Translate extends Zend_Application_Resource_Translate
{
	/**
	 * @var Zend_Log
	 */
	protected $_log;
	
	/**
	 * Initialize Translate
	 *
	 * @return Zend_Translate
	 */
	public function init()
	{
		if( $this->_log ){
			$this->_options['log'] = $this->_log;
		}
		
		return parent::init();
	}
	
	/**
     * Set the log
     * 
     * @param array $log
     * @return Castle_Application_Resource_Translate
     */
	public function setLog($log)
	{
		if( is_array($log) ){
			$log = Zend_Log::factory($log);
		}
		
		if( $log instanceof Zend_Log ){
			$this->_log = $log;
		}
		
		return $this;
	}
}