<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id','created_at','updated_at'];

    protected $hidden =['created_at', 'updated_at'];

    public function parents() {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class,'parent_id');//->latest();
    }

    public function Products() {
        return $this->belongsToMany(Product::class,'category_product','category_id','product_id');
    }

}
