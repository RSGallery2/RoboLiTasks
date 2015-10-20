@echo off
pushd ..\
php .\vendor\codegyre\robo\robo dev:install-project-with-tmp-folder %*
popd
@REM Echo Press any key to continue
@REM pause
