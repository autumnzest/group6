<?php
session_start();

$userid = $_SESSION['userid'];
echo $userid;

include('conn.php');

$rel = mysql_query("select * from user_list where user_id='$userid' limit 1");
$row=mysql_fetch_array($rel);
//print_r($row);
//print_r(mysql_fetch_row($rel));
$name=$row[user_name];
$addr=$row[img_address];
$sex=$row[sex];
$birthday=$row[birth_date];
$age=$row[age];
$height=$row[height];
$weight=$row[weight];
$job=$row[job];
$salary=$row[salary];
$hobby=$row[hobby];
$info=$row[info];

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>information</title>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>
<div>
<fieldset>
<legend>user information</legend>
<form name="LoginForm" method="post" action="photoupload.php">
<p>
<label for="username" class="label">image:</label>
<img src='<?php echo $addr;?>' width="300px" height="400px" /><br/>
<input type="submit" name="submit" value="upload"/><br/>
<p/>
<p>
<label for="username" class="label">名前:</label>
<label for="username" class="label"><?php echo $name;?></label><br/>
<p/>
<p>
<label for="sex" class="label">性別:</label>
<label for="sex" class="label"><?php echo $sex;?></label><br/>
<p/>
<p>
<label for="birthday" class="label">生年月日:</label>
<label for="birthday" class="label"><?php echo $birthday;?></label><br/>
<p/>
<p>
<label for="age" class="label">年齢:</label>
<label for="age" class="label"><?php echo $age;?></label><br/>
<p/>
<p>
<label for="height" class="label">身長:</label>
<label for="height" class="label"><?php echo $height;?></label><br/>
<p/>
<p>
<label for="weight" class="label">体重:</label>
<label for="weight" class="label"><?php echo $weight;?></label><br/>
<p/>
<p>
<label for="job" class="label">職業:</label>
<label for="job" class="label"><?php echo $job;?></label><br/>
<p/>
<p>
<label for="salary" class="label">年収:</label>
<label for="salary" class="label"><?php echo $salary;?></label><br/>
<p/>
<p>
<label for="hobby" class="label">趣味:</label>
<label for="hobby" class="label"><?php echo $hobby;?></label><br/>
<p/>
<p>
<label for="info" class="label">個人紹介:</label>
<textarea name="info" rows="10" cols="30" readonly="true">
<?php echo $info;?>
</textarea></body>
<p/>
<p>
<a href="login.php?action=manager">戻す</a><br/>
</p>
</form>
</fieldset>
</div>
</body>
</html>

