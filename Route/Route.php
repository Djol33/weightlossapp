<?php

namespace Route;
use Logger\Log;
class Route
{
    public static int $i = 0;
    public static $validRoute = array();

    public static function set($route, $http_method, array $allowedRoles, $method)
    {
        self::$validRoute = $route;

        if (isset($_SESSION["rolename"]) && in_array($_SESSION["rolename"], $allowedRoles) || !count($allowedRoles) || (in_array("undefined", $allowedRoles) && !isset($_SESSION['rolename']))) {


            if (isset($_GET["url"]) && $_GET["url"] == $route && $_SERVER["REQUEST_METHOD"] == $http_method && self::$i == 0) {

                $method->__invoke();
                $log = new Log($route, $http_method);
                $log->LogWrite();
                self::$i += 1;

                exit();


            } elseif (!isset($_GET["url"]) && $route == "home" && self::$i == 0) {
                self::$i += 1;
                $method->__invoke();
                $log = new Log("home", $http_method);
                $log->LogWrite();

                exit();

            } elseif ($route == "last" && self::$i == 0 && $_SERVER["REQUEST_METHOD"] == $http_method) {
                $method->__invoke();
                self::$i = 0;
                $log = new Log($route, $http_method);
                $log->LogWrite();

                exit();
            } elseif ($route == "last") {
                self::$i = 0;
            }


        }
    }

}