<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Utilisateur
{
    use HasFactory;
    protected $fillable = [
        'nom',
    ];

    public function utilisateur(){
        return $this->morphOne(Utilisateur::class, 'utilisateurtable');
    }
}
