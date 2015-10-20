<?php 
$I = new WebGuy($scenario);
$I->wantTo('base check plugin display gallery for picture ');

// Direct call
//$I->amOnPage('http://127.0.0.1/Joomla3x/index.php/rsg2-latest-images');
$I->amOnPage('/index.php/gallery-view-plugin');

// Where i want to be
$I->see('Test RSG2 Gallery display plugin'');

