<?php 
$I = new WebGuy($scenario);
$I->wantTo('base check plugin display image for picture ');

// Direct call
//$I->amOnPage('http://127.0.0.1/Joomla3x/index.php/single-image-plugin');
$I->amOnPage('/index.php/single-image-plugin');

// Where i want to be
$I->see('RSG2 ????');

