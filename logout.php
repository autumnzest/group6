<?php
session_start();
if($_GET['action'] == "logout"){
    session_destroy();
    echo 'logout success！click <a href="userlogin.html">登録</a>';
    exit;
}

?>
