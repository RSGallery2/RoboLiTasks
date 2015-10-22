<?php 
$I = new WebGuy($scenario);
$I->wantTo('base check component for picture ');

//--- Component control panel ------------------------------

// Direct install URL call
//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsg2');
$I->amOnPage('/administrator/index.php?option=com_rsg2');

// Login first
$I->fillField("#mod-login-username", 'TestAdmin');
$I->fillField("#mod-login-password", 'PassAdmin');
$I->click('Log in');

// Where i want to be
$I->see('Control panel');
$I->makeScreenshot('FithRsg2Component.control-panel');

//----------------------------------------------------------
// Main sections 
//----------------------------------------------------------

//--- Galleries --------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsg2&view=galleries');
$I->amOnPage('/administrator/index.php?option=com_rsg2&view=galleries');
$I->see('Manage Galleries');
$I->makeScreenshot('FithRsg2Component.Galleries');

//--- Batch upload -----------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsg2&view=uploadBatch');
$I->amOnPage('/administrator/index.php?&view=uploadBatch');
$I->see('Batch upload');
$I->makeScreenshot('FithRsg2Component.Batch-upload');

//--- Upload -----------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsg2&view=galleries');
$I->amOnPage('/administrator/index.php?option=com_rsg2');
$I->see('Control panel');
$I->makeScreenshot('FithRsg2Component.');

//--- Images -----------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsg2&view=galleries');
$I->amOnPage('/administrator/index.php?option=com_rsg2');
$I->see('Control panel');
$I->makeScreenshot('FithRsg2Component.');

//--- Summary view -----------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsg2&view=galleries');
$I->amOnPage('/administrator/index.php?option=com_rsg2');
$I->see('Control panel');
$I->makeScreenshot('FithRsg2Component.');

//----------------------------------------------------------
// Configuration
//----------------------------------------------------------

//---  --------------------------------------------

//---  --------------------------------------------






