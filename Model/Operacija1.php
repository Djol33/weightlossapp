<?php

namespace Model;

class Operacija1 extends Operation
{
    public function Execute()
    {
        $res = $this->db->prepare("SELECT * FROM users");
        $res->execute();
        $res = $res->fetchAll();
        return $res;


    }

}