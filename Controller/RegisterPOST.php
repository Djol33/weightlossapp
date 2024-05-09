<?php

namespace Controller;
use Model\Manager;
use Model\ModelRegister;
use GeneralFunction\RegexValidation;
use PHPMailer\PHPMailer\PHPMailer;
use Controller\MailVerify;
use Model\ModelVerifyAdd;
use Model\ModelSetWeight;
class RegisterPOST extends Controller
{
    public static function Exec()
    {
        $err = 0;
        if(checkIfSetPost("fName", "lName", "email", "password", "confPassword","height", "weight", "dateofbirth")){
            extract($_POST);
            $man = Manager::Instance();
            $fName = htmlspecialchars($fName, ENT_QUOTES, 'UTF-8');
            $lName = htmlspecialchars($lName, ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
            $confPassword = htmlspecialchars($confPassword, ENT_QUOTES, 'UTF-8');
            $height = htmlspecialchars($height, ENT_QUOTES, 'UTF-8');
            $weight = htmlspecialchars($weight, ENT_QUOTES, 'UTF-8');
            $dateofbirth = htmlspecialchars($dateofbirth, ENT_QUOTES, 'UTF-8');
            if(!RegexValidation::ime($fName)){
                setFlash("registerError", "Ime počinje velikim slovom bez suvisnih razmaka npr. Ana Marija");
                $err++;
            }
            if(!RegexValidation::ime($lName)){
                setFlash("registerError", "Prezime počinje velikim slovom bez suvisnih razmaka npr. Ivanović, Marković Ivanović");
                $err++;
            }
            if(!RegexValidation::email($email)){
                setFlash("registerError", "Unesite validan email, npr. marija.marijanovic@gmail.com");
                $err++;
            }
            if(!RegexValidation::password($password)){
                setFlash("registerError", "Lozinka mora da ima najmanje 8 karaktera i da sadrži makar jedan karakter i jedan broj");
                $err++;
            }
            if($password!=$confPassword){
                setFlash("registerError", "Lozinke se ne podudaraju");
                $err++;
            }
            if($height<120 || $height>250){
                setFlash("registerError", "Visina mora biti između 120cm i 250 cm");
                $err++;
            }
            $register = new ModelRegister($fName, $lName, $email, $password, $height, $dateofbirth);
            if( !$err && $man->ExecuteOP($register)){

                $user_id = $register->LastId();
                $token  = MailVerify::tokenGenerate();
                $weightModel = new ModelSetWeight($user_id, $weight);
                $man = Manager::Instance();
                if($man->ExecuteOP($weightModel) && $man->ExecuteOP(new ModelVerifyAdd($token, $user_id))){
                    $mail = new PHPMailer();
                    $mail->isSMTP(); // Set mailer to use SMTP
                    $mail->Host = 'localhost'; // Specify SMTP server (Mailhog)
                    $mail->Port = 1025; // Specify SMTP port (Mailhog default port)
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'username'; // SMTP username (if required by Mailhog)
                    $mail->Password = 'password'; // SMTP password (if required by Mailhog)
                    $mail->setFrom('from@example.com', 'Mirko');
                    $mail->addAddress('to@example.com', 'Recipient Name');
                    $mail->Subject = 'Subject of the Email';
                    $mail->Body = "Pritisnite na link kako bi potvrdili da ste vi vlasnik ovog mail -a <a href='http://localhost/verify?token=$token'>Link</a>";
                    $mail->AltBody = 'This is the plain text message body';
                    $mail->send();
                    http_response_code(200);
                }


            }
            elseif($err){
                http_response_code(406);
                header("Location: ".$_SERVER["HTTP_REFERER"]);
            }
            else{

                    //http_response_code(406);
                    //header("Location: ".$_SERVER["HTTP_REFERER"]);
                    setFlash("registerError", "Email is already in use");



            }
        }
    }
}