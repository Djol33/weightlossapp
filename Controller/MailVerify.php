<?php

namespace Controller;
use Model\ModelVerifyGetId;
use Model\Manager;
use Model\ModelActivateUser;
class MailVerify extends Controller
{
    public static function Exec()
    {
        if(isset($_GET["token"])){
            $token = $_GET["token"];
            $man = Manager::Instance();
            $res = $man->ExecuteOP(new ModelVerifyGetId($token));

            if($user_id = $res["user_id"]){
                $model = new ModelActivateUser($user_id);
                if($man->ExecuteOP($model)){
                    header("Location: login");
                }
            }

        }
    }

    public static function tokenGenerate():string{
        $bytes = random_bytes(64);
        $bytes =  base64_encode($bytes);
        return str_replace(['+', '-', '=', '/', '?','\\',' '], '', $bytes);
    }
}