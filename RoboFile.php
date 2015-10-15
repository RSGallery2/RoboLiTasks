<?php
class RoboFile extends Robo\Tasks
{
    use CompileAssets;

    function build()
    {
        $this->taskCompileAssets('web/css-src')
            ->to('web/assets.min.css')
            ->run();
    }
}
?>