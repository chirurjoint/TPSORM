<?php

include 'Model.php';
include 'Article.php';
include 'Categorie.php';
include 'Query.php';
include 'ConnectionFactory.php';

$tab = ['id'=>1,'nom'=>'zinzin','descr'=>"tres bien",'tarif'=>12, 'id_categ'=> 1];
$article = new Article($tab);
$article->insert();








?>