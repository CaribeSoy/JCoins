<?php
namespace wcf\system\cronjob;
use wcf\data\cronjob\Cronjob;
use wcf\system\WCF;

/**
 * Removes users from premium groups. 
 * 
 * @author      Joshua Rüsweg
 * @package	de.joshsboard.jcoins
 * @subpackage	system.cronjob
 * @category	Community Framework
 */
class JCoinsRemoveUserPremiumCronjob extends AbstractCronjob {
	/**
	 * @see	wcf\system\cronjob\ICronjob::execute()
	 */
	public function execute(Cronjob $cronjob) {
		parent::execute($cronjob);
		
		$sql = "SELECT	userID, premiumGroupID
			FROM	wcf".WCF_N."_user_to_group_premium
			WHERE until < ".TIME_NOW;
		$statement = WCF::getDB()->prepareStatement($sql);
		$statement->execute();

		while ($row = $statement->fetchArray()) {
                    $sql = "DELETE FROM wcf".WCF_N."_user_to_group_premium
                    WHERE premiumGroupID = ? AND userID = ?";
                    $statement = WCF::getDB()->prepareStatement($sql);
                    $statement->execute(array($row['premiumGroupID'], $row['userID']));
		}
	}
}