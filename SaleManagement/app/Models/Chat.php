<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = "chat";
    protected $fillable=['id','content', 'sale_id', 'customer_id'];

    public function Seller(){
        return $this->belongsTo(User::class, 'sale_id', 'id');
    }
    public function Customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
