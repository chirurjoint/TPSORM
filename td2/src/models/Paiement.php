<?php

namespace td2\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paiement extends Model {

    protected $table = 'paiement';
	protected $primaryKey = 'ref_paimement';
    protected $fillable = ["ref_paimement", "mode_paimement", "date_paiment", "montant_paiment",'commande_id'];

}
