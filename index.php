<?php
//On se connecte à la db grâce à PDO
$servname='localhost';
$dbname='bibicam';
$user='root';
$password='root';

try{
    $db= new PDO(
        "mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $password);
        //On définit le mode d'erreur de PDO sur Exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e){
    //On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci
    die('Erreur: ' . $e->getMessage());
}

//On insert les données pipi des inputs dans la db

$type=$_POST['type'];
$date=$_POST['date'];
$quantity=$_POST['qty'];

//$insertData=db->prepare('INSERT INTO pipi')


//On récupère les pipi dans la DB
$sqlQuery='SELECT id, date FROM pipi ORDER BY date DESC LIMIT 0,5';
$sqlStm= $db -> prepare($sqlQuery);
$sqlStm->execute();





require('view.php');




?>