<?php
session_start();
if(!isset($_SESSION["success"])){
    include_once 'controllers/userController.php';
    die();
}
include_once 'controllers/ticketsController.php';