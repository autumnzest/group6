<?php

$hostname = array("localhost","group6-master");
$username = array("root","group6");
$password = array("1234","1234");

$x=0; 
while($x<=1) {
  $con = mysql_connect($hostname[$x],$username[$x],$password[$x]);

  if (!$con)
    {
     if($x==1){
       die('Could not connect: ' . mysql_error());
    }
    $x++;
  }else{
    break;
  }
}
mysql_select_db("yiibaidb", $con);

$result = mysql_query("select * from items");
echo '<body>';
echo "<table border='1'>
<tr>
<th>id</th>
<th>item_no</th>
</tr>";
echo '</body>';

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['item_no'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo '<link rel="stylesheet" type="text/css" href="/css/style.css">';

mysql_close($con);
?>
