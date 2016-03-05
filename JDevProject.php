<?php

/**
 * JDevProject (JDeveloperProject)
 * Contains all information of a component, modul or plugin
 * It aims to support the creation of an installation
 * The initialiasion shall be done from the sources itself
 *   Therefore a path must be given
 */
class JDevProject {
    /**
     * @var string
     */
    public $prjPath = '';
    public $errFound = '';

    /**
     * JDevProject constructor.
     * @param string $prjPath
     */
    public function __construct($prjPath='') {
        $this->prjPath = $prjPath;

        echo '__construct::$this->prjPath. "' . $this->prjPath . '"' . "\n";

        $this->InitFromPrjPath (); // uses $this->prjPath
    }

    /**
     * @param string $prjPath
     */
    public function InitFromPrjPath($prjPath='') {

        $errFound = '';

        if ($prjPath=='') {
            $prjPath=$this->prjPath;
        }

        //--- Check path for existing project ----------------------


        //--- Read manifest file ------------------------------------





    }


    private function listDirPrjFiles ($dir, &$files) {
        $handle = opendir($dir);

        while (($file = readdir($handle)) !== false) {
            // if ($file == '.' || $file == '..') {
            if($file[0] === '.') {
                continue;
            }

            $filepath = $dir == '.' ? $file : $dir . '/' . $file;
            if (is_link($filepath))
                continue;
            if (is_file($filepath))
                $files[] = $filepath;
            else if (is_dir($filepath))
                $this->listDirPrjFiles($filepath, $files);
        }

        closedir ($handle);
    }


// http://php.net/manual/de/function.readdir.php
// google: php collect file from folder
    public function CollectInstallFiles ()
    {
        $installFiles = array ();

        $HomePath = getcwd ();

        try {
            $errFound = '';

            echo 'CollectInstallFiles' . "\n";

            echo '$this->prjPath. "' . $this->prjPath . '"' . "\n";

            if (!is_dir($this->prjPath)) {
                $errFound = 'No project path given or path is invalid';
                return $installFiles;
            }

            chdir($this->prjPath);
            $this->listDirPrjFiles('.', $installFiles);
            // sort($installFiles, SORT_LOCALE_STRING);
/*
            foreach ($installFiles as $f) {
                echo  $f, "\n";
            }
*/
        }
        catch (Exception $e) {
            echo 'CollectInstallFiles Exception found: ',  $e->getMessage(), "\n";
        }

        chdir($HomePath);

        return $installFiles;
    }


}