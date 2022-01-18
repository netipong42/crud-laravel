<?php

namespace App\Models;

use App\Models\Type as ModelsType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    function typeProduct()
    {
        return $this->hasOne(ModelsType::class, 'id', 'type_id');
    }
}
