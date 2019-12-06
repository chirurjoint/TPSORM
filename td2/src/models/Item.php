<?php

namespace td2\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model {

	protected $table = 'item';
	protected $primaryKey = 'id';
    protected $fillable = ["id", "libelle", "description", "tarif"];
    
    public function commande(){
		return $this->hasMany(Commande::class);
    }
}
