
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/public/css/style.css" type="text/css"/>
    <title> Registracija</title>

</head>
<body>
    <div id="registration">
    <h1>Registracija</h1>
<form action="register" method="POST" id="firstForm">

    <label for="fName">Ime</label>
    <input type="text" id="fName" name="fName"/>
    <label for="lName">Prezime</label>
    <input type="text" id="lName" name="lName"/>
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email"/>
    <label for="password">Lozinka</label>
    <input type="password" name="password" id="password"/>
    <label for="confPassword">Potvrdite Lozinku</label>
    <input type="password" name="confPassword" id="confPassword"/>
    <label for="height">Visina (u centimetrima)</label>
    <input type="number" id="height" name="height" min="120" value="160" max="250"/>
    <label for="height">Težina (u kilogramima)</label>
    <input type="number" id="weight" name="weight" min="30" value="60" max="250" step="0.01"/>
    <label for="dateofbirth">Datum rodjenja</label>
    <input type="date" name = "dateofbirth" id="dateofbirth"/>
    <?php if(hasFlash("registerError")):?>

        <div id="error"><ul>
<?php
            foreach (getFlashData("registerError") as $row){
                echo "<li>$row</li>";
            }
            ?>
            </ul>
        </div>



    <?php endif?>

     <?php

            if(isset($_SESSION["registerError"])){
                var_dump($_SESSION["registerError"]);
            }

            ?>
    <div id="holdButtons">
        <!--<input type="button" value="Already have account?" class="border"/>-->
        <a href="login" class="border">Already have account?</a>
        <input type="submit" value="Registruj se" class="noBorder" id="next"/>
    </div>



</form>
    </div>
</body>
</html>