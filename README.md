<h1>About</h1>

This project is an automated diagnostic script for checking network connectivity with different online games servers.
It will try to resolve all domains normally resolved by game client, and then it will try to ping/traceroute to all discovered addresses.
Whole output is saved into a log file, which can be later sent to ISP or game's developers.

<h3>Usage</h3>

* Download ISO file with Ubuntu 16.04 or later: https://www.ubuntu.com/download/desktop
* EITHER Burn it to a DVD or make a bootable USB stick, then boot your PC from it (tutorial: https://www.ubuntu.com/download/desktop/create-a-usb-stick-on-windows)
* OR download VirtualBox (https://www.virtualbox.org/wiki/Downloads), create new VM and run Ubuntu ISO as live-DVD
* Right click desktop, choose "Open Terminal"
* copy and paste the command below

``curl -sS https://raw.githubusercontent.com/roxlukas/diagnofwmx/master/diagnofwmx.sh | /bin/bash -s -- <game>``

where ``<game>`` is one of the following:

  wotb - World of Tanks Blitz

Script will run the tests for the game you've specified and will create a report file. You can use Firefox on Ubuntu to send this report file to e-mail, FTP server or a website. You can also copy the report file to an USB stick.

<h3>Donations are welcome</h3>

If you'd like to support the development, feel free to do so: https://www.paypal.me/roxlukas
