@echo off
pushd ..
php .\vendor\codegyre\robo\robo create:all-project-base-views %*
popd
@REM Echo Press any key to continue
@REM pause
