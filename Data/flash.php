<?php
function hasFlash($key){
    return isset($_SESSION[$key]) && $_SESSION[$key];
}

function setFlash($key,$value){
    if (!isset($_SESSION[$key])) {
        $_SESSION[$key] = array();
    }
    $_SESSION[$key][]= $value;
}

function getFlashData($key){
    if(!hasFlash($key)){
        return null;
    }
    $data = $_SESSION[$key];
    unset($_SESSION[$key]);
    return $data;
}


