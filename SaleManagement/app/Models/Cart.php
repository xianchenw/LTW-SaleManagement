<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";
    public $timestamps = false;
    protected $fillable=['id','customer_id','product_id','quantity'];

    public function User()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function Product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
