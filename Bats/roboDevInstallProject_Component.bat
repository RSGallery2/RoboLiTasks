@echo off
pushd ..
php .\vendor\codegyre\robo\robo dev:install-project-with-tmp-folder RSGallery2_Component Joomla3x %*
popd
@REM Echo Press any key to continue
@REM pause
