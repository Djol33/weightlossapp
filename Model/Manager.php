<?php

namespace Model;

class Manager
{
    private static $instance;
    public function __construct(){

    }
    public  static function Instance(){
        if(self::$instance == null){
            self::$instance = new Manager();
        }
        return self::$instance;
    }
    public function ExecuteOP(Operation $op){
        try{
            $res = $op->Execute();
            return $res;
        }
        catch (\PDOException $e){
            echo $e->getMessage();
            //header("Location: " .$_SERVER["HTTP_REFERER"] );
            return false;


        }
        catch(\Exception $e){

            header("Location: " .$_SERVER["HTTP_REFERER"] );
            return false;

        }


    }
}