<?php
#if(!isset($_POST['submit'])){
#    exit('エラー!');
#}
if(!isset($_POST['username'])){
    exit('エラー!');
}

$username = $_POST['username'];
$password = $_POST['password'];
$sex = $_POST['sex'];
$YYYY= $_POST['YYYY'];
$MM = $_POST['MM'];
$DD = $_POST['DD'];
$birthday = $YYYY. "-" . $MM. "-" .  $DD;
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$job = $_POST['job'];
$salary = $_POST['salary'];
$hobby = $_POST['hobby'];
$info = $_POST['info'];
//注册信息判断
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
    exit('error：username is unavailiable。<a href="javascript:history.back(-1);">return</a>');
}
if(strlen($password) < 4){
    exit('error：password is too short。<a href="javascript:history.back(-1);">return</a>');
}
//包含数据库连接文件
include('conn.php');
//检测用户名是否已经存在
$check_query = mysql_query("select user_id from user_list where user_name='$username' limit 1");
if(mysql_fetch_array($check_query)){
    echo 'error：username ',$username,' is used。<a href="javascript:history.back(-1);">返回</a>';
    exit;
}
//写入数据
$password = MD5($password);
//$regdate = date("Y-m-d",time());
$sql = "INSERT INTO user_list(user_name,"
        . "password,"
        . "sex,"
        . "birthdate,"
        . "age,"
        . "height,"
        . "weight,"
        . "job,"
        . "salary,"
        . "hobby,"
	. "img_address,"
        . "info)"
        . "VALUES('$username',"
        . "'$password'"
        . ",'$sex'"
        . ",'$birthday'"
        . ",'$age'"
        . ",'$height'"
        . ",'$weight'"
        . ",'$job'"
        . ",'$salary'"
        . ",'$hobby'"
	. ",'https://s3-ap-northeast-1.amazonaws.com/data.aiit-cdp-10.work/default.jpg'"
	. ",'$info')";
if(mysql_query($sql,$conn)){
    exit('registered！click <a href="index.html">登録</a>');
} else {
    echo ' sorry！register is failed：',mysql_error(),'<br />',$sql;
    echo 'click <a href="javascript:history.back(-1);">戻す</a> ';
}
?>
