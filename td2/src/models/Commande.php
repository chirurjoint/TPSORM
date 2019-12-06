<?php

namespace td2\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model {

	protected $table = 'commande';
	protected $primaryKey = 'id';
  protected $fillable = ["id", "date_livraison", "montant", "etat",'remise',"ref_paiement","nom_client","carte_id"];
    
  public function carte(){
		return $this->belongsTo(Carte::class);
  }



  public function paiement(){
		return $this->hasOne(Paiement::class);
  }

  public function itemsCommande(){
		return $this->hasMany(ItemCommande::class);
  }
}
