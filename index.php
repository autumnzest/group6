<?php
session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
include('conn.php');

if($_GET['action'] == "submit"){
	$username = htmlspecialchars($_POST['username']);
        $password = MD5($_POST['password']);
        $check_query = mysql_query("select user_id from user_list where user_name='$username' and password='$password' limit 1");
  if($res = mysql_fetch_array($check_query)){
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $res['user_id'];
	}else{
	$username = "登録失敗しました";
	}
}

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


if($_SESSION['userid']!=null){
    $username = "<a href='#'>Welcome!" . $username . "</a>";
  }else{
	$username = "<a href='userlogin.html'>Sign In</a>";}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Group 6</title>
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/assets/animate/animate.css" />
<link rel="stylesheet" href="/assets/animate/set.css" />
<link rel="stylesheet" href="/assets/gallery/blueimp-gallery.min.css">
<link rel="stylesheet" href="/assets/style.css">

</head>

<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><img src="images/logo.png"  width="300px" alt="logo"></a>
              <!-- #Logo Ends -->
            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                 <li class="active"><?php echo $username;?></li>
                 <li ><a href="useredit.php">Information</a></li>
                 <li ><a href="logout.php?action=logout">Logout</a></li>
                 <li ><a href="#contact">Contact</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
<!-- #Header Starts -->

<!-- works -->
<div id="works"  class=" clearfix grid"> 
<?php
while($row = mysql_fetch_array($result))
  {
  echo "<figure class='effect-oscar  wowload fadeInUp'>";
  echo "<img src='". $row["img_address"] ."' alt='img01' width='400px' height='400px' />";
  echo "<figcaption>";
  echo "<h2>". $row["user_name"] ."</h2>";
  echo "<p>". $row["age"] ."才<br/>";
  echo "<p>". $row["height"] ."cm<br/>";
  echo "<p>". $row["weight"] ."kg<br/>";
  echo "<p>". $row["info"] ."<br/>";
  echo "<a href='useredit.php?userid=". $row["user_id"] ."'>View more</a></p>";
  echo "</figcaption>";
  echo "</figure>";
  }
?>  
     
</div>


<!-- team -->
<h3 class="text-center  wowload fadeInUp">Group 6</h3>
<p class="text-center  wowload fadeInLeft">Our creative team that is making everything possible</p>
<div class="row grid team  wowload fadeInUpBig">	
	<div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/zhaozhidong.jpg" alt="" class="img-responsive"/>
        <figcaption>
            <p><b>趙　志東</b><br>Senior Designer<br><br><a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>            
        </figcaption>
    </figure>
    </div>

    <div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/zhangjiarui.jpg" alt=""/>
        <figcaption>            
            <p><b>張　家瑞</b><br>Senior Designer<br><br><a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>            
        </figcaption>
    </figure>
    </div>

    <div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/xialina.jpg" alt=""/>
        <figcaption>
            <p><b>夏　立娜</b><br>Senior Designer<br><br><a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>          
        </figcaption>
    </figure>
    </div>

    <div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/zhangyulong.jpg" alt=""/>
        <figcaption>
            <p><b>張　玉龍</b><br>敵を知り、己を知れ<br><br><a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>
        </figcaption>
    </figure>
    </div>
    
    <div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/zhaohenghan.jpg" alt=""/>
        <figcaption>
            <p><b>趙　恒悍</b><br>Senior Designer<br><br><a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>
        </figcaption>
    </figure>
    </div>
    
    <div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/zhubeihong.jpg" alt=""/>
        <figcaption>
            <p><b>朱　倍宏</b><br>Senior Designer<br><br><a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>
        </figcaption>
    </figure>
    </div>

 
</div>
<!-- team -->

</div>

<!--Contact Starts-->
<div id="contact" class="spacer">

<div class="container contactform center">
<h2 class="text-center  wowload fadeInUp">Contact Us</h2>
  <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12">      
        <input type="text" placeholder="Name">
        <input type="text" placeholder="Company">
        <textarea rows="5" placeholder="Message"></textarea>
        <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
      </div>
  </div>



</div>
</div>
<!--Contact Ends-->



<!-- Footer Starts -->
<div class="footer text-center spacer">
<p class="wowload flipInX"><a href="#"><i class="fa fa-facebook fa-2x"></i></a> <a href="#"><i class="fa fa-instagram fa-2x"></i></a> <a href="#"><i class="fa fa-twitter fa-2x"></i></a> <a href="#"><i class="fa fa-flickr fa-2x"></i></a> </p>
Copyright 2014 CloudGroup6. 
</div>
<!-- # Footer Ends -->
<a href="#works" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>

<!-- jquery -->
<script src="/assets/jquery.js"></script>
<script src="/assets/wow/wow.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
<script src="/assets/mobile/touchSwipe.min.js"></script>
<script src="/assets/respond/respond.js"></script>
<script src="/assets/gallery/jquery.blueimp-gallery.min.js"></script>
<script src="/assets/script.js"></script>

</body>
</html>
