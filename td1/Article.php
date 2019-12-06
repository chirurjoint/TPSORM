<?php
class Article extends Model
{
    private $nom;
    private $id;
    private $tarif;
    private $descr;
    private $id_categ;

    public function __construct($tab){
        parent::__construct($tab);
        $this->nom = $tab['nom'];
        $this->id = $tab['id'];
        $this->descr = $tab['descr'];
        $this->tarif = $tab['tarif'];
        $this->id_categ = $tab['id_categ'];
    }


    public static function all(){
        $query = Query::table('article');
        $query->select(['*']);
        $retour = $query->get();
        $tab = [];
        foreach ($retour as $article) {
            array_push($tab,new Article($article));
        }
        return $tab;
    }

    public static function find($args = null, $select = '*'){
        if(func_num_args()==1 && is_int($args)==true){
            $query = Query::table('article');
            $query->select([$select]);
            $query->where(['id = '.$args]);
            $retour = $query->get();
            $tab = [];
            foreach ($retour as $article) {
                array_push($tab,new Article($article));
            }
        }
        elseif(func_num_args()==2 && is_int($args)==true){
            $query = Query::table('article');
            $elements = implode(',',$select);
            $query->select($select);
            $query->where(['id = '.$args]);
            $retour = $query->get();
            $tab = [];
            foreach ($retour as $article) {
                array_push($tab,new Article($article));
            }
        }elseif(func_num_args()==2 && is_int($args)==false){
            $query = Query::table('article');
            $elements = implode(',',$select);
            $query->select($select);
            $query->where($args);
            $retour = $query->get();
            $tab = [];
            foreach ($retour as $article) {
                array_push($tab,new Article($article));
            }
        }elseif (is_int($args)==false && func_num_args()==1) {
            $query = Query::table('article');
            $query->select(["*"]);
            $query->where($args);
            $retour = $query->get();
            $tab = [];
            foreach ($retour as $article) {
                array_push($tab,new Article($article));
            }
        }
        return $tab;
    }

    public static function first($args = null, $select = ['*']){
        $artciles = Article::find($args,$select);
        return $artciles[0];
    }

    public function estDispo()
    {
        if($this->stock>0){
            return false;
        }else{
            return true;
        }
    }

}