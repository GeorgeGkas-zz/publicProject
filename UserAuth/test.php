<?php 
    session_start();
    require_once 'userAuth.class.php';

    $USER = new userAuth();

    if( $USER->isLogin()) {
        echo $USER->showEmail();
    }


    if (isset($_POST['login-button'])) {
        $login = $USER->Login($_POST['Lemail'], $_POST['LPass']);
        if ($login['State'] == true) {
            echo $USER->showEmail();
        }
        else {
            echo $login['Msg'];
        }
    }

    if (isset($_POST['register-button'])) {
        $register = $USER->Register($_POST['Remail'], $_POST['RPass1'], $_POST['RPass2'], $_POST['g-recaptcha-response']);
        if ($register['State'] == true) {
            echo "We have register your email to our databases.";
        }
        else {
            echo $register['Msg'];
        }
    }

    if (isset($_POST['logout-button'])) {
        $USER->Logout();
    }



?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form id="login" method="POST">     
        <input id="Lemail" name="Lemail" placeholder="Email" required="required" type="email" autocomplete="off">
        <input id="LPass" name="LPass" placeholder="Password" required="required" type="password" autocomplete="off">
        <button type="submit" id="login-button" name="login-button">Dive</button>
                
    </form>

    <form id="register" method="POST">
        <input id="Remail" name="Remail" placeholder="Your_Email@secretsea.com" required="required" type="text" autocomplete="off" >
        <input id="RPass1" name="RPass1" placeholder="Your Password" required="required" type="password" autocomplete="off">
        <input id="RPass2" name="RPass2" placeholder="Your Password" required="required" type="password" autocomplete="off">     
        <button type="submit" id="register-button" name="register-button">Register</button>
    </form>


    <form id="logout" method="POST">
        <button id="logout-button" name="logout-button">Logout</button>
    </form>
    

</body>
</html>
