<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'prix_total',
        'date'
    ];


    public function client()
    {
        return $this->belongsTo(Client::class,'id','client_id');
    }

    public function lignecommandes()
    {
        return $this->hasMany(LigneCommande::class,'commande_id','id');
    }
}
