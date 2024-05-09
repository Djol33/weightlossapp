<?php

namespace Model;
use PDO;
abstract class Operation
{
    protected $db;
    public function __construct(){
        try{

            $db =file("config/conn.txt")[0];
            $db = explode(":", $db);

            $this->db = new PDO("mysql:host=".$db[0].";dbname=".$db[3], $db[1], $db[2]);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(\PDOException $e){

            echo $e->getMessage();
            die();
        }
    }
    public  function LastId(){
        return $this->db->lastInsertId();
    }
    public abstract function Execute();
}