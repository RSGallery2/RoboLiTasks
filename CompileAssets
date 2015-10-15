<?php
trait CompileAssets
{
    function taskCompileAssets($path)
    {
        return new CompileAssetsTask($path);
    }
}

class CompileAssetsTask implements Robo\Contract\TaskInterface
{
    // configuration params
    protected $path;
    protected $to;
    function __construct($path)
    {
        $this->path = $path;
    }

    function to($filename)
    {
        $this->to = $filename;
        // must return $this
        return $this;
    }

    // must implement Run
    function run()
    {
        $this->say("Compiles assets");        //....
    }
}
?>
