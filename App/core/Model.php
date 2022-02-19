<?php
use PDO;
class Model{
    private static $instance;
    public static function getConn(){
//        verificando se instancia com db ja existe
        if(!isset(self::$instance)){
            self::$instance = new PDO("mysql:host=localhost;dbname=crud_mvc", "root", "");
        }
        return self::$instance;
    }
}