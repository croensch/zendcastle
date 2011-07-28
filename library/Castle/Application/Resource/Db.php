<?php
class Castle_Application_Resource_Db extends Zend_Application_Resource_Db
{
	/**
	 * Defined by Zend_Application_Resource_Resource
	 *
	 * @return Zend_Db_Adapter_Abstract|null
	 */
	public function init()
	{
		$options = $this->getOptions();
		if (isset($options['defaultMetadataCache'])) {
			$this->setDefaultMetadataCache($options['defaultMetadataCache']);
		}
		return parent::init();
	}
}