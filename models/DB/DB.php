<?php

namespace Incidencias\Models\DB;
include_once __DIR__.'/Connection.php';
use PDO;
class DB{

    public function __construct(){}

    private function executeQuery ($queryData, $sql, $getData = false) {
        global $pdo;
        $stm = $pdo->prepare($sql);
        $wasOK = $stm->execute($queryData);
        return $getData ? $stm : $wasOK;
    }

    public function getLastInsertId () {
        global $pdo;
        return $pdo->lastInsertId();
    }

    public function insert($queryData, $sql) {
        return $this->executeQuery($queryData, $sql);
    }

    public function selectAll($sql, $queryData = []) {
        $rows = [];
        $stm = $this->executeQuery($queryData, $sql, true);
        if($stm->rowCount() > 0){
            while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function selectBy($queryData, $sql) {
        $rowData = [];
        $stm =  $this->executeQuery($queryData, $sql, true);
        if($stm->rowCount() > 0){
            $rowData = $stm->fetch(PDO::FETCH_ASSOC);
        }
        return $rowData;
    }

    public function deleteByID($queryData, $sql) {
        return $this->executeQuery($queryData, $sql);
    }

    public function updateByID($queryData, $sql) {
        return $this->executeQuery($queryData, $sql);
    }
}