<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'designation',
        'type_produit',
        'quantite_stock',
        'prix_unit'
    ];

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'reference', 'reference');
    }
}
