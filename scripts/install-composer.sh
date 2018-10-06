#!/usr/bin/env bash
EXPECTED_SIGNATURE=$(curl -s https://composer.github.io/installer.sig)

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');")

if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]
then
	>&2 echo "ERROR: Installer signature did not match"
	rm composer-setup.php
	exit 1
fi

php composer-setup.php --queit

SETUP_RESULT=$?

rm composer-setup.php

if [ $SETUP_RESULT == 1 ]
then
	>&2 echo "ERROR: Unable to install composer"
	exit $SETUP_RESULT
fi