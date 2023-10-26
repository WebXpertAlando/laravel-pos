<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSold extends Model
{
    protected $table = "products_sold";
    protected $fillable = ["id_sale", "description", "barcode", "price", "amount"];
}
