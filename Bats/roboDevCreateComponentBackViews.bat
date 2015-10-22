@echo off
pushd ..
php .\vendor\codegyre\robo\robo create:project-back-views component %*
popd
@REM Echo Press any key to continue
@REM pause
