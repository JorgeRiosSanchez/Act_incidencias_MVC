<?php

namespace Incidencias\Models\DB;
include_once __DIR__.'/db_conf.php';
define("SQL_SELECT_USER_BY_USERNAME", "SELECT * FROM ".DB_TABLE_USERS." WHERE username=:username");
define("SQL_INSERT_USER", "INSERT INTO ".DB_TABLE_USERS." (name, surname, username, password) VALUES (:name, :surname, :username, :password)");
define("SQL_SELECT_ALL_TICKETS", "SELECT users.id as userId, users.name as userName, tickets.id as ticketId, tickets.title as ticketTitle, tickets.category as ticketCategory,
        tickets.priority as ticketPriority, tickets.status as ticketStatus, tickets.message as ticketMessage FROM ".DB_TABLE_TICKETS." JOIN ".DB_TABLE_USERS." ON tickets.user_id = users.id");
define("SQL_SELECT_ALL_TICKETS_OF_USER", "SELECT * FROM ".DB_TABLE_TICKETS." WHERE user_id = :id");
define("SQL_SELECT_TICKET_BY_ID", "SELECT * FROM ".DB_TABLE_TICKETS." WHERE id = :id");
define("SQL_UPDATE_TICKET", "UPDATE ".DB_TABLE_TICKETS." SET status = :status WHERE id = :id");
define("SQL_INSERT_TICKET", "INSERT INTO ".DB_TABLE_TICKETS." (user_id, title, category, priority, message) VALUES (:userId, :title, :category, :priority, :message)");