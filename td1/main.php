<?php
include 'Model.php';
include 'Article.php';
include 'Categorie.php';
include 'Query.php';
include 'ConnectionFactory.php';


$query = Query::table('article');
$query->select(['*']);
$query->where(['id = 65']);
$retour = $query->get();
foreach ($retour as $key => $value) {
    echo "\n==============================\n";
    echo "\n".$value['id']."\n";
    echo "\n".$value['nom']."\n";
    echo "\n".$value['descr']."\n";
    echo "\n".$value['tarif']."\n";
    echo "\n".$value['id_categ']."\n";}
    echo "\n==============================\n";


$query = Query::table('article');
$query->select(['*']);
$query->where(['tarif > 12','nom = "biclou"']);
$retour = $query->get();
foreach ($retour as $key => $value) {
    echo "\n==============================\n";
    echo "\n".$value['id']."\n";
    echo "\n".$value['nom']."\n";
    echo "\n".$value['descr']."\n";
    echo "\n".$value['tarif']."\n";
    echo "\n".$value['id_categ']."\n";
    echo "\n==============================\n";


}


$tab = [
    'id'=>445,
    'nom'=>'zinzin',
    'descr'=>"tres bien",
    'tarif'=>12,
    'id_categ'=> 1
];
$article = new Article($tab);
$article->insert();
$article_search = Article::find(445);
echo "\n==============================\n";
echo "\n".$article_search[0]->id."\n";
echo "\n".$article_search[0]->nom."\n";
echo "\n".$article_search[0]->descr."\n";
echo "\n".$article_search[0]->tarif."\n";
echo "\n".$article_search[0]->id_categ."\n";
echo "\n==============================\n";


$article_first_search = Article::first(445);
echo "\n==============================\n";
echo "\n".$article_first_search ->id."\n";
echo "\n".$article_first_search->nom."\n";
echo "\n".$article_first_search->descr."\n";
echo "\n".$article_first_search->tarif."\n";
echo "\n".$article_first_search->id_categ."\n";
echo "\n==============================\n";


$tab = [
    'id'=>999,
    'nom'=>'zinzin222',
    'descr'=>"tres bien2222222",
    'tarif'=>12,
    'id_categ'=> 1
];
$article = new Article($tab);
$article->insert();
$article_first_delete = Article::first(999);
echo "\n==============================\n";
echo "\n".$article_first_delete ->id."\n";
echo "\n".$article_first_delete->nom."\n";
echo "\n".$article_first_delete->descr."\n";
echo "\n".$article_first_delete->tarif."\n";
echo "\n".$article_first_delete->id_categ."\n";
echo "\n==============================\n";

$article_first_delete->delete();


echo "\n-------------- FINDER POUR LA FONCTION ALL -------------\n";
$articles = Article::all();
foreach ($articles as $article) {
    echo "\n==============================\n";
    echo "\n".$article ->id."\n";
    echo "\n".$article->nom."\n";
    echo "\n".$article->descr."\n";
    echo "\n".$article->tarif."\n";
    echo "\n".$article->id_categ."\n";
    echo "\n==============================\n";
}

echo "\n-------------- FINDER POUR LA FONCTION FIND AVEC PARAMETTRE -------------\n";

$articles = Article::find(['tarif > 12'],['nom','tarif']);
foreach ($articles as $article) {
    echo "\n==============================\n";
    //echo "\n".$article ->id."\n"; n'est pas compter dans la recherche
    echo "\n".$article->nom."\n";
    //echo "\n".$article->descr."\n"; n'est pas compter dans la recherche
    echo "\n".$article->tarif."\n";
    //echo "\n".$article->id_categ."\n"; n'est pas compter dans la recherche
    echo "\n==============================\n";
}

echo "\n-------------- FINDER POUR LA FONCTION FIRST AVEC PARAMETTRE -------------\n";

$articles = Article::first(['tarif > 12'],['nom','tarif']);
echo "\n==============================\n";
//echo "\n".$article ->id."\n"; n'est pas compter dans la recherche
echo "\n".$articles->nom."\n";
//echo "\n".$article->descr."\n"; n'est pas compter dans la recherche
echo "\n".$articles->tarif."\n";
//echo "\n".$article->id_categ."\n"; n'est pas compter dans la recherche
echo "\n==============================\n";








?>
