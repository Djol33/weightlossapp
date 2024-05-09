<?php

namespace Controller;

class LogOut extends Controller
{

    public static function Exec()
    {
        unset($_SESSION["id"]);
        unset($_SESSION["rolename"]);
        header("Location: login");
    }

}