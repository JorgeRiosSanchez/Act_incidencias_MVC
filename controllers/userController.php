<?php
namespace Incidencias\Controllers;
include_once __DIR__.'/../models/User.php';
include_once __DIR__.'/../models/DB/DB.php';
include_once __DIR__.'/../models/Validation.php';

use Incidencias\Models\User;
use Incidencias\Models\DB\{Connection, DB};
use Incidencias\Models\Validation;

$validation = new Validation();
$pdo = Connection::getConnection();
User::setDbService(new DB());

if(isset($_GET['action'])) {
    if($_GET['action'] === 'registerNewUser') {
        include_once __DIR__ . "/../views/register.php";
        die();
    }
}

if($_SERVER["REQUEST_METHOD"] === 'POST') {
    if(isset($_GET['action'])) {
        if($_GET['action'] === 'login'){
            $username = $validation->test_input($_POST['username']);
            $password = $validation->test_input($_POST['password']);
            $user = User::getUserByUserName($username);
            if(!$user || $user->password != $password){
                header("location: ./index.php?login=failed");
            } else {
                $_SESSION["userId"] = $user->id;
                $_SESSION["userName"] = $user->name;
                $_SESSION["userType"] = $user->type;
                $_SESSION["success"] = true;
                header('location: ./index.php');
            }
        }

        if($_GET['action'] === 'register'){
            $name = $validation->test_input($_POST['name']);
            $surname = $validation->test_input($_POST['surname']);
            $username = $validation->test_input($_POST['username']);
            $password = $validation->test_input($_POST['password']);
            $validation->requiredEmptyFieldUserForm($_POST);
            $errorsInForm = $validation->getErrors();
            if(isset($errorsInForm["errorDataOperation"])) $errorDataOperation = $errorsInForm["errorDataOperation"];
            if(isset($errorsInForm["errorname"])) $errorNameMessage = $errorsInForm["errorname"];
            if(isset($errorsInForm["errorsurname"])) $errorSurnameMessage = $errorsInForm["errorsurname"];
            if(isset($errorsInForm["errorusername"])) $errorUsernameMessage = $errorsInForm["errorusername"];
            if(isset($errorsInForm["errorpassword"])) $errorPasswordMessage = $errorsInForm["errorpassword"];
            if (isset($errorDataOperation) && $errorDataOperation) {
                include_once __DIR__ . "/../views/register.php";
                die();
            }
            $user = new User(null, $name, $surname, $username, $password, null);
            User::insertUser($user);
            header('location: ./index.php?registered=true');
        }
    }
}
include_once __DIR__ . "/../views/login.php";
Connection::closeConnection();