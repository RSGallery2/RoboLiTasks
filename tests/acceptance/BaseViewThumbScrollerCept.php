<?php 
$I = new WebGuy($scenario);
$I->wantTo('base check rsg2-thumb-scroller for picture ');

// Direct call
//$I->amOnPage('http://127.0.0.1/Joomla3x/index.php/rsg2-thumb-scroller');
$I->amOnPage('/index.php/rsg2-thumb-scroller');
$I->makeScreenshot('base-rsg2-thumb-scroller');

// Where i want to be
$I->see('RSG2 thumb scroller');

