<?php

session_start();
require "class/db.php";

if(isset($_POST["datum"]) && isset($_POST["honnan"]) && isset($_POST["hova"]) && isset($_POST["km"]) && isset($_POST["rog_submit"]) && isset($_SESSION["uid"]))
{
    $uid=$_SESSION["uid"];
    $datum=$_POST["datum"];
    $hon=$_POST["honnan"];
    $hov=$_POST["hova"];
    $km=$_POST["km"];

    $db=new DB_Class();
    $db->Connection("utinaplo");

    if($db->Rogzit($uid,$datum,$hon,$hov,$km))
    {
        echo "<script>alert('Sikeres rögzítés!')</script>";
    }
    else
    {
        echo "<script>alert('Sikertelen rögzítés!')</script>";
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

    <div id="container" class="justify-content-center">

        <div class="cim">
                <h1>Rögzítés</h1>
        </div>
    
        <div id="nav_div">
        <nav class="navbar navbar-expand-lg bg-light justify-content-center">
            <ul class="nav">
                <li class="nav-item">
                    <a href="rogzit.php" class="nav-link">Rögzítés</a>
                </li>

                <li class="nav-item">
                    <a href="kimut.php" class="nav-link">Kimutatás</a>
                </li>

                <li class="nav-item">
                    <a href="index.php" class="nav-link">Kilépés</a>
                </li>
            </ul>
        </nav>
        </div>

        <div class="userform justify-content-center">
            <form action="" method="POST" onsubmit="return rogzit_validate();">

                <div class="form-group">
                    <label for="datum">Dátum: </label>
                    <input type="date" class="form-control" name="datum" id="datum" value="<?php echo date('Y-m-d');?>"/>
                </div>

                <div class="form-group">
                    <label for="honnan">Honnan: </label>
                    <input type="text" class="form-control" name="honnan" id="honnan" placeholder="Honnan..."/>
                </div>

                <div class="form-group">
                    <label for="hova">Hova: </label>
                    <input type="text" class="form-control" name="hova" id="hova" placeholder="Hova..."/>
                </div>

                <div class="form-group">
                    <label for="km">Km: </label>
                    <input type="text" class="form-control" name="km" id="km" placeholder="Honnan..."/>
                </div>

                <input type="submit" class="btn btn-primary" name="rog_submit" id="rog_submit" value="Rögzítés"/>
            </form>
        </div>
    
    
    </div>

</body>

</html>