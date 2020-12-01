<?php
namespace App\Model;

use PDO;

class Conexao {
    private static $instance;

    public static function getConn() {
        if(!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=localhost;dbname=seu_banco;charset=utf8","seu_usuario","sua_senha");
        }
        return self::$instance;
    }
}
?>
