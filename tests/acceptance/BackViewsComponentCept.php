<?php 
$I = new WebGuy($scenario);
$I->wantTo('back view main component for picture ');

//--- Component control panel ------------------------------

// Direct install URL call
//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2');

// Login first
$I->fillField("#mod-login-username", 'TestAdmin');
$I->fillField("#mod-login-password", 'PassAdmin');
$I->click('Log in');

// Where i want to be
$I->makeScreenshot('Component.Control-panel');
$I->see('RSG2 Control panel');

//----------------------------------------------------------
// Main sections 
//----------------------------------------------------------

//--- Galleries --------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2&rsgOption=galleries');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2&rsgOption=galleries');
$I->makeScreenshot('Component.Galleries');
$I->see('Manage Galleries');

//--- Batch upload -----------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2&rsgOption=images&task=batchupload');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2&rsgOption=images&task=batchupload');
$I->makeScreenshot('Component.Batch-upload');
$I->see('Batch upload');

//--- Upload -----------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2&rsgOption=images&task=upload');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2&rsgOption=images&task=upload');
$I->makeScreenshot('Component.Upload');
$I->see('Upload');

//--- Images -----------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2&rsgOption=images');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2&rsgOption=images');
$I->makeScreenshot('Component.Images');
$I->see('Manage Images');

//----------------------------------------------------------
// Configuration
//----------------------------------------------------------

//--- General -----------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2&rsgOption=config&task=showConfig');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2&rsgOption=config&task=showConfig');
$I->makeScreenshot('Component.Configuration.General');
$I->see('General Settings');

//--- Images -----------------------------------------------

/*
<ul id="ID-Tabs-J31-GroupTabs" class="nav nav-tabs">
	<li class="active">
		<a data-toggle="tab" href="#tab1_j31_id">General</a>
	</li>
	<li class="">
		<a data-toggle="tab" href="#tab2_j31_id">Images</a>
	</li>
	<li class="">
		<a data-toggle="tab" href="#tab3_j31_id">Display</a>
	</li>
	<li class="">
		<a data-toggle="tab" href="#tab4_j31_id">My Galleries</a>
	</li>
</ul>
*/

// <a data-toggle="tab" href="#tab2_j31_id">Images</a>
$I->click('#ID-Tabs-J31-GroupTabs > li > a[href="#tab2_j31_id"]');
$I->makeScreenshot('Component.Configuration.Images');

//--- Display -----------------------------------------------
// <a data-toggle="tab" href="#tab3_j31_id">Display</a>
$I->click('#ID-Tabs-J31-GroupTabs > li > a[href="#tab3_j31_id"]');
$I->makeScreenshot('Component.Configuration.Display');

//--- My Galleries -----------------------------------------------
// <a data-toggle="tab" href="#tab4_j31_id">My Galleries</a>
$I->click('#ID-Tabs-J31-GroupTabs > li > a[href="#tab4_j31_id"]');
$I->makeScreenshot('Component.Configuration.MyGalleries');


//--- Maintenance --------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2&rsgOption=maintenance');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2&rsgOption=maintenance');
$I->makeScreenshot('Component.Maintenance');
$I->see('RSGallery2 Maintenance');

//--- Template Manager --------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2&rsgOption=installer');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2&rsgOption=installer');
$I->makeScreenshot('Component.TemplateManager');
$I->see('RSGallery2 Template Manager');

//--- Config Raw --------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2&task=config_rawEdit');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2&task=config_rawEdit');
$I->makeScreenshot('Component.ConfigRaw');
$I->see('Configuration Raw Edit');

//--- Config View --------------------------------------------

//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_rsgallery2&task=config_dumpVars');
$I->amOnPage('/administrator/index.php?option=com_rsgallery2&task=config_dumpVars');
$I->makeScreenshot('Component.ConfigView');
$I->see('Configuration Variables');





