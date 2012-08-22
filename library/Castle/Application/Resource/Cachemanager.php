<?php
/**
 * Castle Framework
 * 
 * @link      http://github.com/croensch/zendcastle
 * @copyright 2011-2012 Christoph Roensch
 * @license   Simplified BSD License
 */

/**
 * Cache Manager resource
 * 
 *  - provides a logger instance to the cachemanager
 * 
 * @category   Castle
 * @package    Castle_Application
 * @subpackage Resource
 */
class Castle_Application_Resource_Cachemanager extends Zend_Application_Resource_Cachemanager
{
	/**
	 * @var Zend_Log
	 */
	protected $_logger;
	
	/**
	 * Initialize Cache_Manager
	 *
	 * @return Zend_Cache_Manager
	 */
	public function init()
	{
		if( $this->_logger ){
			foreach( $this->_options as &$templateOptions ){
				$templateOptions['frontend']['options']['logger'] = $this->_logger;
				$templateOptions['backend']['options']['logger'] = $this->_logger;
			}
		}
		
		return parent::init();
	}
	
	/**
     * Set the logger
     * 
     * @param array|Zend_Log $log
     * @return Castle_Application_Resource_Cachemanager
     */
	public function setLogger($logger)
	{
		if( is_array($logger) ){
			$logger = Zend_Log::factory($logger);
		}
		
		if( $logger instanceof Zend_Log ){
			$this->_logger = $logger;
		}
		
		return $this;
	}
}