<?php
// session_start();

require_once MODELS . 'loginManager.php';
class LoginController extends Controller
{
   function __construct()
   {
      parent::__construct('user');
      $this->model = new LoginManager();
   }
   public function showLoginPage()
   {
      $this->view->render('loginBoard');
   }
   public function login()
   {
      if (isset($_REQUEST['email'])) {
         $isLoggedIn = $this->model->loggedIn($_REQUEST['email'], $_REQUEST['password']);
         if ($isLoggedIn) {
            $showDashboard = new View('Employee');
            $showDashboard->render('dashboard');
         } else {
            $this->showLoginPage();
            echo 'not loogedin';
         }
      } else {
         $this->showLoginPage();
         echo 'not loogedin2';
      }
   }
   // public function sessionDetails($id)
   // {  
   //    LoginManager::sessionData($id);
   // }
}
// require_once MODELS . "loginManager.php";
// $error = '';

// if(!isset($_SESSION['userID'])){
//     if (!empty($_POST)) {
//         if (isset($_POST['email']) && isset($_POST['password'])) {
//             $userLog = loggedIn($_POST['email'], $_POST['password']);
//             if ($userLog == true) {
//                 sessionData('userId');
//                 require VIEWS . "Employee/dashboard.php";
//             } else {
//                 echo $error .= 'wrong credentials';
//             }
//         }
//     }else{
//         require VIEWS . "User/loginboard.php";
//     }
// }else {
//     if(isset($_REQUEST['action'])){
//         call_user_func($_REQUEST['action'], $_REQUEST);
//         die();
//     }
//     require VIEWS . "Employee/dashboard.php";
// }
