<?php

namespace Controller;
use View\ViewLogin;
class LoginGET extends Controller
{
    public static function Exec()
    {
        $view = new ViewLogin();
        $view->Show();
    }

}