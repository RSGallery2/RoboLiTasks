<?php

/**
 * @package     rsgallery2-robo-tasks
 * @subpackage
 *
 * @copyright   Copyright (C) 2015 - 2015 rsgallery2.nl. All rights reserved.
 * @license     GNU General Public License version 3
 */

namespace rsgallery2\robo;

trait Check4ExistingIndexHtmlFile
{
    function taskCheck4ExistingIndexHtmlFile($ProjectPath)
    {
        return new Check4ExistingIndexHtmlFileTask($ProjectPath);
    }
}
}


/**
 * Class SendCodeceptionOutputToSlack
 * @package rsgallery2\robo
 */ 
// class Check4ExistingIndexHtmlFileTask extends BaseTask implements TaskInterface
class Check4ExistingIndexHtmlFileTask implements Robo\Contract\TaskInterface
{
	protected $ProjectPath = null;

	/**
	 * Constructor.
	 *
	 * @param $ProjectPath
	 */
	public function __construct($ProjectPath)
	{
		$this->ProjectPath = $ProjectPath;
	}

	/**
	 * Maps all parts of an extension into a Joomla! installation
	 *
	 */
	public function run()
	{
		$this->Check4ExistingIndexHtmlFile ($this->toDir);
	}

	/**
	* Creates index.html files inn folders where they are not existing
	* Will recursively check every sub folder
	* command line: check4:existing-index-html-file
	* @param string $path start folder path	
	*/
	public function Check4ExistingIndexHtmlFile ($path='..\\', $leaveOutDir=array('.git', '', '', '', '', '', '', ''))
	{
		$Count = 0;
		$IsOk = true;
		
		
        $this->printTaskInfo("Check4ExistingIndexHtmlFile: '$path'");
        //$this->printTaskInfo('Checking for existing index.html file in folder: ' . $path);

		// Add trailing '\'
		if (substr($path, -1) != '\\') {
			$path .= '\\';
		}
		// $this->printTaskInfo("   - Path: '$path'");

		// Check if source path is existing
		if(!is_dir($path)) {
			$this->printTaskError("!!! Path: '$path' is not existing");
			return;
		}

		
//        $this->printTaskInfo("Your RoboFile.php version is $this->clientVersion, the latest version is $this->version");
		
		//--- Check for existing "index.html" file ---------------------
		
		$IndexHtmlFileName = $path . 'index.html';
		
		if (!file_exists ($IndexHtmlFileName)) {
			$this->printTaskInfo("        create index.html file: '$IndexHtmlFileName'");

			// create file
			$FileId = fopen($IndexHtmlFileName, "w");
			fclose ($FileId);

			// Still not existing
			if (!file_exists ($IndexHtmlFileName)) {
				$this->printTaskError(" !!! The index.html file: " . $IndexHtmlFileName . " could not be created !!!");
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

		printTaskSuccess ("");
	}
	
