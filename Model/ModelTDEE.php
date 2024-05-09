<?php

namespace Model;

class ModelTDEE extends Operation
{
    private $id_user;
    public function __construct($id_user)
    {
        parent::__construct();
        $this->id_user = $id_user;
    }

    public function Execute()
    {
        $sql = "SELECT * FROM activity WHERE id IN (select activity FROM users WHERE id = ?)";
        if($stmt = $this->db->prepare($sql)){
            $stmt->bindParam(1, $this->id_user);
            if($stmt->execute()){
                return $stmt->fetch();
            }
        }
    }
}