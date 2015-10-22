@echo off
pushd ..
php .\vendor\codegyre\robo\robo create:project-base-view component %*
popd
@REM Echo Press any key to continue
@REM pause
