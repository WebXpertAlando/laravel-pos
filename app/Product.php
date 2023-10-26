<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
	use Sortable;
	protected $table = 'products';
    protected $fillable = ["barcode", "description", "purchase_price", "sales_price", "existence",
    ];
	
	public $sortable = ['barcode',
						'description',
						'purchase_price',
						'sales_price',
						'existence'];
						
	public function category() 
	
	{
		return $this->belongsTo('AppCategory');
		
	}
	
}

