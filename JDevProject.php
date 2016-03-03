<?php

/**
 * JDevProject (JDeveloperProject)
 * Contains all information of a component, modul or plugin
 * It aims to support the creation of an installation
 * The initialiasion shall be done from the sources itself
 *   Therefore a path must be given
 */
public class JDevProject {
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

        InitFromPrjPath (); // uses $this->prjPath
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


    public function CollectInstallFiles ()
    {
        $installFiles = array ();

        try {
            $errFound = '';

            if ($this->prjPath == '') {
                $errFound = 'No project path given or path is invalid';
                return;
            }


        }
        catch (Exception $e) {
            echo 'CollectInstallFiles Exception found: ',  $e->getMessage(), "\n";
        }


        return $installFiles;
    }


}