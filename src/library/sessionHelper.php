<?php


require_once MODELS . 'loginManager.php';
session_start();
class SessionHelper
{
   public function __construct()
   {
   }
   public static function sessionTime()
   {
      if (isset($_SESSION['time'])) {
         $login = $_SESSION['time'];

         $expire = $_SESSION['time'] + (1 * 60);

         $now = new DateTime();
         $timestamp = $now->getTimestamp();
         $diff = $timestamp - $login;

         if ($timestamp  > $expire) {
            LoginManager::logOut();
         }
      }
   }
}
