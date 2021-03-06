<?php
namespace wcf\page;

use wcf\data\jcoins\shop\item\JCoinsShopItemCache;
use wcf\page\AbstractPage;
use wcf\system\WCF;

/**
 * list all active shop items
 * 
 * @author	Joshua Rüsweg
 * @copyright	2013-2014 Joshua Rüsweg
 * @license	Creative Commons Attribution-ShareAlike 4.0 <https://creativecommons.org/licenses/by-sa/4.0/legalcode>
 * @package	de.joshsboard.jcoins
 * @subpackage	wcf.page
 */
class JCoinsShopPage extends AbstractPage {
	
	/**
	 * @see	wcf\page\AbstractPage::$enableTracking
	 */
	public $enableTracking = true;

	/**
	 * @see	\wcf\page\AbstractPage::$activeMenuItem
	 */
	public $activeMenuItem = 'wcf.jcoins.shop';
	
	/**
	 * @see	\wcf\page\AbstractPage::$neededModules
	 */
	public $neededModules = array('MODULE_JCOINS', 'MODULE_JCOINS_SHOP');

	/**
	 * list of premium-groups
	 * @var	\wcf\data\jCoins\premium\PremiumList
	 */
	public $items = null;

	public $neededPermissions = array('user.jcoins.canUseShop', 'user.jcoins.canUse');
	
	/**
	 * @see	\wcf\page\IPage::readData()
	 */
	public function readData() {
		parent::readData();

		$this->items = JCoinsShopItemCache::getInstance()->getActiveItems(); 
	}

	/**
	 * @see	\wcf\page\IPage::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();

		WCF::getTPL()->assign('items', $this->items);
	}

}