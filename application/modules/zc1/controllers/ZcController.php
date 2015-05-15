<?php

class Zc1_ZcController extends Zend_Controller_Action
{

	/**
	 * Test
	 */
	
    public function indexAction()
    {
    	$bootstrap = $this->getFrontController()->getParam('bootstrap');
    	
    	// cachemanager+
    	// date+
		$ZendDateHasCache = false;
		$rDateObject = new ReflectionClass('Zend_Date_DateObject');
		$rProperties = $rDateObject->getProperties(ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_STATIC);
		foreach ($rProperties as $rProperty) {
			if ($rProperty->name === '_cache') {
				$rProperty->setAccessible(true);
				$ZendDateHasCache = ($rProperty->getValue() instanceof Zend_Cache_Core);
			}
		}
		$this->view->ZendDateHasCache = $ZendDateHasCache ? 'yep' : 'nope';
    	// db+
    	$this->view->ZendDbAdapter = get_class($bootstrap->getResource('Db'));
    	$this->view->ZendDbTableHasDefaultMetadataCache = (Zend_Db_Table::getDefaultMetadataCache() instanceof Zend_Cache_Core ? 'yep' : 'nope');
    	// dojo+
    	// frontcontroller-
    	// layout-
    	// locale+
    	$this->view->ZendLocaleHasCache = Zend_Locale::hasCache() ? 'yep' : 'nope';
    	// log+
    	// mail-
    	// modules?
    	// multidb-
    	// navigation+
    	// router-
    	// session+
    	// translate+
    	// useragent?
    	$this->view->ZendHttpUserAgentDeviceHasFeatureMp3 = $bootstrap->getResource('UserAgent')->getDevice()->hasFeature('mp3') ? 'yep' : 'nope';
    	// view+ 
    }

	public function zf2Action()
	{
		$this->view->zf2 = $this->getInvokeArg('bootstrap')->getResource('zf2');
	}
}

