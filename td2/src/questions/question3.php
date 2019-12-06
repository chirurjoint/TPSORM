<?php
require_once("../config/config.inc.php");
require_once("../../vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use td2\models\Carte;
use td2\models\Commande;
use td2\models\ItemCommande;
use td2\models\Item;

$capsule = new Capsule;
$capsule->addConnection($config['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

echo("\n");
echo("\n");
echo ("-------------------- QUESTION 3.1 ------------------------------ \n");
echo("\n");
echo("\n");

$items = ItemCommande::where("commande_id","=","000b2a0b-d055-4499-9c1b-84441a254a36")->get();

foreach ($items as $item) {
    echo $item->commande()->get();
}
