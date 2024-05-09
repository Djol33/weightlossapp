<?php

namespace Model;

class ModelVerifyAdd extends Operation
{

    private $token;
    private $user_id;
    public function __construct( $token,$user_id)
    {
        parent::__construct();

        $this->token=$token;
        $this->user_id=$user_id;
    }

    public function Execute()
    {

        $sql = "INSERT INTO verify (token, user_id ) VALUES (?,?)";

        if($stmt= $this->db->prepare($sql)){
            $stmt->bindParam(1,$this->token);
            $stmt->bindParam(2, $this->user_id);
            if($stmt->execute()){
                return true;
            }
        }
        return false;
    }
}