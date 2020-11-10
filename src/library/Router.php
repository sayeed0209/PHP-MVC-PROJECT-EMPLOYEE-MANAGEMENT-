<?php
class Router
{
    function __construct()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            $controllerFile = 'src/controllers/' . $url[0] . '.php';
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $fileName = $url[0];
                $controller = new $fileName;
                if (isset($url[1])) {
                    if (method_exists($controller, $url[1])) {
                        $methodName = $url[1];
                        if (isset($url[2])) {
                            // here we are first unsert the filename and then we unset the method and start from params 
                            unset($url[0]);
                            unset($url[1]);
                            // var_dump($url);
                            call_user_func(array($controller, $methodName), $url);
                        } else {
                            $controller->{$methodName}();
                        }
                    } else {
                        // echo 'method does not exists';
                        $this->loginController();
                    }
                } else {
                    // echo 'there is no method we found';

                    // echo 'trying to get why its not logged in';
                    $this->loginController();
                }
            } else {
                // echo 'file does not exist';
                $this->loginController();
            }
        } else {
            // echo ' error';
            $this->loginController();
        }
    }
    public function loginController()
    {
        require_once  CONTROLLERS . 'loginController.php';
        require_once 'assets/head.html';
        $login = new LoginController();
        $login->view->render('loginBoard');
    }
}
