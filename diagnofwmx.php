<?php
$baseurl = "https://raw.githubusercontent.com/roxlukas/diagnofwmx/master";

if ($argc < 1) {
    die("*** You must specify a game-specific test scenario. Check README.md for details.\r\n");
}

$file = $baseurl . '/games/' . $argv[1] . '.txt';
echo ("*** Test scenario: $file \r\n");
$content = file_get_contents($file);
if (empty($content)) die ("*** Test scenario '" . $argv[1] . "' is empty.\r\n");
$scenario = preg_split('/\r|\r\n|\n/', $content);

//the whole test result log will be stored here
$results='';

foreach ($scenario as $line) {
    if (!empty($line)) {
        $test = explode('|', $line);
        if ($test[0] == 'dns') {
            $cmd = "dig ${test[1]} ${test[2]}";
            echo("*** DNS test - running command $cmd...\r\n");
            exec($cmd,$out);
            $results .= implode("\r\n",$out) . "\r\n";
        } else if ($test[0] == 'ping') {
            $cmd = "ping ${test[1]}";
            echo("*** PING test - running command $cmd...\r\n");
            exec($cmd,$out);
            $results .= implode("\r\n",$out) . "\r\n";
        } else if ($test[0] == 'tracert') {
            $cmd = "traceroute ${test[1]}";
            echo("*** TRACERT test - running command $cmd...\r\n");
            exec($cmd,$out);
            $results .= implode("\r\n",$out) . "\r\n";
        } else {
            echo("*** Unknown test: '$line'\r\n");
        }
    }
}

echo($results);
