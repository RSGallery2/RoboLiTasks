<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('WelcomeCept started');
$I->amOnPage('/'); 
$I->see('Test_Joomla3x');

// http://codeception.com/quickstart

?>