<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profit extends Model
{
    protected $table = "profits";
	protected $fillable = ["id_sale", "description", "price", "total_profit"];
	
}
