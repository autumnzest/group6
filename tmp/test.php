<?php 
$test = "aws s3 cp 11.txt s3://data.aiit-cdp-10.work";
$last = shell_exec($test);
print "last: $last\n";
?>
