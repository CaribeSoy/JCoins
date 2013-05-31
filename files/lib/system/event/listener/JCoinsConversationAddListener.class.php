<?php
namespace wcf\system\event\listener;
use wcf\system\event\IEventListener;
use wcf\data\jCoins\statement\StatementAction;

/**
 * add jcoins on create an conversation
 * 
 * @author	Joshua Rüsweg
 * @package	de.joshsboard.jcoins
 */
class JCoinsConversationAddListener implements IEventListener {
	/**
	 * @see	\wcf\system\event\IEventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		if (!MODULE_CONVERSATION || !MODULE_JCOINS || JCOINS_RECEIVECOINS_CREATECONVERSATION == 0) return;
		if ($eventObj->getActionName() != 'create') return; 
		
		$this->statementAction = new StatementAction(array(), 'create', array(
			'data' => array(
				'reason' => 'wcf.jCoins.statement.conversationadd.recive',
				'sum' => JCOINS_RECEIVECOINS_CREATECONVERSATION, 
                        ), 
                        'changeBalance' => 1
		));
                $this->statementAction->validateAction();
		$this->statementAction->executeAction();
	}
}