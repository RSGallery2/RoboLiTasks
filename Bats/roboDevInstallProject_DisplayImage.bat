@echo off
pushd ..
php .\vendor\codegyre\robo\robo dev:install-project-with-tmp-folder Joomla3x RSGallery2_Plugin_DisplayImage %*
popd
@REM Echo Press any key to continue
@REM pause
