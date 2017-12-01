<?php
$username = $_SESSION['user_name'];
$keyword = $_POST['keyword'];

//包含数据库连接文件
include('conn.php');
//检测用户名及密码是否正确
$result = mysql_query("select * from user_list "
        . "where user_id like '%$keyword%' "
        . "or user_name like '%$keyword%'"
        . "or sex like '%$keyword%'"
        . "or birthdate like '%$keyword%'"
        . "or job like '%$keyword%'"
        . "or salary like '%$keyword%'"
        . "or height like '%$keyword%'"
        . "or weight like '%$keyword%'"
        . "or hobby like '%$keyword%'"
        . "or info like '%$keyword%'"
        . "or age like '%$keyword%'"
        . "or updated_at like '%$keyword%'"
        . ";");

#echo '<link rel="stylesheet" type="text/css" href="/css/style.css">';
echo "<table border='1'>
<tr>
<th>名前</th>
<th>性別</th>
<th>生年月日</th>
<th>年齢</th>
<th>身長</th>
<th>体重</th>
<th>職業</th>
<th>年収</th>
<th>趣味</th>
<th>個人紹介</th>
<th>updated</th>
<th>imgaddr</th>
</tr>";

echo '<div>
<legend>Userlist</legend>
<form name="UserForm" method="post" action="userlist.php">
<input id="keyword" name="keyword" type="text" />
<input type="submit" name="submit" value=" search "/><br/>
</form>
</div>';

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['user_name'] . "</td>";
  echo "<td>" . $row['sex'] . "</td>";
  echo "<td>" . $row['birthdate'] . "</td>";
  echo "<td>" . $row['age'] . "</td>";
  echo "<td>" . $row['weight'] . "</td>";
  echo "<td>" . $row['height'] . "</td>";
  echo "<td>" . $row['job'] . "</td>";
  echo "<td>" . $row['salary'] . "</td>";
  echo "<td>" . $row['hobby'] . "</td>";
  echo "<td>" . $row['info'] . "</td>";
  echo "<td>" . $row['updated_at'] . "</td>";
  echo "<td>" . $row['img_address'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

#echo '<a href="adminadd.html">New?</a>';
echo '<a href="manager.php?action=manager">戻す</a><br/>';
//echo '  <a href="login.php">戻す</a>';
mysql_close($con);
?>

