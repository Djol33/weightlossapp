<?php

namespace Model;

class ModelRole extends Operation
{
    private $roles;
    public function __construct($role)
    {
        parent::__construct();
        $this->roles = $role;

    }

    public function Execute()
    {
        $sql = "SELECT * FROM role WHERE rolename = :rolename";
        if($stmt = $this->db->prepare($sql)){
            $stmt->bindParam(":rolename", $_SESSION["rolename"]);
            if($stmt->execute()){

            }
        }
    }
}