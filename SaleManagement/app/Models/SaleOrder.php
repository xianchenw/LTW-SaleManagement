<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    use HasFactory;
    protected $table = "sale_order";
    public $timestamps = false;
    protected $fillable=['id','created_date', 'user_id', 'customer_id', 'status', 'total_money'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function OrderStatus(){
        return $this->belongsTo(OrderStatus::class, 'status', 'id');
    }

    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
