@echo off
pushd ..
php .\vendor\codegyre\robo\robo dev:create-project-zip RSGallery2_Component Joomla3x %*
popd
@REM Echo Press any key to continue
@REM pause
