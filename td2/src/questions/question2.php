<?php
require_once("../config/config.inc.php");
require_once("../../vendor/autoload.php");
// Définit le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
date_default_timezone_set('UTC');
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use td2\models\Carte;
use td2\models\Commande;

$capsule = new Capsule;
$capsule->addConnection($config['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

echo("\n");
echo("\n");
echo ("-------------------- QUESTION 2.1 ------------------------------ \n");
echo("\n");
echo("\n");


$carte = Carte::find(42);
$commandes = $carte->commandes()->get();
// echo $carte."\n";

// foreach ($commandes as $key => $value) {
//     echo ($key.":".$value."\n");
// }

echo("\n");
echo("\n");
echo ("-------------------- QUESTION 2.2 ------------------------------ \n");
echo("\n");
echo("\n");


$cartes = Carte::with('commandes')->where("cumul",">",1000.00)->get();

// foreach ($cartes as $carte) {
//     echo ("-----------------------------\n");
//     $commandes = $carte->commandes()->get();
//     echo $carte."\n";
//     echo $commande;
// }


echo("\n");
echo("\n");
echo ("-------------------- QUESTION 2.3 ------------------------------ \n");
echo("\n");
echo("\n");


$commandes = Commande::with('carte')->get();
// echo $commandes;

// foreach ($commandes as $commande) {
//     echo ("-----------------------------\n");
//     echo $commande."\n";
// }

echo("\n");
echo("\n");
echo ("-------------------- QUESTION 2.4 ------------------------------ \n");
echo("\n");
echo("\n");


$carte1 = Carte::find(10);

$commande1 = Commande::create(
    ["id"=>"zozo",
    "date_livraison"=>new DateTime(),
    "etat"=>1,
    "nom_client"=>$carte1->nom_proprietaire,
    "montant" => 9999.00,
    "remise" => null,
    "carte_id" => $carte1->id
    ]);

$commande2 = Commande::create(
    ["id"=>"zouzou",
    "date_livraison"=>new DateTime(),
    "etat"=>1,
    "nom_client"=>$carte1->nom_proprietaire,
    "montant" => 9999.00,
    "remise" => null,
    "carte_id" => $carte1->id
    ]);
$commande1->save();
$commande2->save();


$carte1->save();

$commandes =  $carte1->commandes()->get();

foreach ($commandes as $key => $commande) {
    echo ("-----------------------------\n");
    echo $commande."\n";
}

echo("\n");
echo("\n");
echo ("-------------------- QUESTION 2.5 ------------------------------ \n");
echo("\n");
echo("\n");


$commande  = Commande::find(3);
$carte = $carte->find(11);
$commande->carte_id = $carte->id;
$commande->save();

$commandes =  $carte->commandes()->get();

foreach ($commandes as $key => $commande) {
    echo ("-----------------------------\n");
    echo $commande."\n";
}
