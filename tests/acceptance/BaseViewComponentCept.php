<?php 
$I = new WebGuy($scenario);
$I->wantTo('base check component for picture ');

// Direct call
//$I->amOnPage('http://127.0.0.1/Joomla3x/index.php/gallery-view-plugin');
$I->amOnPage('/index.php');
$I->makeScreenshot('base-component-galleries');

// Where i want to be
//$I->see('Test RSG2 Gallery display plugin'');

