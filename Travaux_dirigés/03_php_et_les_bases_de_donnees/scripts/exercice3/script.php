<?php
session_start();

spl_autoload_register(function ($class) {
    include $class . '.php';
});

include("DBConfig.php");
$DB = MyPDO::getInstance();

if(!isset($_SESSION['current']))
    $_SESSION['current'] = 0;
else
    $_SESSION['current']++;

try {
    $SQL = "SELECT ite_title, ite_description, ite_price, sup_name FROM `item`, `supplier` WHERE `ite_supplier`=`sup_id` LIMIT :nb,1";
    if(!($request = $DB->prepare($SQL)))
        throw new Exception("Erreur lors de la préparation de la requête.");
    
    $request->bindParam(':nb', $_SESSION['current'], PDO::PARAM_INT);
    if(!$request->execute())
        throw new Exception("Erreur lors de l'exécution de la requête.");

    if($res = $request->fetch())
        echo "<p>{$res['ite_title']} {$res['ite_description']} [{$res['ite_price']} euros] vendu par <em>{$res['sup_name']}</em></p>";
    else {
        // No item
        if($_SESSION['current'] == 0)
            throw new Exception("Pas d'article dans la base.");
        
        // No more item, restart from 0
        $_SESSION['current'] = 0;
        $request->bindParam(':nb', $_SESSION['current'], PDO::PARAM_INT);
        if(!$request->execute())
            throw new Exception("Erreur lors de l'exécution de la requête.");
        
        if($res = $request->fetch())
            echo "<p>{$res['ite_title']} {$res['ite_description']} [{$res['ite_price']} euros] vendu par <em>{$res['sup_name']}</em></p>";
        else
            throw new Exception("Pas d'article dans la base.");
    }
} catch(Exception $e) {
    echo "<p>".$e->getMessage()."</p>";
}