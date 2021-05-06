<?php

class DB_Class
{
    private $host;
    private $username;
    private $pw;
    private $con;

    function __construct()
    {
        $this->host="localhost";
        $this->username="root";
        $this->pw="";
    }

    function __destruct()
    {

    }

    function Connection($dbname)
    {
        try {
            $this->con=new PDO("mysql:host=$this->host;dbname=$dbname",$this->username,$this->pw);
            $this->con->exec("set names 'utf-8'");
        } catch (PDOException $e) {
            die("<h1>Hiba a kapcsolódás során</h1><br><p>$e</p>");
        }
    }

    function Login($username,$pw)
    {
        $success=false;

        $res=$this->con->prepare("SELECT * FROM users WHERE Nev= :pNev AND Jelszo= :pJelszo");

        $res->bindparam("pNev",$username);
        $res->bindparam("pJelszo",$pw);

        $row=$res->execute();
        $row=$res->fetch();

        if($row>0)
        {
            session_start();
            $_SESSION["username"]=$row["Nev"];
            $_SESSION["uid"]=$row["ID_user"];
            $success=true;
        }
        else
        {
            $success=false;
        }

        return $success;
    }

    function Rogzit($uid,$datum,$hon,$hov,$km)
    {
        $success=false;

        $res=$this->con->prepare("INSERT INTO utak (ID_user,Datum,Honnan,Hova,km) VALUES(?,?,?,?,?)");

        $res->bindparam(1,$uid);
        $res->bindparam(2,$datum);
        $res->bindparam(3,$hon);
        $res->bindparam(4,$hov);
        $res->bindparam(5,$km);

        $row=$res->execute();
        if($row>0)
        {
            $success=true;
        }
        else{
            $success=false;
        }
        return $success;

    }

    function Kimutatas($uid, $hon, $hov)
	{
		$tomb[]=null;

		$res = $this->con->prepare("SELECT * FROM utak WHERE ID_user= :pUid AND Honnan LIKE :pHonnan AND Hova LIKE :pHova");

		$res->bindparam("pUid", $uid);
		$res->bindparam("pHonnan", $hon);
		$res->bindparam("pHova", $hov);

		$res->execute();

		while ($row = $res->fetch()) 
        {
			$tomb[] = $row;
		}

		return $tomb;
	}
}



?>