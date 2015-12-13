<?php
  session_start();
  
    define("DB_HOST", '');
    define("DB_USER", '');
    define("DB_PASSWORD", '');
    define("DB_DATABSE", '');
    $UserEmail = $_SESSION['login'];
    $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysql_select_db(DB_DATABSE, $conn);

    if (isset($_POST['email2'])) {
      $email1 = $_POST["email2"];
      mysql_query("UPDATE Users SET UserEmail='".$email1."' WHERE UserEmail='".$UserEmail."'");
    }

    if (isset($_POST['passs2'])) {
      $pass1 = $_POST["passs2"];
      mysql_query("UPDATE Users SET UserPass='".$pass1."' WHERE UserEmail='".$UserEmail."'");
    }

    if (isset($_POST['username2'])) {
      $username1 = $_POST["username2"];
      mysql_query("UPDATE Users SET UserName='".$username1."' WHERE UserEmail='".$UserEmail."'");
    }
    $host  = $_SERVER['HTTP_HOST'];
    $link = "http://google.com";
    echo $link;
?> 
