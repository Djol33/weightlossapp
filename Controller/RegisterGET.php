<?php

namespace Controller;
use View\ViewRegister;

class RegisterGET extends Controller
{
    public static function Exec()
    {
        $view = new ViewRegister();
        $view->Show();
    }
}