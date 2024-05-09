<?php

namespace Logger;

class Log
{
    private $route;
    private $method;
    public function __construct($route, $method){
        $this->method = $method;
        $this->route = $route;

    }
    public function LogWrite(){
        @$file = fopen("Logger/Logs.txt", "a");
        $row = (string)time() . " " . $this->method." ".http_response_code()." ".$this->route." ".$_SERVER["REQUEST_URI"] ."\n";
        fwrite($file, $row);
        fclose($file);


    }
}