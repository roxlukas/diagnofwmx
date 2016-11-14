<?php
$baseurl = "https://raw.githubusercontent.com/roxlukas/diagnofwmx/master";

if ($argc < 1) {
    die("*** You must specify a game-specific test scenario. Check README.md for details.");
}

$file = $baseurl . '/games/' . $argv[1] . '.txt';
echo ("*** Test scenario: $file \r\n");
$content = file_get_contents($file);
if (empty($content)) die ("*** Test scenario '" . $argv[1] . "' is empty.");
$scenario = preg_split('/\r|\r\n|\n/', $content);

//the whole test result log will be stored here
$results='';

foreach ($scenario as $line) {
    if (!empty($line)) {
        echo ("*** Scenario line: $line \r\n");
        $test = explode('|', $line);
        if ($test[1] == 'dns') {
            exec("dig ${test[2]} ${test[3]} ",$out);
            $results .= $out . "\r\n";
        } 
    }
}

echo($results);
