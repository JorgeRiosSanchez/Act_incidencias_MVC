<?php

namespace Incidencias\Models;

class Validation{

    private $errorsForm;

    public function __construct() {
        $this->errorsForm = [];
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    private function requiredFieldData($fieldName, $param) {
        if(empty($param)) {
            $this->errorsForm["error".$fieldName] = 'Campo obligatorio';
            $this->errorsForm["errorDataOperation"] = true;
        }
    }

    public function requiredEmptyFieldUserForm($params) {
        if(isset($params['name'])) $this->requiredFieldData("name", $params['name']);
        if(isset($params['surname'])) $this->requiredFieldData("surname", $params['surname']);
        if(isset($params['username'])) $this->requiredFieldData("username", $params['username']);
        if(isset($params['password'])) $this->requiredFieldData("password", $params['password']);
    }

    public function requiredEmptyFieldTicketForm($params) {
        if(isset($params['title'])) $this->requiredFieldData("title", $params['title']);
        if(isset($params['category'])) $this->requiredFieldData("category", $params['category']);
        if(isset($params['priority'])) $this->requiredFieldData("priority", $params['priority']);
    }

    public function getErrors() {
        return $this->errorsForm;
    }
}