<?php
 $db = Db::getInstance();


  class Db {
    private static $instance = NULL;

    // here using singleton designe pattern to prevent multi DB connection 
    private function __construct() {

    }

    private function __clone() {
      
    }

    public static function getInstance() {

      if (!isset(self::$instance)) {
        require_once('helpers/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host='.$config['host'].';
                                   dbname='.$config['db_name'],
                                   $config['user'],$config['pass'],
                                   $pdo_options);
      }
      return self::$instance;
    }
  }
?>