<?php
    session_start();
    header('Content-type: text/html; charset=utf-8');

    # REDIRECT USER IF LOGIN CREDENTIAL EXISTS
    if(isset($_SESSION['login'])) {
        header('Location: home.php');
    }

    require_once 'lib/config.php';

    # LOAD BCRYPT ENCRYPTION FILE
    # IMPLEMENTATION FROM ircmaxell <github.com/ircmaxell/password_compat>
    require_once 'lib/bcrypt.php';

    try {
        # DHB : Database Handle
        $DHB = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABSE, DB_USER, DB_PASSWORD);
        $DHB->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(PDOException $e) {
        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
    }

    # REGISTER FORM
    if(isset($_POST['register-button'])) {
        $UserEmail = $_POST['Remail'];
        $Pass1 = $_POST['RPass1'];
        $Pass2 = $_POST['RPass2'];

        if ($Pass1 == $Pass2) {
            try {
                # STH means "Statement Handle"
                $STH = $DHB->prepare("SELECT * FROM Users WHERE UserEmail = :user_email");
                $STH->bindParam(':user_email', $UserEmail);
                $STH->execute();

                
                if($STH->rowCount() > 0) {  # Check if username is already registered
                    echo "<script type='text/javascript'>alert('Email already registered');</script>";
                }
                else {
                    $hashed_pass = password_hash($Pass1, PASSWORD_BCRYPT);                

                    $STH = $DHB->prepare("INSERT INTO Users(UserEmail, UserPass) values(:user_email, :user_pass)");
                    $STH->bindParam(':user_email', $UserEmail);
                    $STH->bindParam(':user_pass', $hashed_pass);
                    $STH->execute();                
                }
            }
            catch(PDOException $e) {
                file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
            }
            
        }   
        else {
            echo "<script type='text/javascript'>alert('Passwords do not match');</script>";
        }
    }   # END OF REGISTER FORM

    # LOGIN FORM
    if(isset($_POST['login-button'])) {
        $UserEmail = $_POST['Lemail'];
        $Pass = $_POST['LPass'];

        try {
            $STH = $DHB->prepare("SELECT UserPass FROM Users WHERE UserEmail = :user_email");
            $STH->bindParam(':user_email', $UserEmail);
            $STH->execute();

            # Get the user pass
            $row = $STH->fetchAll();
            
            $isGood = password_verify($Pass, $row[0]['UserPass']);

            if ($isGood) {
                $_SESSION['login'] = $UserEmail;
                header("location:home.php");
            }
            else {
                echo "<script type='text/javascript'>alert('Wrong Login credentianls');</script>";
            }
        }
        catch(PDOException $e) {
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
        
    }   # END OF LOGIN FORM
?>
