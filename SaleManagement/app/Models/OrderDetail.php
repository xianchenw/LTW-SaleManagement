<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "order_detail";
    public $timestamps = false;
    protected $fillable=['id', 'order_id', 'product_id','quantity', 'unit_price'];

    public function SaleOrder()
    {
        return $this->belongsTo(SaleOrder::class, 'order_id', 'id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
