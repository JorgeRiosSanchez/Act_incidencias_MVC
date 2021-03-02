<?php

namespace Incidencias\Controllers;
include_once __DIR__.'/../models/Validation.php';
include_once __DIR__.'/../models/DB/DB.php';
include_once __DIR__.'/../models/Ticket.php';

use Incidencias\Models\Validation;
use Incidencias\Models\DB\{Connection, DB};
use Incidencias\Models\Ticket;

$validation = new Validation();
$pdo = Connection::getConnection();
Ticket::setDbService(new DB());

if(isset($_GET['action'])){
    if($_GET['action'] === 'logout') {
        session_unset();
        session_destroy();
        header("location: ./index.php");
    }
    if($_GET['action'] === 'selectTicket') {
        $ticket = Ticket::getTicketById($_GET['ticketId']);
        include_once __DIR__ . "/../views/view-ticket.php";
        die();
    }
}

if($_SESSION['userType'] === 'admin') {
    if(isset($_GET['action']) && $_GET['action'] === 'closeTicket') {
        Ticket::updateTicket($_GET['ticketId']);
        header('location: ./index.php?closed=true');
        die();
    }
    $tickets = Ticket::getAllTickets();
    include_once __DIR__ . "/../views/main-admin.php";
}

if($_SESSION['userType'] === 'normal') {
    if(isset($_GET['action']) && $_GET['action'] === 'getCreate') {
        include_once __DIR__ . "/../views/create-ticket.php";
        die();
    }

    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        $title = $validation->test_input($_POST['title']);
        $category = $validation->test_input($_POST['category']);
        $priority = $validation->test_input($_POST['priority']);
        $message = $validation->test_input($_POST['message']);
        $validation->requiredEmptyFieldTicketForm($_POST);
        $errorsInForm = $validation->getErrors();
        if(isset($errorsInForm["errorDataOperation"])) $errorDataOperation = $errorsInForm["errorDataOperation"];
        if(isset($errorsInForm["errortitle"])) $errorTitleMessage = $errorsInForm["errortitle"];
        if(isset($errorsInForm["errorcategory"])) $errorCategoryMessage = $errorsInForm["errorcategory"];
        if(isset($errorsInForm["errorpriority"])) $errorPriorityMessage = $errorsInForm["errorpriority"];
        if (isset($errorDataOperation) && $errorDataOperation) {
            include_once __DIR__ . "/../views/create-ticket.php";
            die();
        }
        $ticket = new Ticket(null, $_SESSION['userId'], null, $title, $category, $priority, null, $message);
        $idTicketInserted = Ticket::insertTicket($ticket);
        include_once __DIR__ . "/../views/create-ticket.php";
        die();
    }
    $tickets = Ticket::getAllTicketsOfOneUser();
    include_once __DIR__ . "/../views/main-normal.php";
}
Connection::closeConnection();