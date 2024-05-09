<?php

namespace Model;

class ModelGetWeight extends Operation
{
    private $id;
    public function __construct($id)
    {

        parent::__construct();
        $this->id=$id;

    }

    public function Execute()
    {
        $sql = "SELECT weight FROM weight WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
        if($stmt = $this->db->prepare($sql)){
            $stmt->bindParam(1,$this->id);
            if($stmt->execute() && $stmt->rowCount() == 1){
                return $stmt->fetch();
            }
        }
        return false;
    }
}