<?php
class Castle_Application_Resource_Cachemanager extends Zend_Application_Resource_Cachemanager
{
	/**
	 * Defined by Zend_Application_Resource_Resource
	 *
	 * @return Zend_Cache_Manager
	 */
	public function init()
	{
		$options = $this->getOptions();
		if (isset($options['log'])) {
			$logger = Zend_Log::factory($options['log']);
			foreach( $options as &$writer ){
				$writer['frontend']['options']['logging'] = true;
				$writer['frontend']['options']['logger'] = $logger;
				$writer['backend']['options']['logging'] = true;
				$writer['backend']['options']['logger'] = $logger;
			}
		}
		$this->setOptions($options);
		return parent::init();
	}
}