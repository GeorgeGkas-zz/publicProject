<?php
  session_start();
  
    define("DB_HOST", 'mysql6.000webhost.com');
    define("DB_USER", 'a8559206_secret');
    define("DB_PASSWORD", 'Opweio0KpeiPoeknfr');
    define("DB_DATABSE", 'a8559206_chatDB');
    $UserEmail = $_SESSION['login'];
    $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysql_select_db(DB_DATABSE, $conn);


    //$qr = mysql_query("SELECT Id FROM Users WHERE UserEmail = '".$UserEmail."'");
   // echo  $UserInfo[0], $UserInfo[1],$UserInfo[2],$UserInfo[3], $UserInfo[4];
    if (isset($_POST['email2'])) {
      $email1 = $_POST["email2"];
      mysql_query("UPDATE Users SET UserEmail='".$email1."' WHERE UserEmail='".$UserEmail."'");
      //mysql_query("INSERT INTO Users(UserEmail) values('".$email."')") or die(mysql_error());
    }

    if (isset($_POST['passs2'])) {
      $pass1 = $_POST["passs2"];
      mysql_query("UPDATE Users SET UserPass='".$pass1."' WHERE UserEmail='".$UserEmail."'");
       //mysql_query("INSERT INTO Users(UserPass) values('".$pass."')") or die(mysql_error());
    }

    if (isset($_POST['username2'])) {
      $username1 = $_POST["username2"];
      mysql_query("UPDATE Users SET UserName='".$username1."' WHERE UserEmail='".$UserEmail."'");
       //mysql_query("INSERT INTO Users(UserName) values('".$username."')") or die(mysql_error());
    }
    $host  = $_SERVER['HTTP_HOST'];
    $link = "http://google.com";
    echo $link;
?> 
