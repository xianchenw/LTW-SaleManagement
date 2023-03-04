<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    protected $table = "order_status";
    protected $fillable=['id','code','name'];

    public function SaleOrder(){
        return $this->hasMany(SaleOrder::class, 'status', 'id');
    }
}
