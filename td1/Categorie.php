<?php
class Categorie extends Model
{
    private $id;
    private $nom;
    private $tarif;

    public function _construct(){
        parent::__construct($tab);
        $this->nom = $tab['nom'];
        $this->id = $tab['id'];
        $this->descr = $tab['descr'];
    }


    public static function find($args = null, $select = '*'){
        if(func_num_args()==1 && is_int($args)==true){
            $query = Query::table('categorie');
            $query->select([$select]);
            $query->where(['id = '.$args]);
            $retour = $query->get();
            $tab = [];
            foreach ($retour as $categ) {
                array_push($tab,new Categorie($categ));
            }
        }
        elseif(func_num_args()==2 && is_int($args)==true){
            $query = Query::table('categorie');
            $elements = implode(',',$select);
            $query->select($select);
            $query->where(['id = '.$args]);
            $retour = $query->get();
            $tab = [];
            foreach ($retour as $categ) {
                array_push($tab,new Categorie($categ));
            }
        }elseif(func_num_args()==2 && is_int($args)==false){
            $query = Query::table('categrie');
            $elements = implode(',',$select);
            $query->select($select);
            $query->where($args);
            $retour = $query->get();
            $tab = [];
            foreach ($retour as $categ) {
                array_push($tab,new Categorie($categ));
            }
        }elseif (is_int($args)==false && func_num_args()==1) {
            $query = Query::table('categorie');
            $query->select(["*"]);
            $query->where($args);
            $retour = $query->get();
            $tab = [];
            foreach ($retour as $categ) {
                array_push($tab,new Categorie($categ));
            }
        }
        return $tab;
    }

    public static function first($args = null, $select = ['*']){
        $categs = Categorie::find($args,$select);

        return $categs[0];
    }

}