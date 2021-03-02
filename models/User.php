<?php

namespace Incidencias\Models;

include_once __DIR__.'/DB/sentences_sql.php';

class User
{
    private static $dbService;

    public static function setDbService($dbService)
    {
        self::$dbService = $dbService;
    }

    public function __construct($id, $name, $surname, $username, $password, $type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
    }

    public static function getUserByUserName($username) {
        $user = null;
        $queryData = ['username'=>$username];
        try {
            $userData = self::$dbService->selectBy($queryData, SQL_SELECT_USER_BY_USERNAME);
            if(count($userData)>0) {
                $user = new User($userData['id'], $userData['name'], $userData['surname'], $userData['username'], $userData['password'], $userData['type']);
            }
            return $user;
        } catch (PDOException $e) {
            die("ERROR - No se pudo completar la operación" . $e->getMessage());
        }
    }

    public static function insertUser($user) {
        $queryData = ['name'=>$user->name, 'surname'=>$user->surname, 'username'=>$user->username, 'password'=>$user->password];
        try {
            self::$dbService->insert($queryData, SQL_INSERT_USER);
        } catch (PDOException $e) {
            die("ERROR - No se pudo completar la operación de inserción " . $e->getMessage());
        }
    }
}