<?php 
$I = new AcceptanceTester($scenario);
//$I->wantTo('Install component, module or plugin from joomla temp folder');

$I->wantTo('find Link and click on it');


$I->amOnPage('/administrator/index.php');
$I->seeInTitle('Test_Joomla3x - Administration');

$I->fillField("#mod-login-username", 'TestAdmin');
$I->fillField("#mod-login-password", 'PassAdmin');
$I->click('Log in');
$I->see('Test_Joomla3x - Administration - Control Panel');


$I->amOnPage('/administrator/index.php?option=com_installer');
$I->seeInTitle('Test_Joomla3x - Administration - Extensions: Install');

$I->seeLink('Control Panel', 'index.php');

$I->pauseExecution();

//$I->seeInTitle('Test_Joomla3x - Administration');

//$I->amOnPage('/administrator');
//$I->amOnPage('joomla3x/administrator/index.php?option=com_installer');

//$this->getModule('PhpBrowser')->_savePageSource('.\page.html');
//$I->waitForText('Install', 30);
//$I->seeInTitle('Test_Joomla3x - Administration - Control Panel');
//$I->seeInTitle('Extension Manager');

//$I->seeLink('Install from Directory');
//$I->seeElement('a', ['href' => '#directory']);
////$I->seeLink('Install from Directory');
//$I->click(['Install from Directory'], '#directory');
$I->submitForm('#adminForm', [], 'submitbutton3');

$I->pauseExecution();
$I->seeElement('h4', 'message');

//// $I->see('Install from Directory');