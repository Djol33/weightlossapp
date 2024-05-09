<?php

namespace Model;

class ModelVerifyGetId extends Operation
{
    private $token;

    public function __construct( $token )
    {
        parent::__construct();

        $this->token=$token;

    }

    public function Execute()
    {

        $sql = "SELECT user_id FROM verify  WHERE token = ?";

        if($stmt= $this->db->prepare($sql)){
            $stmt->bindParam(1,$this->token);

            if($stmt->execute()){
                return $stmt->fetch();
            }
        }
        throw new \Exception("Greska");
    }
}