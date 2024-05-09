<?php

namespace Model;

class ModelLogin extends Operation
{
    private $email;
    private $password;
    public function __construct($email,$password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }
    public function Execute()
    {
        $sql = "SELECT id, email, password, role FROM users WHERE email = ?";
        if($stmt= $this->db->prepare($sql)){
            $stmt->bindParam(1, $this->email);
            if($stmt->execute() && $stmt->rowCount() == 1){
                $res= $stmt->fetch();
                if($this->password == $res["password"]){
                    return $res;
                }
            }
        }
        return false;
    }

}