@echo off
pushd ..
php .\vendor\codegyre\robo\robo dev:create-all-project-zip %*
popd

@REM Echo Press any key to continue
@REM pause
