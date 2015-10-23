<?php 
$I = new WebGuy($scenario);
$I->wantTo('base check modules and plugins for images');

//--- Component control panel ------------------------------

// Direct mdules URL call
//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_modules');
$I->amOnPage('/administrator/index.php?option=com_modules');

// Login first
$I->fillField("#mod-login-username", 'TestAdmin');
$I->fillField("#mod-login-password", 'PassAdmin');
$I->click('Log in');

//----------------------------------------------------------
// Modules
//----------------------------------------------------------

// Where i want to be
$I->makeScreenshot('Modules.SelectionPage');
$I->see('Modules');

//--- Image wall ----------------------------------------------

$I->click('RSGallery2 Image Wall module');
$I->makeScreenshot('Modules.ImageWall.Module');
// I see ...
$I->click('Menu Assignment');
$I->makeScreenshot('Modules.ImageWall.ModuleAssignment');
$I->click('Module Permissions');
$I->makeScreenshot('Modules.ImageWall.ModulePermissions');
$I->click('Advanced');
$I->makeScreenshot('Modules.ImageWall.Advanced');
$I->click('Close');

$I->amOnPage('/administrator/index.php?option=com_modules');

//--- Latest Images  ----------------------------------------------

$I->click('RSGallery2 Latest Images module ');
$I->makeScreenshot('Modules.LatestImages.Module');
$I->click('Menu Assignment');
$I->makeScreenshot('Modules.LatestImages.ModuleAssignment');
$I->click('Module Permissions');
$I->makeScreenshot('Modules.LatestImages.ModulePermissions');
$I->click('Advanced');
$I->makeScreenshot('Modules.LatestImages.Advanced');
$I->click('Close');

$I->amOnPage('/administrator/index.php?option=com_modules');

//--- Thumbnail scroller ----------------------------------------------

$I->click('RSGallery2 thumbnail scroller module ');
$I->makeScreenshot('Modules.ThumbnailScroller.Module');
$I->click('Menu Assignment');
$I->makeScreenshot('Modules.ThumbnailScroller.ModuleAssignment');
$I->click('Module Permissions');
$I->makeScreenshot('Modules.ThumbnailScroller.ModulePermissions');
$I->click('Advanced');
$I->makeScreenshot('Modules.ThumbnailScroller.Advanced');
$I->click('Close');

$I->amOnPage('/administrator/index.php?option=com_modules');

//--- Ransdom images ----------------------------------------------

$I->click('RSGallery2 Random Images module ');
$I->makeScreenshot('Modules.RandomImages.Module');
$I->click('Menu Assignment');
$I->makeScreenshot('Modules.RandomImages.ModuleAssignment');
$I->click('Module Permissions');
$I->makeScreenshot('Modules.RandomImages.ModulePermissions');
$I->click('Advanced');
$I->makeScreenshot('Modules.RandomImages.Advanced');
$I->click('Close');

$I->amOnPage('/administrator/index.php?option=com_modules');

//--- Latest galleries ----------------------------------------------

$I->click('RSGallery2 Latest Galleries module ');
$I->makeScreenshot('Modules.LatestGalleries.Module');
$I->click('Menu Assignment');
$I->makeScreenshot('Modules.LatestGalleries.ModuleAssignment');
$I->click('Module Permissions');
$I->makeScreenshot('Modules.LatestGalleries.ModulePermissions');
$I->click('Advanced');
$I->makeScreenshot('Modules.LatestGalleries.Advanced');
$I->click('Close');

$I->amOnPage('/administrator/index.php?option=com_modules');

//----------------------------------------------------------
// Plugins
//----------------------------------------------------------

// Direct mdules URL call
//$I->amOnPage('http://127.0.0.1/Joomla3x/administrator/index.php?option=com_plugins');
$I->amOnPage('/administrator/index.php?option=com_plugins');

// Where i want to be
$I->makeScreenshot('Plugins.SelectionPage');
$I->see('Plugins');

//--- Single image ----------------------------------------------

$I->click('RSGallery2 Single Image Display');
$I->makeScreenshot('Plugins.SingleImageDisplay.Plugin');
$I->click('Description');
$I->makeScreenshot('Plugins.SingleImageDisplay.description');
$I->click('Close');

$I->amOnPage('/administrator/index.php?option=com_plugins');

//--- Gallery display ----------------------------------------------

$I->click('RSGallery2 Gallery Display');
$I->makeScreenshot('Plugins.GalleryDisplay.Plugin');
$I->click('Description');
$I->makeScreenshot('Plugins.GalleryDisplay.description');
$I->click('Close');







