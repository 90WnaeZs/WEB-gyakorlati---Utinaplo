<?php

session_start();
require "class/db.php";

if(isset($_POST["submit"]) && isset($_POST["username"]) && isset($_POST["pw"]))
{
    $user=$_POST["username"];
    $pw=$_POST["pw"];

    $db=new DB_Class();
    $db->Connection("utinaplo");
    if($db->Login($user,$pw))
    {
        session_start();
        header("Location: rogzit.php");
    }
    else
    {
        $db=null;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/check.js"></script>
</head>

<body>

    <div id="container" class="d-flex justify-content-center">

        <div class="userform justify-content-center">
            <form action="" method="POST" onsubmit="ellenorzes()">

                <div class="form-group">
                    <label for="username">Felhasználónév</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Írja be a felhasználónevét..."/>
                </div>

                <div class="form-group">
                    <label for="pw">Jelszó</label>
                    <input type="password" class="form-control" name="pw" id="pw" placeholder="Írja be a jelszavát..."/>
                </div>

                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Belépés"/>
            </form>
        </div>

        <div class="cim justify-content-center">
            <h1>Bejelentkezés</h1>
        </div>
    </div>

</body>

</html>