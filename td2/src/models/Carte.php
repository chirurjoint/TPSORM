<?php

namespace td2\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carte extends Model {

	protected $table = 'carte';
	protected $primaryKey = 'id';
    protected $fillable = ["id", "password", "nom_proprietaire", "mail_proprietaire",'commande_id',"cumul"];
    
    public function commandes(){
		return $this->hasMany(Commande::class);
    }



}
