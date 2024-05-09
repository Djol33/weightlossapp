<?php

namespace Model;

class ModelRegister extends Operation
{
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $height;
    private $dateofbirth;
    public function __construct($fname, $lname, $email, $password, $height, $dateofbirth)
    {
        parent::__construct();
        $this->dateofbirth = $dateofbirth;
        $this->password=$password;
        $this->email=$email;
        $this->fname=$fname;
        $this->lname=$lname;
        $this->height = $height;
    }

    public function Execute()
    {
        $sql = "INSERT INTO users (fname, lname, email, password, height, dateofbirth) VALUES (?,?,?,?,?, ?)";
        if($stmt=$this->db->prepare($sql)){
            $stmt->bindParam(1, $this->fname);
            $stmt->bindParam(2, $this->lname);
            $stmt->bindParam(3, $this->email);
            $stmt->bindParam(4, $this->password);
            $stmt->bindParam(5, $this->height);
            $stmt->bindParam(6, $this->dateofbirth);
            return $stmt->execute();
        }
        return false;
    }
}