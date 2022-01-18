<?php

namespace App\Models;

use App\Models\Product as Prodcutlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $guarded = [];

    function listProduct()
    {
        return $this->hasMany(Prodcutlist::class, 'id', 'type_id');
    }
}
