<?php

namespace Model;

class ModeBMR extends Operation
{
    private $id;
    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function Execute()
    {
        $sql = "SELECT height, gender, dateofbirth FROM users WHERE id = ?";
        if($stmt=$this->db->prepare($sql)){
            $stmt->bindParam(1, $this->id);
            if($stmt->execute() && $stmt->rowCount()==1){
                return $stmt->fetch();
            }
        }
        return false;

    }
}