<?php

session_start();
require "class/db.php";

$uid=null;
$user=null;

if(isset($_SESSION["username"]) && isset($_SESSION["uid"]))
{
    $uid=$_SESSION["uid"];
    $user=$_SESSION["username"];
}

$listara = false;

if (isset($_POST["kimutat_sub"])) 
{
    $db = new DB_Class();
    $db->Connection("utinaplo");

    $tomb2[]=null;

    $honnan = $_POST["honnan"];
    $hova = $_POST["hova"];

    $tomb2 = $db->Kimutatas($uid, $honnan, $hova);

    $listara = true;
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
                <h1>Kimutatás</h1>
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
        
        <div id="listaform_div">
        <form action="" method="POST">

            <div class="form-group">
                <label for="honnan">Honnan</label>
                <input type="text" name="honnan" id="honnan" class="form-control" placeholder="Honnan..." value="%">
            </div>

            <div class="form-group">
                <label for="hova">Hova</label>
                <input type="text" name="hova" id="hova" class="form-control" placeholder="Hova..." value="%">
            </div>

            <input type="submit" name="kimutat_sub" id="kimutat_sub" class="button button-primary" value="Kimutatás"/>

        </form>
        </div>

        <div id="lista" class="">
                
                <div id="username_div">
                <?php
                        if ($listara) {
                            echo "<h2>(" . $uid . ")" . $user . " utazásai</h2>";
                ?> 
                </div>
                    

                <table class="text-left">
                    <tr>
                        
                        <th style="width:100px">Dátum</th>
                        <th style="width:250px">Honnan</th>
                        <th style="width:250px">Hova</th>
                        <th style="width:20px">km</th>
                        <?php
                            foreach ($tomb2 as $key) {
                                echo "<tr><td>" . $key['Datum'] . "</td><td>" . $key['Honnan'] . "</td><td>" . $key['Hova'] . "</td><td>"  . $key['km'] . "</td></tr>";
                            }
                            ?>
                </table>

                <?php
                }
                ?>    
        </div>

</div>
        
        
    

</body>

</html>