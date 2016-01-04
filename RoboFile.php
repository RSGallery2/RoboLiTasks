<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
use Robo\Common\TaskIO;
use Symfony\Component\Finder\Finder;
  
require_once './vendor/autoload.php';
  
class RoboFile extends \Robo\Tasks
//class RoboFile extends \Robo\Task\BaseTask
{
//	use Check4ExistingIndexHtmlFile;
 
    // define public methods as commands
    function hello($world)
    {
        $this->say("Hello, $world");
    }
	
	public $AllProjectsFolderNames = [
		'RSGallery2_Module_LatestGalleries', 
		'RSGallery2_Module_LatestImages', 
		'RSGallery2_Module_RandomImages', 
		'RSGallery2_Module_ThumbScroller', 
		'RSGallery2_Plugin_DisplayGallery', 
		'RSGallery2_Plugin_DisplayImage',
		'RSGallery2_Module_ImageWall', 
		'RSGallery2_Component'
		];
	
	public $AllProjects = [
		'LatestGalleries', 
		'LatestImages', 
		'RandomImages', 
		'ThumbScroller', 
		'ImageWall', 
		'Component',
		'DisplayGallery', 
		'DisplayImage'
		];
	
	//       $this->_exec("java -jar $seleniumPath > selenium-errors.log 2>selenium.log &"); 
	public $cmdSelenium = 'java -jar ..\SeleniumServer\selenium-server-standalone-2.48.1.jar > selenium-errors.log 2&>';
	
    /**
     * 
     * @description Launch selenium web server
     */ 	
	public function LaunchSelenium ()
	{
		// launches Selenium server
		$this->taskExec($cmdSelenium)
			->background()
			->run();
	}	
		
    /**
     * 
     * @description 
     */ 	
	public function CreateAllProjectZips	()
	{
        $this->say("CreateAllProjectZips");

		// All folder names
		foreach ($this->AllProjectsFolderNames as $PrjFolderName) {
			$this->DevCreateProjectZip ($PrjFolderName);
		}
	}

	/**	
     * 
     * @description Creates zip file of project
	*/
	public function DevCreateProjectZip ($prjName)	
	{
        $this->say("DevCreateProjectZip not finished");
		
		$PrjPath ='..\\' . $prjName;
		
		// Does source exist ?
		if (! is_dir($PrjPath)) {
			$ErrorOut = "!!! \$PrjPath= '" . $PrjPath . "' is not existing ";
			$this->say($ErrorOut);
			
			return Robo\Result::error($this, $ErrorOut);
		}
		
		$this->TaskCheck4ExistingIndexHtmlFile ($Path);	
	}
	
    /**
     * 
     * @description 
     */ 	
	function TestCodeceptAvailable ()	
	{
        $this->say("Check for codecept running");

        $this->say("CODECEPTION RELEASE: ".\Codeception\Codecept::VERSION);
		
		$this->taskCodecept()
			->suite('acceptance')
			->test('WelcomeCept')
			->arg('--steps')
			->arg('--debug')
			->run()
			->stopOnFail();		
	}
	
    /**
     * 
     * @description 
     */ 	
	function CreateProjectBaseView ($Project='DisplayGallery')	
	{
        $this->say("Create base view for project ".$Project);

//        $this->say("CODECEPTION RELEASE: ".\Codeception\Codecept::VERSION);
		$BaseViewName = 'BaseView'.$Project.'Cept.php';
		$this->taskCodecept()
			->suite('acceptance')
			->test($BaseViewName)
			->arg('--steps')
			->arg('--debug')
			->run()
			->stopOnFail();		
	}
	
    /**
     * 
     * @description Use for back views of component itself
     */ 	
	function CreateProjectBackViews ($Project='Component')	
	{
        $this->say("Create back views for project ".$Project);

//        $this->say("CODECEPTION RELEASE: ".\Codeception\Codecept::VERSION);
		$BaseViewName = 'BackViews'.$Project.'Cept.php';		
		$this->taskCodecept()
			->suite('acceptance')
			->test($BaseViewName)
			->arg('--steps')
			->arg('--debug')
			->run()
			->stopOnFail();		
	}
	

    /**
     * 
     * @description does not create component back views . -> see CreateProjectBackViews for component
     */ 	
	function CreateAllProjectBackViews ()	
	{
        $this->say("Create all back views for modules/plugins ");

		$this->taskCodecept()
			->suite('acceptance')
			->test('BackViewsAllModulesCept')
			->arg('--steps')
			->arg('--debug')
			->run()
			->stopOnFail();		
	}
	
	
	
    /**
     * 
     * @description 
     */ 	
	function CreateFithRsg2ProjectBackViews ($Project='Component')	
	{
        $this->say("Create Fith RSG2 back views for project ".$Project);

//        $this->say("CODECEPTION RELEASE: ".\Codeception\Codecept::VERSION);
		$BaseViewName = 'BackViewsFithRsg2'.$Project.'Cept.php';		
		$this->taskCodecept()
			->suite('acceptance')
			->test($BaseViewName)
			->arg('--steps')
			->arg('--debug')
			->run()
			->stopOnFail();		
	}
	
    /**
     * 
     * @description 
     */ 	
	public function CreateAllProjectBaseViews	()
	{
        $this->say("CreateAllProjectBaseViews");
		
		foreach ($this->AllProjects as $PrjName) {
			$this->CreateProjectBaseView ($PrjName);
		}
	}

    /**
     * 
     * @description 
     */ 	
	public function CodeceptInstallProjectWithTmpFolder ()	
	{
        $this->say("Codecept InstallProjectWithTmpFolder");

		$this->taskCodecept()
			->suite('acceptance')
			->test('InstallProjectWithTmpFolderCept')
			->arg('--steps')
			->arg('--debug')
			->run();
//			->stopOnFail();		
	}
	
    /**
     * 
     * @description 
     */ 	
	public function DevInstallAllProjectsWithTmpFolder	($XamppFolderPart)
	{
        $this->say("CreateAllProjectZips");

		// All folder names
		foreach ($this->AllProjectsFolderNames as $PrjFolderName) {
			$this->DevInstallProjectWithTmpFolder ($PrjFolderName, $XamppFolderPart);
		}
	}

	
    /**
     * 
     * @description  
     */ 	
	public function DevInstallProjectWithTmpFolder ($prjName, $XamppFolderPart)	
	{
        $this->say("DevInstallProjectOverTempZip not finished");
		
		$PrjPath = realpath('..\\' . $prjName);
		$DstPath = '\\xampp\\htdocs\\' .  $XamppFolderPart . '\\tmp';
		
        $this->say("\t\t\$PrjPath= " . $PrjPath);
        $this->say("\t\t\$DstPath= " . $DstPath);

		// Does source exist ?
		if (! is_dir($PrjPath)) {
			$ErrorOut = "!!! \$PrjPath= '" . $PrjPath . "' is not existing ";
			$this->say($ErrorOut);
			
			return Robo\Result::error($this, $ErrorOut);
		}
		
		// Does destination exist ?
		if (! is_dir($DstPath)) {
			$ErrorOut = "!!! \$DstPath= '" . $DstPath . "' is not existing ";
			$this->say($ErrorOut);
			
//			return Robo\Result::error($this, $ErrorOut);
			return;
		}
		
		//$this->TaskCheck4ExistingIndexHtmlFile ($PrjPath);	
		$this->Check4ExistingIndexHtmlFile ($PrjPath);	
		
        $this->say("\t\* Clean destination  " . $PrjPath);
		$this->_cleanDir($DstPath);	
		
        $this->say("\t\* Copy to destination  " . $PrjPath);
		
		$path = 'extracted/' . $name[0];
		$results = scandir($path);

		foreach ($results as $result) {
			if ($result === '.' or $result === '..'){ 
				continue;
			}

			if (is_dir($path . '/' . $result)) {
				//code to use if directory
			}
		}

		foreach (new DirectoryIterator($PrjPath) as $fileInfo) {
			if($fileInfo->isDot()) {
				continue;
			}

			if (is_dir($path . '/' . $result)) {
					//code to use if directory
				}

			$file =  $path.$fileInfo->getFilename();
			
			
		}		
				
		
		
		
		$this->_copyDir($PrjPath, $DstPath);	

        $this->say("\t\* Install with codeception  " . $prjName);
		$this->CodeceptInstallProjectWithTmpFolder ();
	}
	
    /**
     * 
     * @description 
     */ 	
	public function DevClearTempInstallFolder ($XamppFolderPart)	
	{
		$DstPath = '\\xampp\\htdocs\\' .  $XamppFolderPart . '\\tmp';	
        $this->say("\t\t\$DstPath= " . $DstPath);
		
		// Does destination exist ?
		if (! is_dir($DstPath)) {
			$ErrorOut = "!!! \$DstPath= '" . $DstPath . "' is not existing ";
			$this->say($ErrorOut);
			
//			return Robo\Result::error($this, $ErrorOut);
			return;
		}
		
        $this->say("\t\* Clean destination  " . $PrjPath);
		$this->_cleanDir($DstPath);	
		
		return $DstPath;
	}
	
	
    /**
     * 
     * @description 
     */ 	
	public function DevProjectGenerateMarkdownDoc ($prjName)	
	{
        $this->say("DevProjectGenerateMarkdownDoc not finished");
		
		$PrjPath ='..\\' . $prjName;
		
		// Does source exist ?
		if (! is_dir($PrjPath)) {
			$ErrorOut = "!!! \$PrjPath= '" . $PrjPath . "' is not existing ";
			$this->say($ErrorOut);
			
			return Robo\Result::error($this, $ErrorOut);
		}
		
		$this->taskGenerateMarkdownDoc($prjName . 'Doc.md');
	}
	
    /**
     * 
     * @description Try doc
     */ 	
	public function docComponent ($CompName='RSGallery2_Module_LatestImages')
	{
        $files = Finder::create()->files()->name('*.php')->in('../'.$CompName);
        $docs = [];
        foreach ($files as $file) {
			$Test = $File;
		
		}
		
		$this->taskGenerateMarkdownDoc('.\\MdDocs\\'.$CompName.'.md');
		
	}
	
	
	/**
	* @description Creates index.html files in folders where they are not existing
	* Will recursively check every sub folder
	* command line: check4:existing-index-html-file
	* @param string $path start folder path	
	*/
	public function Check4ExistingIndexHtmlFile ($path='..\\', $leaveOutDir=array('.git', '', '', '', '', '', '', ''))
	{
        // $this->say("Check4ExistingIndexHtmlFile: '$path'");
        //$this->printTaskInfo('Checking for existing index.html file in folder: ' . $path);

		// Add trailing '\'
		if (substr($path, -1) != '\\') {
			$path .= '\\';
		}
		// $this->say("   - Path: '$path'");

		// Check if source path is existing
		if(!is_dir($path)) {
			$this->say("!!! Path: '$path' is not existing");
			return;
		}
		
//        $this->say("Your RoboFile.php version is $this->clientVersion, the latest version is $this->version");
		
		//--- Check for existing "index.html" file ---------------------
		
		$IndexHtmlFileName = $path . 'index.html';
		
		if (!file_exists ($IndexHtmlFileName)) {
			$this->say("        create index.html file: '$IndexHtmlFileName'");

			// create file
			$FileId = fopen($IndexHtmlFileName, "w");
			fclose ($FileId);

			// Still not existing
			if (!file_exists ($IndexHtmlFileName)) {
				$this->yell(" !!! The index.html file: " . $IndexHtmlFileName . " could not be created !!!");
			}
		}
		
		//--- for all sub directories --------------------
		$Names = scandir($path);

		foreach ($Names as $Name) {
			if ($Name === '.' or $Name === '..') {
				continue;
			}

			// leave out standard folders 
			if (in_array ($Name, $leaveOutDir)) {
				continue;
			}
				
			if (is_dir($path . '/' . $Name)) {
				//code to use if directory
				$ChildDir = $path . $Name . '\\';
				$this->Check4ExistingIndexHtmlFile ($ChildDir);
			}
		}

	}
/**/	


    /**
     * 
     * @description 
     */ 	
    function hello2($world)
    {
        $this->say("Hello, $world");
    }
}