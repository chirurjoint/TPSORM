<?php
require_once("../config/config.inc.php");
require_once("../../vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use td2\models\Carte;

$capsule = new Capsule;
$capsule->addConnection($config['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
echo ("-------------------- QUESTION 1.1 ------------------------------ \n");

//1.1
$const = Carte::select('mail_proprietaire','nom_proprietaire','cumul')->get();
foreach ($const as $key => $value ) {
    echo($key.":".$value."\n");
}

echo ("--------------------- QUESTION 1.2 ------------------------------- \n");

//1.2
$const = Carte::select('mail_proprietaire','nom_proprietaire','cumul')->orderByDesc("nom_proprietaire")->get();
foreach ($const as $key => $value ) {
    echo($key.":".$value."\n");
}
echo ("-------------------- QUESTION 1.3 ------------------------------ \n");

//1.3


try{
    $const = Carte::find(7342);
    if (!$const){
        throw new  ModelNotFoundException();
    }
}catch( ModelNotFoundException $e) {
    echo "pas de carte \n";
}
    
echo ("---------------------QUESTION 1.4 --------------------------- \n");

//1.4
$const = Carte::where('nom_proprietaire','LIKE','%Ariane%')->orderBy("nom_proprietaire")->get();
foreach ($const as $key => $value ) {
    echo($key.":".$value."\n");
}
echo ("---------------------QUESTION 1.5 ----------------------------- \n");

//1.5
$pass = password_hash("zinzin",PASSWORD_BCRYPT);
$const = Carte::create(["id" => 9999,"password" => ".$pass." , "nom_proprietaire" => "Big Zinz", "mail_proprietaire" => "zinzin@gmail.com", "cumul" => 1999]);
$const->save();
$val = Carte::find(9999);
echo $val;
