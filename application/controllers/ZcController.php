<?php

class ZcController extends Zend_Controller_Action
{

	public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$bootstrap = $this->getFrontController()->getParam('bootstrap');
    	
        // @see Castle_Application_Resource_Locale
        $this->view->ZendLocaleHasCache = Zend_Locale::hasCache() ? 'yep' : 'nope';
    	
    	// OK
        $this->view->ZendDb = get_class($bootstrap->getResource('db'));
        
        // @see Castle_Application_Resource_Db
        $this->view->ZendDbTableHasDefaultMetadataCache = (Zend_Db_Table::getDefaultMetadataCache() instanceof Zend_Cache_Core ? 'yep' : 'nope');
        
        // ?
        $this->view->ZendHttpUserAgentDeviceHasFeatureMp3 = $bootstrap->getResource('useragent')->getDevice()->hasFeature('mp3') ? 'yep' : 'nope';
            
    }

}

