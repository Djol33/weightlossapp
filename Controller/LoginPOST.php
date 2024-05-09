<?php

namespace Controller;
use GeneralFunction\RegexValidation;
use Model\Manager;
use Model\ModelLogin;
class LoginPOST extends Controller
{

    public static function Exec()
    {
        $err=0;
        if(checkIfSetPost("email", "password")){
            extract($_POST);
        }
        if(!RegexValidation::email($email)){
            setFlash("loginError", "Unesite validan email, npr. marija.marijanovic@gmail.com");
            $err++;
        }
        if(!RegexValidation::password($password)){
            setFlash("loginError", "Lozinka mora da ima najmanje 8 karaktera i da sadrži makar jedan karakter i jedan broj");
            $err++;
        }
        if($err){
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }
        else{
            $man = Manager::Instance();
            if($res= $man->ExecuteOP(new ModelLogin($email, $password))){
                $_SESSION["id"] = $res["id"];
                $_SESSION["rolename"] = $res["role"];

            }
            else{
                setFlash("loginError", "Proverite Email ili lozinku");
                header("Location: ".$_SERVER["HTTP_REFERER"]);
            }
        }
    }
}