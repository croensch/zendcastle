<?php
/**
 * Castle Framework
 * 
 * @link      http://github.com/croensch/zendcastle
 * @copyright 2011-2012 Christoph Roensch
 * @license   Simplified BSD License
 */

/**
 * Date resource
 * 
 *  - provides a cache instance to any date
 * 
 * @category   Castle
 * @package    Castle_Application
 * @subpackage Resource
 */
class Castle_Application_Resource_Date extends Zend_Application_Resource_ResourceAbstract
{
	/**
	 * Defined by Zend_Application_Resource_Resource
	 *
	 * @return void
	 */
	public function init()
	{
	}
	
	/**
     * Set the cache
     * 
     * @see Zend_Application_Resource_Locale
     *
     * @param string|Zend_Cache_Core $cache
     * @return Castle_Application_Resource_Date
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