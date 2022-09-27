<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;
    protected $fillable = [
        'prix_total',
        'quantite',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class,'id','commande_id');//
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class,'id','produit_id');//
    }
    
}
