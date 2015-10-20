<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
use Robo\Common\TaskIO;
use Symfony\Component\Finder\Finder;
  
require_once 'vendor/autoload.php';
  
class RoboFile extends \Robo\Tasks
//class RoboFile extends \Robo\Task\BaseTask
{
//	use Check4ExistingIndexHtmlFile;
 
    // define public methods as commands
    function hello($world)
    {
        $this->say("Hello, $world");
    }
	
	public $AllProjects = [
		'RSGallery2_Module_ImageWall', 
		'RSGallery2_Module_LatestGalleries', 
		'RSGallery2_Module_LatestImages', 
		'RSGallery2_Module_RandomImages', 
		'RSGallery2_Module_ThumbScroller', 
		'RSGallery2_Plugin_DisplayGallery', 
		'RSGallery2_Plugin_DisplayImage'
		];
	
	//       $this->_exec("java -jar $seleniumPath > selenium-errors.log 2>selenium.log &"); 
	public $cmdSelenium = 'java -jar ..\SeleniumServer\selenium-server-standalone-2.48.1.jar > selenium-errors.log 2&>';
		
	public function LaunchSelenium ()
	{
		// launches Selenium server
		$this->taskExec($cmdSelenium)
			->background()
			->run();
	}	
		
	public function CreateAllProjectZips	()
	{
        $this->say("CreateAllProjectZips");
		
		foreach ($this->AllProjects as $Prj) {
			$this->DevCreateProjectZip ($Prj);
		}
	}

	/**	
		Creates zip file of project
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
	
	public function TestCodeceptAvailable ()	
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
	
	public function CodeceptInstallProjectWithTmpFolder ()	
	{
        $this->say("Codecept InstallProjectWithTmpFolder");

		$this->taskCodecept()
			->suite('acceptance')
			->test('InstallProjectWithTmpFolderCept')
			->arg('--steps')
			->arg('--debug')
			->run()
			->stopOnFail();		
	}
	
	
	/**
		Clear tmp folder 
	*/
	public function DevInstallProjectWithTmpFolder ($prjName, $XamppFolderPart)	
	{
        $this->say("DevInstallProjectOverTempZip not finished");
		
		$PrjPath ='..\\' . $prjName;
		$DstPath = '\\xampp\\htdocs\\' .  $XamppFolderPart . '\\tmp';
		
        $this->say("PrjPath= " . $PrjPath);
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
		
		$this->TaskCheck4ExistingIndexHtmlFile (PrjPath);	
		
        $this->say("\t\* Clean destination  " . $PrjPath);
		$this->_cleanDir($DstPath);	
		
		// as shortcut
        $this->say("\t\* Copy to destination  " . $PrjPath);
		$this->_copyDir($PrjPath, $DstPath);	


		// Missing auto install with Codeception
		
		
	}
	
	/**	
		Creates zip file of project
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
		Creates zip file of project
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
	* Creates index.html files inn folders where they are not existing
	* Will recursively check every sub folder
	* command line: check4:existing-index-html-file
	* @param string $path start folder path	
	* /
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
	
}