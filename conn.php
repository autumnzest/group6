<?php
/*****************************
*数据库连接
*****************************/
$conn = @mysql_connect("group6-omiai-master.cfalwugwhyf4.ap-northeast-1.rds.amazonaws.com","root","aiit2020");

if (!$conn){

     die("データベース接続できない：" . mysql_error());

}else{

  mysql_select_db("cloud", $conn); 

}

//mysql_query("set character set 'gbk'");
//写库
//mysql_query("set names 'gbk'");
?>
