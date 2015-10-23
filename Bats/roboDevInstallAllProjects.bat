@echo off
pushd ..
php .\vendor\codegyre\robo\robo dev:install-all-projects-with-tmp-folder Joomla3x %*
popd
@REM Echo Press any key to continue
@REM pause
