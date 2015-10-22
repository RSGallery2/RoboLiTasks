<?php 
$I = new WebGuy($scenario);
$I->wantTo('base check rsg2-random-images for picture ');

// Direct call
//$I->amOnPage('http://127.0.0.1/Joomla3x/index.php/rsg2-random-images');
$I->amOnPage('/index.php/rsg2-random-images');
$I->makeScreenshot('base-rsg2-random-images');

// Where i want to be
$I->see('RSG2 random images');

