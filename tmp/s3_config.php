<?php
// Bucket Name
$bucket="data.aiit-cdp-10.work";
if (!class_exists('S3'))require_once('S3.php');

//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAI633BXS4MN7WRP6Q');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');

$s3 = new S3(awsAccessKey, awsSecretKey);
$s3->putBucket($bucket, S3::ACL_PUBLIC_READ);
?>
