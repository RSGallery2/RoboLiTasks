@echo off
pushd ..
php ..\vendor\codegyre\robo\robo Check4ExistingIndexHtmlFile "..\RSGallery2_Module_ImageWall" %*
popd
@REM Echo Press any key to continue
@REM pause
