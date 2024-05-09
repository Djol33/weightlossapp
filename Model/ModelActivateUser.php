<?php

namespace Model;

class ModelActivateUser extends Operation
{

    private $user_id;
    public function __construct( $user_id)
    {
        parent::__construct();


        $this->user_id=$user_id;
    }

    public function Execute()
    {

        $sql = "UPDATE users SET   is_active=1 WHERE  id = ?";

        if($stmt= $this->db->prepare($sql)){

            $stmt->bindParam(1, $this->user_id);
            if($stmt->execute()){
                return true;
            }
        }
        return false;
    }
}