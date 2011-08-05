<?php

class ZcController extends Zend_Controller_Action
{

	/**
	 * Test
	 */
	
    public function indexAction()
    {
    	$bootstrap = $this->getFrontController()->getParam('bootstrap');
    	
    	// cachemanager+
    	// date+
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
}

