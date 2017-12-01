<?php
if(!isset($_POST['username'])){
    exit('エラー!');
}

echo isset($_POST['submit']);


$username = $_POST['username'];
$password = $_POST['password'];
$sex = $_POST['sex'];
$YYYY= $_POST['YYYY'];
$MM = $_POST['MM'];
$DD = $_POST['DD'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$job = $_POST['job'];
$salary = $_POST['salary'];
$hobby = $_POST['hobby'];
$info = $_POST['info'];
echo $username;
echo "<br/>";
echo $password;
echo "<br/>";
echo $sex;
echo "<br/>";


$birthday = $YYYY. "-" . $MM. "-" .  $DD;
echo $birthday;

#echo $MM;
#echo $DD;
echo "<br/>";
echo $age;
echo "<br/>";
echo $height;
echo "<br/>";
echo $weight;
echo "<br/>";
echo $job;
echo "<br/>";
echo $salary;
echo "<br/>";
echo $hobby;
echo "<br/>";
echo $info;
?>
