@echo off
pushd ..
php .\vendor\codegyre\robo\robo dev:install-project-with-tmp-folder RSGallery2_Module_ImageWall Joomla3x %*
popd
@REM Echo Press any key to continue
@REM pause
