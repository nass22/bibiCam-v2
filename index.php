<?php


//Permet de display les erreurs
error_reporting(E_ALL);
ini_set("display_errors", 1);


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

//On insert les données bibi/pipi/popo des inputs dans la db

$type=$_POST['type'];
$date=$_POST['date'];
$quantity=(int)$_POST['qty'];


switch ($type){
    case "bibi":
        if (isset($date) && !empty($quantity)){
            $insertBibi=$db->prepare('INSERT INTO bibi(date, qty) VALUES (:date, :qty)');
            $insertBibi->bindParam('date', $date);
            $insertBibi->bindParam('qty', $quantity);
            $insertBibi->execute();
        }
        break;
    case "pipi":
        if (isset($date)){
            $insertPipi=$db->prepare('INSERT INTO pipi(date) VALUES (:date)');
            $insertPipi->bindParam('date', $date);
            $insertPipi->execute();
        }
        break;
    case "popo":
        if (isset($date)){
            $insertPopo=$db->prepare('INSERT INTO popo(date) VALUES (:date)');
            $insertPopo->bindParam('date', $date);
            $insertPopo->execute();
        }
        break;
}

//On récupère les bibi dans la DB
$sqlBibiQuery='SELECT id, date, qty FROM bibi ORDER BY date DESC LIMIT 0,10';
$sqlBibiStm= $db -> prepare($sqlBibiQuery);
$sqlBibiStm->execute();


//On récupère les pipi dans la DB
$sqlPipiQuery='SELECT id, date FROM pipi ORDER BY date DESC LIMIT 0,10';
$sqlPipiStm= $db -> prepare($sqlPipiQuery);
$sqlPipiStm->execute();

//On récupère les popo dans la DB
$sqlPopoQuery='SELECT id, date FROM popo ORDER BY date DESC LIMIT 0,10';
$sqlPopoStm= $db -> prepare($sqlPopoQuery);
$sqlPopoStm->execute();


//On set le fuseau 
date_default_timezone_set('Europe/Paris');
$todayDate=date('Y-m-d');

//On calcule le nombre de ml du jour
$sqlSumQuery='SELECT SUM(qty) AS sum_today FROM bibi WHERE date BETWEEN :date - INTERVAL 1 DAY AND :date + INTERVAL 1 DAY';
$sqlSumStm= $db -> prepare($sqlSumQuery);
$sqlSumStm->bindParam('date', $todayDate);
$sqlSumStm->execute();
$sqlSumResp=$sqlSumStm->fetch();

//On cacule le nbre de bibi du jour
$sqlNumberBibiQuery='SELECT COUNT(qty) AS count_today FROM bibi WHERE date BETWEEN :date - INTERVAL 1 DAY AND :date + INTERVAL 1 DAY';
$sqlNumbBibiStm= $db -> prepare($sqlNumberBibiQuery);
$sqlNumbBibiStm->bindParam('date', $todayDate);
$sqlNumbBibiStm->execute();
$sqlNumbBibiResp=$sqlNumbBibiStm->fetch();

//On supprime un élément
$table=$_GET['name'];
$id=$_GET['id'];

if (!empty($table) && !empty($id)){
    switch ($table){
        case 'bibi':
            $sqlDeleteQuery='DELETE FROM bibi WHERE id = :id';
            $sqlDeleteStm=$db->prepare($sqlDeleteQuery);
            $sqlDeleteStm->bindParam('id', $id);
            $sqlDeleteStm->execute();
            header("Location:index.php");
            break;
        case 'pipi':
            $sqlDeleteQuery='DELETE FROM pipi WHERE id = :id';
            $sqlDeleteStm=$db->prepare($sqlDeleteQuery);
            $sqlDeleteStm->bindParam('id', $id);
            $sqlDeleteStm->execute();
            header("Location:index.php");
            break;
        case 'popo':
            $sqlDeleteQuery='DELETE FROM popo WHERE id = :id';
            $sqlDeleteStm=$db->prepare($sqlDeleteQuery);
            $sqlDeleteStm->bindParam('id', $id);
            $sqlDeleteStm->execute();
            header("Location:index.php");
            break;
    } 
}


require('view.php');

?>