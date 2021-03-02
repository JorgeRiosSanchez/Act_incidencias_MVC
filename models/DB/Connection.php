<?php

namespace Incidencias\Models\DB;
include_once 'db_conf.php';
use PDO;

class Connection {

    private function __construct(){}

    private function __clone(){}

    public static function getConnection() {
        try {
            $pdo = new PDO(DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            //echo $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);
            return $pdo;
        } catch (PDOException $err) {
            die($err);
        }
    }

    public static function closeConnection() {
        global $pdo;
        unset($pdo);
    }
}