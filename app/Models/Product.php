<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name', 'description','price','in_stock','price_before', 
        'has_offer','start_date','end_date','created_at','updated_at', 'image'
    ];

    protected $hidden =['created_at', 'updated_at'];


    public function Categories() {
        return $this->belongsToMany(Category::class,'category_product','product_id','category_id')->latest();
    }

}
