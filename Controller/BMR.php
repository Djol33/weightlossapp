<?php

namespace Controller;

use DateTime;
use Model\Manager;
use Model\ModeBMR;
use Model\ModelGetWeight;

class BMR extends Controller
{

    public static function Exec()
    {
        $man = Manager::Instance();
        $RES= $man->ExecuteOP(new ModelGetWeight($_SESSION["id"]));
        extract($RES);
        $ha = $man->ExecuteOP(new ModeBMR($_SESSION["id"]));
        extract($ha);
        $currentDate = new DateTime();
        $dateOfBirt = new DateTime($dateofbirth);

        $age = date("Y", strtotime($dateofbirth));
        $age = $currentDate->diff($dateOfBirt)->y;

        if($gender){
            $bmr = 10*$weight +6.25*$height -5*$age -161;
            return $bmr;

        }else{
            $bmr = 10*$weight +6.25*$height -5*$age + 5;
            return $bmr;
        }
    }
}