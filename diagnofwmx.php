<?php
$baseurl = "https://raw.githubusercontent.com/roxlukas/diagnofwmx/master";

if ($argc < 1) {
    die("*** You must specify a game-specific test script. Check README.md for details.");
}

$file = $baseurl . '/games/' . $argv[1] . '.txt';
echo ("*** Test script: $file \r\n");
$content = file_get_contents($file);
echo ("*** Contents: $content \r\n");

?>