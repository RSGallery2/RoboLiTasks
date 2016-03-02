@echo off
pushd ..
php .\vendor\codegyre\robo\robo dev:build-project-zip RSGallery2_Component \Download\Joomla.Rsgallery2  %*
popd
@REM Echo Press any key to continue
@REM pause
