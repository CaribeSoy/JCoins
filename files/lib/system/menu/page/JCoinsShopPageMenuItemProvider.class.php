<?php
namespace wcf\system\menu\page; 

/**
 * PageMenuItemProvider for JCoins-Shop.
 * 
 * @author 	Joshua Rüsweg
 * @copyright	2013-2014 Joshua Rüsweg
 * @license	Creative Commons Attribution-ShareAlike 4.0 <https://creativecommons.org/licenses/by-sa/4.0/legalcode>
 * @package	de.joshsboard.jcoins
 * @subpackage	system.menu.page
 */
class JCoinsShopPageMenuItemProvider extends \wcf\system\menu\page\DefaultPageMenuItemProvider {
	
	/**
	 * Hides the button when there are no active items
	 * 
	 * @see	\wcf\system\menu\page\PageMenuItemProvider::isVisible()
	 */
	public function isVisible() {
		$items = \wcf\data\jcoins\shop\item\JCoinsShopItemCache::getInstance()->getActiveItems();
		
		if (!count($items)) {
			return false; 
		}
		
		return true;
	}
}