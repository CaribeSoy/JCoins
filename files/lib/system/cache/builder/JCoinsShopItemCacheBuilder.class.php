<?php
namespace wcf\system\cache\builder;


/**
 * Caches the shop items
 * 
 * @author         Joshua Rüsweg
 * @package        de.joshsboard.jcoins
 * @subpackage     system.cache.builder
 */
class JCoinsShopItemCacheBuilder extends \wcf\system\cache\builder\AbstractCacheBuilder {
        /**
         * @see wcf\system\cache\AbstractCacheBuilder::rebuild()
         */
        public function rebuild(array $parameters) {
                $list = new \wcf\data\jcoins\shop\item\JCoinsShopItemList(); 
		$list->readObjects();
		
                return $list->getObjects();
        }
}