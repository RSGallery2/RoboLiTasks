<?php 
$I = new J_EmptyTester($scenario);
$I->wantTo('install component/module/plugin');

// Direct install URL call
$I->amOnPage('/administrator/index.php?option=com_installer');
/*
// Login first
$I->fillField("#mod-login-username", 'TestAdmin');
$I->fillField("#mod-login-password", 'PassAdmin');
$I->click('Log in');

// Where i want to be
$I->see('Extension Manager: Install');

// Move "directory tab" into foreground
$I->seeLink('Install from Directory');
$I->click('Install from Directory');

// -> find input button (Can be found twice)
// <div id="directory" 
//     <fieldset class="uploadform">
//         <div class="form-actions">
//             <input class="btn btn-primary" type="button" onclick="Joomla.submitbutton3()" value="Install">

$I->seeElement('#directory > fieldset > div > input');
$I->click('#directory > fieldset > div > input');
$I->see('was successful');
*/
