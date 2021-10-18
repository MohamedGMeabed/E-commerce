<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'status','payment_status','payment_method','total', 
        'discount', 'tax','shipping','order_number','shipping_first_name', 
        'shipping_last_name','shipping_email','shipping_phone','shipping_address',
        'shipping_city','created_at','updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function Products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('quantity', 'price');
    }


    protected static function booted()
    {
     static::creating(function(Order $order){
         $now = Carbon::now();
         $number = Order::whereYear('created_at',$now->year)->max('order_number');
         $order->order_number = $number ? $number + 1 :$now->year . '0001';
     });
    }
}
