<?php
session_start();

$userid = $_SESSION['userid'];
//echo $userid;

include('image_check.php'); // getExtension Method
$msg='';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$tmp = $_FILES['file']['tmp_name'];
$ext = getExtension($name);


if(strlen($name) > 0)
{
// File format validation
if(in_array($ext,$valid_formats))
{
// File size validation
if($size<(1024*1024))
{
include('s3_config.php');
//Rename image name. 
$actual_image_name = time().".".$ext;

if($s3->putObjectFile($tmp, $bucket , $actual_image_name, S3::ACL_PUBLIC_READ) )
{
$msg = "S3 Upload Successful."; 
$s3file='http://'.$bucket.'.s3.amazonaws.com/'.$actual_image_name;
echo "<img src='$s3file' width='300px' height='300px' /><br/>";
//echo 'S3 File URL:'.$s3file;

include('conn.php');
$sql = "update user_list set img_address='$s3file' where user_id='$userid'";
//echo $sql;
if(mysql_query($sql,$conn)){
    echo('database update success! click <a href="useredit.php?userid='.$userid.'">戻す</a>');
    } else {
    echo 'sorry！update is failed：',mysql_error(),'<br />';
    echo('click <a href="useredit.php?userid='.$userid.'">戻す</a>');
    }
}
else
$msg = "S3 Upload Fail.";

}
else
$msg = "Image size <= 1 MB";

}
else
$msg = "Invalid file, please upload image file.";

}
else
$msg = "Please select image file.";

}
?>

<link rel="stylesheet" type="text/css" href="/css/style.css">
<form action="" method='post' enctype="multipart/form-data">
Upload image file here<br/>
size <= 1MB <br/>
<input type='file' name='file'/><br/>
<input type='submit' value='Upload'/><br/>
<?php echo $msg; ?>
</form>
