<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
</head>
<body>
<?php
include 'Model.php';
include 'Article.php';
include 'Categorie.php';
include 'Query.php';
include 'ConnectionFactory.php';


// $query = Query::table('article');
// $query->select(['*']);
// $query->where(['id = 66','tarif = 66.66']);
// $retour = $query->get();
// foreach ($retour as $key => $value) {
//     print_r($value['nom']);
// }


// $query1 = Query::table('article');
// $query1->where(['id = 66']);
// echo "<br>";
// $query1->delete();

// $article  = new Article(3,"zinzin","c'est un beau zinzin",99999,1);
// $query2 = Query::table('article');
// $query2->insert($article);

// $article->delete();
// $query = Query::table('article');
// $query->select(['*']);
// $query->where(['id = 3']);

// $all = Article::all();

// foreach ($all as $article) {
//     print_r ("<br>");
//     print_r($article);
//     print_r ("<br>");
// }

// $art  = Article::first(1);
// print_r("<br>");
// print_r("<br>");
// print_r("<br>");




// $categ = $art->belongs_to('categorie','id_categ');
// var_dump($categ);



$categ= Categorie::first(1);
$list = $categ->has_many('Article','id_categ');
print_r($list);


?>
</body>
</html>

