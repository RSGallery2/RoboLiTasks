@echo off
pushd ..
REM DevBuildProject2Folder
php .\vendor\codegyre\robo\robo dev:build-project2-folder RSGallery2_Component c:\xampp\htdocs\Joomla3x\tmp %*
popd
@REM Echo Press any key to continue
@REM pause
