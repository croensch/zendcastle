<?php
class Castle_Application_Resource_Locale extends Zend_Application_Resource_Locale
{
	/**
	 * Defined by Zend_Application_Resource_Resource
	 *
	 * @return Zend_Locale
	 */
	public function init()
	{
		$options = $this->getOptions();
		if (isset($options['cache'])) {
			$this->setCache($options['cache']);
		}
		return parent::init();
	}
}