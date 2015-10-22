<?php 
$I = new WebGuy($scenario);
$I->wantTo('base check component backend pictures');



// Direct call
//$I->amOnPage('http://127.0.0.1/Joomla3x/index.php/galleries');
$I->amOnPage('/index.php/galleries');
$I->makeScreenshot('base-component-galleries');

// Where i want to be
//$I->see('RSG2 latest galleries');

