<?php

namespace Controller;
use Controller\BMR;
use Model\ModelTDEE;
use Model\Manager;
class TDEE extends Controller
{
    public static function Exec()
    {
        $man = Manager::Instance();
        $res = $man->ExecuteOP(new ModelTDEE($_SESSION["id"]));
        $total = BMR::Exec() * $res["coefficient"];
        echo $total;

    }

}