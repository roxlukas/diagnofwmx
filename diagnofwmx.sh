#!/bin/bash
#
# PHP CLI script launcher
#

PHPPKG=php7.0-cli
ISPHPINST=$(dpkg-query -W -f='${Status}' $PHPPKG 2>/dev/null | grep -c "ok installed")
PHPFILE=diagnofwmx.php
PHPURL=https://raw.githubusercontent.com/roxlukas/diagnofwmx/master/$PHPFILE

if [ "$ISPHPINST" -ne "1" ]; then
    echo "*** Installing PHP..."
    sudo apt -y install $PHPPKG
else
    echo "*** PHP is already installed"
fi

echo "*** Downloading the diagnostics script from $PHPURL"
wget -q $PHPURL -O $PHPFILE

echo "*** Starting the diagnostic script $PHPFILE"
php $PHPFILE $1 $2 $3 $4