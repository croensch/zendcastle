<?php
class Castle_Application_Resource_Translate extends Zend_Application_Resource_Translate
{
	/**
	 * Defined by Zend_Application_Resource_Resource
	 *
	 * @return Zend_Translate
	 */
	public function init()
	{
		$options = $this->getOptions();
		if (isset($options['log'])) {
			$options['log'] = Zend_Log::factory($options['log']);
		}
		$this->setOptions($options);
		return parent::init();
	}
}