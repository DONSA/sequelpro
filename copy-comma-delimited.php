#!/usr/bin/php
<?php
$in = fopen('php://stdin', 'r');
$result = array();
$prefix = ',';
while($line = fgetcsv($in, 0, "\t")) {
	$result[] = "'" . implode($line) . "'";
}
unset($result[0]);
fclose($in);
$cmd = 'echo ' . escapeshellarg(implode($prefix, $result)) . ' | __CF_USER_TEXT_ENCODING='.posix_getuid().':0x8000100:0x8000100 pbcopy';
shell_exec($cmd);
