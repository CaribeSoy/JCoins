<?php
// for update :)
$sql = "UPDATE wcf". WCF_N ."_user_jcoins_statement SET additionalData = ?";
$stmt = wcf\system\WCF::getDB()->prepareStatement($sql); 
$stmt->execute(array('a:0:{}'));