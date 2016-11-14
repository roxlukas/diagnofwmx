<?php
$version = '0.1';
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
$results="*** Report created using diagnofwmx version $version.\r\n    Check https://github.com/roxlukas/diagnofwmx for more information.\r\n";

foreach ($scenario as $line) {
    if (!empty($line)) {
        $test = explode('|', $line);
        $out=array();
        if ($test[0] == 'dns') {
            $cmd = "dig +trace ${test[1]} ${test[2]}";
            $v = "*** DNS test - running command $cmd...\r\n";
            echo($v); $results .= $v;
            exec($cmd,$out);
            $results .= implode("\r\n",$out) . "\r\n";
        } else if ($test[0] == 'ping') {
            $cmd = "ping -c 10 ${test[1]}";
            $v = "*** PING test - running command $cmd...\r\n";
            echo($v); $results .= $v;
            exec($cmd,$out);
            $results .= implode("\r\n",$out) . "\r\n";
        } else if ($test[0] == 'tracert') {
            $cmd = "sudo mtr -r -c 10 ${test[1]}";
            $v = "*** TRACERT test - running command $cmd...\r\n";
            echo($v); $results .= $v;
            exec($cmd,$out);
            $results .= implode("\r\n",$out) . "\r\n";
        } else if ($test[0] == 'curl') {
            $cmd = "curl -sS ${test[1]}";
            $v = "*** CURL test - running command $cmd...\r\n";
            echo($v); $results .= $v;
            exec($cmd,$out);
            $results .= implode("\r\n",$out) . "\r\n";
        } else {
            echo("*** Unknown test: '$line'\r\n");
        }
    }
}

$date = date("Y-m-d_H-i-s");
$reportfname = "report_${argv[1]}_$date.log";
file_put_contents($reportfname, $results);
echo("*** Report saved to $reportfname \r\n");
echo("*** Send the report to your ISP or Game's Developer \r\n");
//echo($results);
