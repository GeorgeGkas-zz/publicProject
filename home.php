 <?php
  session_start();
  if(!isset($_SESSION['login'])) {
      header('Location: index.php');
    }


    define("DB_HOST", '=);
    define("DB_USER", '=');
    define("DB_PASSWORD", '=');
    define("DB_DATABSE", '=');

    $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysql_select_db(DB_DATABSE, $conn);
    $UserEmail = $_SESSION['login'];
    $sq = mysql_query("SELECT * FROM Users WHERE UserEmail = '".$UserEmail."'");
    $UserInfo = mysql_fetch_row($sq);
   // echo  $UserInfo[0], $UserInfo[1],$UserInfo[2],$UserInfo[3], $UserInfo[4];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Secreat Sea</title>

  <link rel="stylesheet" type="text/css" href="home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript" src="js/home.js"></script>

</head>

<body>
  <div class="wrapper">
    <div class="header">
      <div class="icon">
        <img src="img/Lovelogo.svg" height="50px" width="50px">
      </div>

      <div class="avatar-menu" id="avatar-menu">
     
      <div class="UserName" id="UsN"><?php echo $UserInfo[4] ?></div>
      <div class="UserMenu" id="UserMenu">
        <div style="text-align: center;" id="">
        <a id="pref" style="cursor: pointer;">Preferences</a> | <a id="logout" style="cursor: pointer;">Sign Out</a>
        </div>
      </div>
      </div>
      

    </div>

    <div class="container">
    <div class="preferences" id="preferences">
      <div class="pref-header">
        Edit your Profile 
        <div style="display: inline-block; font-family: Lato; font-size: 15px;" >UserId: 85655689</div>
      </div>
      

      <div style="display: inline-block; margin: 0 auto;">
        
  <!-- PROBLEM HERE-->
      <form class="pref-changes" id="pref-changes" method="POST">
      <div class="pref_avatar">
        <div class="avatar_change">Change</div>
      </div> 
        <div style="margin-top: 10px;">
            <label >Change Username</label>
           <input id="Puser" name="username" class="pref_inp"  placeholder="<?php echo $UserInfo[2] ?>" type="text">
        </div>

        <div class="lbl">
            <label>Change Email</label>
           <input id="Pemail" name="email" class="pref_inp" placeholder="<?php echo $UserInfo[4] ?>" type="email">
        </div>
         <div class="lbl">
            <label>Change Password</label>
           <input id="Ppass" name="pass" class="pref_inp" placeholder="Password" type="password" >
        </div>
        
        <div class="update_btn">
          <button type="submit" id="update_profile" name="update_profile">Update</button>
        </div>

      </form>
      
      </div>
    </div>
    <div>
    </div>



   
    </div>

  </div>



</body>
</html>
