<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function products()
    {
        return $this->hasMany("App\ProductSold", "id_sale");
    }

    public function client()
    {
        return $this->belongsTo("App\Client");
    }
}