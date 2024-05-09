<?php

namespace Model;

class ModelSetWeight extends Operation
{
    private $user_id;
    private $weight;
    public function __construct($user_id, $weight)
    {
        parent::__construct();
        $this->user_id=$user_id;
        $this->weight=$weight;
    }

    public function Execute()
    {
        $sql = "INSERT INTO weight (user_id, weight) VALUES (?,?)";
        if($stmt = $this->db->prepare($sql)){
            $stmt->bindParam(1, $this->user_id);
            $stmt->bindParam(2,$this->weight);
            return $stmt->execute();
        }
    }

}