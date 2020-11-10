
<?php
define("BASE_PATH", getcwd());
require 'config/constants.php';
require_once 'src/library/sessionHelper.php';
require_once 'src/library/Router.php';
require_once 'src/library/classes/database.php';
require_once 'src/library/classes/model.php';
require_once 'src/library/classes/view.php';
require_once 'src/library/classes/controllers.php';



// //base_path always in root so it works well
$app = new Router();
?>