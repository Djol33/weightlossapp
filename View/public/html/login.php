<!DOCTYPE html>
<html lang="en">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="View/public/css/style.css" type="text/css"/>
    <meta charset="UTF-8"/>
 
    

 
    <title>Login</title>
</head>
<body>
<div id="loginwrap">
    <h1>Logovanje</h1>
    <form action="login" method="POST">
 
        <label for="email">Email</label>
        <input type="email" name="email" id="email"/>
        <label for="password">Lozinka</label>
        <input type="password" name="password" id="password"/>
        <?php if(hasFlash("loginError")):?>

            <div id="error"><ul>
                    <?php
                    foreach (getFlashData("loginError") as $row){
                        echo "<li>$row</li>";
                    }
                    ?>
                </ul>
            </div>



        <?php endif?>
        <div id="holdButtons">
            <input type="submit" value="Log in" class="border" id="login"/>
        </div>
    </form>

</div>

 
</body>
</html>