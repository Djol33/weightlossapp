<?php


use Route\Route;
use Controller\RegisterGET;
use Controller\RegisterPOST;
use Controller\MailVerify;
use Controller\LoginGET;
use Controller\LoginPOST;
use Controller\test;
use Controller\TDEE;
Route::set("home", "GET",[], function (){
    echo "page home";


});
Route::set("a", "GET", [],function (){
    echo "page a";
});
Route::set("register", "GET", ["undefined"],function (){
    RegisterGET::Exec();
});
Route::set("register", "POST", ["undefined"],function (){
    RegisterPOST::Exec();
});

Route::set("verify", "GET",["undefined"], function (){
    MailVerify::Exec();
});

Route::set("login", "GET",["undefined"], function (){
    LoginGET::Exec();
});



Route::set("login", "POST",["undefined"], function (){
    LoginPOST::Exec();
});


Route::set("test", "GET",[1], function (){
    test::Exec();
});



Route::set("TDEE", "GET",[1], function (){
    TDEE::Exec();
});






Route::set("last", "GET",[], function (){
    echo "No page";
});


