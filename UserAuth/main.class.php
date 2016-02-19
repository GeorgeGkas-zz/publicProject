<?php 
    require_once '../lib/config.php';

    /**
    * 
    */
    class Main
    {
        protected $DHB  =   NULL;

        function __construct()
        {
            try {
                # DHB : Database Handle
                $this->DHB = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABSE, DB_USER, DB_PASSWORD);
                $this->DHB->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch(PDOException $e) {
                file_put_contents('../PDOErrors.txt', $e->getMessage(), FILE_APPEND);
            }
        }

        /*public function dbConn(PDO $dbConn) {
            $this->DHB = $dbConn;
        }*/

        protected function UserIsLogin() {
            if (isset($_SESSION['login'])) {
                return true;
            }
            else {
                return false;
            }
        }

        protected function getUserEmail() {
            return $_SESSION['login'];
        }

        protected function setUserEmail($email) {
            $_SESSION['login'] = $email;
        }

        protected function clearUserEmail() {
            unset($_SESSION['login']); 
        }

        protected function setReturnState($msg, $state = false) {
            return array('State' => $state, 'Msg' => $msg);
        }

    }


?>
