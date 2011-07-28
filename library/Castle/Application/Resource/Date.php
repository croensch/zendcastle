<?php
class Castle_Application_Resource_Date extends Zend_Application_Resource_ResourceAbstract
{
	/**
	 * Defined by Zend_Application_Resource_Resource
	 *
	 * @return void
	 */
	public function init()
	{
		$options = $this->getOptions();
		if (isset($options['cache'])) {
			$this->setCache($options['cache']);
		}
		return;
	}
	
	/**
     * Set the cache
     *
     * @param string|Zend_Cache_Core $cache
     * @return Zend_Application_Resource_Locale
     */
    public function setCache($cache)
    {
        if (is_string($cache)) {
            $bootstrap = $this->getBootstrap();
            if ($bootstrap instanceof Zend_Application_Bootstrap_ResourceBootstrapper
                && $bootstrap->hasPluginResource('CacheManager')
            ) {
                $cacheManager = $bootstrap->bootstrap('CacheManager')
                    ->getResource('CacheManager');
                if (null !== $cacheManager && $cacheManager->hasCache($cache)) {
                    $cache = $cacheManager->getCache($cache);
                }
            }
        }

        if ($cache instanceof Zend_Cache_Core) {
            Zend_Date::setOptions(array('cache' => $cache));
        }

        return $this;
    }
}