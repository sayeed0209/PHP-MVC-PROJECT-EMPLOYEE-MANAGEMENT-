<?php
require 'src/library/classes/model.php';
class LoginManager extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function loggedIn($email, $password)
    {
        $conn = $this->db->connect();
        $query = "SELECT * FROM users WHERE email= '$email' AND  password ='$password'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        if ($stmt->rowCount()) {
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        } else {
            return false;
        }


        // $jsonData = RESOURCES . 'users.json';
        // $file = file_get_contents($jsonData);

        // $json = json_decode($file);
        // $array = $json->users;

        // echo 'hola';



        //   }
        // for ($i = 0; $i < count($array); $i++) {
        //     if ($array[$i]->email == $email && password_verify($password, $array[$i]->password)) {
        //         self::sessionData($array[$i]->userId);
        //         return true;
        //     } else {

        //         return false;
        //     }
        // }
    }

    public static function sessionData($id)
    {
        $_SESSION['userID'] = $id;
        $timestamp = new DateTime();
        $_SESSION['time'] = $timestamp->getTimestamp();
    }
    public static function logOut()
    {
        session_unset();
        session_destroy();
        header('Location:#');
    }
}
