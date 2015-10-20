<?php 
//$I = new AcceptanceTester($scenario);
$I = new WebGuy($scenario);
//$I->wantTo('Install component, module or plugin from joomla temp folder');

//$I->wantTo('find Link and click on it');
$I->wantTo('base check rsg2-latest-images for picture ');

// Direct call
//$I->amOnPage('http://127.0.0.1/Joomla3x/index.php/rsg2-latest-images');
$I->amOnPage('/index.php/rsg2-latest-images');

// Where i want to be
$I->see('RSG2 latest images');

