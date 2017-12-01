<?php
session_start();

$userid = $_SESSION['userid'];

if($_GET['userid']!=null){
	$userid = $_GET['userid'];
}
include('conn.php');

$rel = mysql_query("select * from user_list where user_id='$userid' limit 1");
$row=mysql_fetch_array($rel);
//print_r($row);
//print_r(mysql_fetch_row($rel));
$name=$row[user_name];
$addr=$row[img_address];
$sex=$row[sex];
$birthday=$row[birthdate];
$age=$row[age];
$height=$row[height];
$weight=$row[weight];
$job=$row[job];
$salary=$row[salary];
$hobby=$row[hobby];
$info=$row[info];

?>

<!DOCTYPE html>
<html>

<!-- Head -->
<head>

<title>Information</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="/js/birthdate.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->
<!-- Style --> <link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
</head>
<!-- //Head -->
<!-- Body -->
<body>

<h1>Information</h1>

<div class="container w3layouts agileits">

<div class="login w3layouts agileits">
<form name="LoginForm" method="post" action="photoupload.php">
<img src='<?php echo $addr;?>' width="300px" height="300px" /><br/>
<input type="submit" value="upload"> 
<input type="text" Name="username" placeholder="<?php echo $name;?>" readonly="ture">
<input type="text" Name="sex" placeholder="<?php echo $sex;?>" readonly="ture">
<input type="text" Name="birthday" placeholder="<?php echo $birthday;?>" readonly="ture">
<input type="text" Name="age" placeholder="<?php echo $age;?>才" readonly="ture">
<div class="send-button w3layouts agileits">

</div>
<div class="clear"></div>
</div>

<div class="register w3layouts agileits">
<input type="text" Name="height" placeholder="<?php echo $height;?>cm" readonly="ture">
<input type="text" Name="weight" placeholder="<?php echo $weight;?>kg" readonly="ture">
<input type="text" Name="job" placeholder="<?php echo $job;?>" readonly="ture">
<input type="text" Name="salary" placeholder="<?php echo $salary;?>万" readonly="ture">
<input type="text" Name="hoby" placeholder="<?php echo $hobby;?>" readonly="ture">
<textarea name="info" rows="15" cols="45" placeholder="<?php echo $info;?>">
</textarea><br/><br/>
<div class="send-button w3layouts agileits">
<input type="button" value="return" onclick="javascript:history.go(-1);">
</form>

</div>
<div class="clear"></div>
</div>

<div class="clear"></div>

</div>

<div class="footer w3layouts agileits">
<p>Copyright &copy; CloudGroup6</p>
</div>
<div style="text-align:center;">
</div>
<script src="js/TweenLite.min.js"></script>
<script src="js/EasePack.min.js"></script>
<script src="js/rAF.js"></script>
<script src="js/demo-1.js"></script>
</body>
<!-- //Body -->

</html>

