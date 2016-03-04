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


    private function listdiraux($dir, &$files) {
        $handle = opendir($dir);
        while (($file = readdir($handle)) !== false) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $filepath = $dir == '.' ? $file : $dir . '/' . $file;
            if (is_link($filepath))
                continue;
            if (is_file($filepath))
                $files[] = $filepath;
            else if (is_dir($filepath))
                $this->listdiraux($filepath, $files);
        }
        closedir($handle);
    }


// http://php.net/manual/de/function.readdir.php
// google: php collect file from folder
    public function CollectInstallFiles ()
    {
        $installFiles = array ();

        try {
            $errFound = '';

            echo 'CollectInstallFiles' . "\n";

            echo '$this->prjPath. "' . $this->prjPath . '"' . "\n";

            if (!is_dir($this->prjPath)) {
                $errFound = 'No project path given or path is invalid';
                return $installFiles;
            }

            $files = array();
            $this->listdiraux($this->prjPath, $files);

            sort($files, SORT_LOCALE_STRING);

            foreach ($files as $f) {
                echo  $f, "\n";
            }




            /*
                        if ($handle = opendir($this->prjPath)) {
                            echo "Verzeichnis-Handle: $handle\n";
                            echo "Einträge:\n";

                            //* Das ist der korrekte Weg, ein Verzeichnis zu durchlaufen. *
                            while (false !== ($entry = readdir($handle))) {

                                if ($entry != "." && $entry != "..") {
                                    echo "$entry\n";



                                echo "$entry\n";
                            }

                            closedir($handle);
                        }
            */

        }
        catch (Exception $e) {
            echo 'CollectInstallFiles Exception found: ',  $e->getMessage(), "\n";
        }


        return $installFiles;
    }


}