<?php 
$I = new WebGuy($scenario);
$I->wantTo('base check plugin display gallery for picture ');

// Direct call
//$I->amOnPage('http://127.0.0.1/Joomla3x/index.php/gallery-view-plugin');
$I->amOnPage('/index.php/gallery-view-plugin');
$I->makeScreenshot('base-gallery-view-plugin');

// Where i want to be
$I->see('Test RSG2 Gallery display plugin'');

