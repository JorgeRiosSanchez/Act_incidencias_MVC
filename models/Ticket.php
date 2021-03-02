<?php


namespace Incidencias\Models;

include_once __DIR__.'/DB/sentences_sql.php';

class Ticket
{
    private static $dbService;

    public static function setDbService($dbService)
    {
        self::$dbService = $dbService;
    }

    public function __construct($id, $userId, $userName, $title, $category, $priority, $status, $message = null)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->userName = $userName;
        $this->title = $title;
        $this->category = $category;
        $this->priority = $priority;
        $this->status = $status;
        $this->message = $message;
    }

    public static function getAllTickets() {
        $tickets = [];
        try {
            $ticketsData = self::$dbService->selectAll(SQL_SELECT_ALL_TICKETS);
            if(count($ticketsData)>0) {
                foreach ($ticketsData as $ticketData){
                    $tickets[] = new Ticket($ticketData['ticketId'], $ticketData['userId'], $ticketData['userName'], $ticketData['ticketTitle'], $ticketData['ticketCategory'], $ticketData['ticketPriority'], $ticketData['ticketStatus'], $ticketData['ticketMessage']);
                }
            }
            return $tickets;
        } catch (PDOException $e) {
            die("ERROR - No se pudo completar la operación " . $e->getMessage());
        }
    }

    public static function getAllTicketsOfOneUser() {
        $tickets = [];
        try {
            $queryData = ['id' => $_SESSION['userId']];
            $ticketsData = self::$dbService->selectAll(SQL_SELECT_ALL_TICKETS_OF_USER, $queryData);
            if(count($ticketsData)>0) {
                foreach ($ticketsData as $ticketData){
                    $tickets[] = new Ticket($ticketData['id'], $ticketData['user_id'], null, $ticketData['title'], $ticketData['category'], $ticketData['priority'], $ticketData['status'], $ticketData['message']);
                }
            }
            return $tickets;
        } catch (PDOException $e) {
            die("ERROR - No se pudo completar la operación " . $e->getMessage());
        }
    }

    public static function getTicketById($id) {
        $ticket = null;
        $queryData = ['id' => $id];
        try {
            $ticketData = self::$dbService->selectBy($queryData, SQL_SELECT_TICKET_BY_ID);
            if(count($ticketData)>0) {
                $ticket = new Ticket($ticketData['id'], $ticketData['user_id'], null, $ticketData['title'], $ticketData['category'], $ticketData['priority'], $ticketData['status'], $ticketData['message']);
            }
            return $ticket;
        } catch (PDOException $e) {
            die("ERROR - No se pudo completar la operación " . $e->getMessage());
        }
    }

    public static function updateTicket($id) {
        $queryData = ['id' => $id, 'status' => 'close'];
        try {
            self::$dbService->updateByID($queryData, SQL_UPDATE_TICKET);
        } catch (PDOException $e) {
            die("ERROR - No se pudo completar la operación " . $e->getMessage());
        }
    }

    public static function insertTicket($ticket) {
        $queryData = ['userId'=>$ticket->userId, 'title'=>$ticket->title, 'category'=>$ticket->category, 'priority'=>$ticket->priority, 'message'=>$ticket->message];
        try {
            self::$dbService->insert($queryData, SQL_INSERT_TICKET);
            return self::$dbService->getLastInsertId();
        } catch (PDOException $e) {
            die("ERROR - No se pudo completar la operación " . $e->getMessage());
        }
    }
}