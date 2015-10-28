<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('WelcomeCept started');
$I->amOnPage('/'); 
$I->see('Joomla3xEmpty');

// http://codeception.com/quickstart

?>