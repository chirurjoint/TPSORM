<?php

namespace td2\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCommande extends Model {

	protected $table = 'item_commande';
	protected $primaryKey = 'item_id';
    protected $fillable = ["item_id", "commande_id", "quantite"];
        
	public function commande(){
		return $this->belongsTo(Commande::class);
	}

	public function items(){
		return $this->hasMany(Item::class);
	}
	  
}
