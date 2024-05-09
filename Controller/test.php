<?php

namespace Controller;
use Model\Manager;
use Model\ModeBMR;
use Model\ModelGetWeight;

class test extends Controller
{

    public static function Exec()
    {

        $man = Manager::Instance();
        $RES= $man->ExecuteOP(new ModelGetWeight($_SESSION["id"]));
        extract($RES);
        $ha = $man->ExecuteOP(new ModeBMR($_SESSION["id"]));
        extract($ha);
        $currentDate = new \DateTime();
        $dateOfBirt = new \DateTime($dateofbirth);

        $age = date("Y", strtotime($dateofbirth));
        $age = $currentDate->diff($dateOfBirt)->y;
        echo $age. " \n";
        if($gender){
            $bmr = 10*$weight +6.25*$height -5*$age -161;
            echo $bmr;

        }else{
            $bmr = 10*$weight +6.25*$height -5*$age + 5;
            echo $bmr;
        }
    }

}