<?php

$baseurl = "https://raw.githubusercontent.com/roxlukas/diagnofwmx/master";

echo("*** It's working! argv[1]=" . $argv[1] . "\r\n");

if ($argc < 1) {
    die("*** You must specify a game-specific test script. Check README.md for details.");
}

$file = $baseurl . '/games/' . $argv[1];

echo ("*** Test script: $file \r\n");

