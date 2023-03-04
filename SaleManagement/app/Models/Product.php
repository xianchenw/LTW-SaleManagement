<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{

   use HasFactory;
   protected $table = "product";
   public $timestamps = false;
   protected $fillable=['id','name','description','price','manufacturer','image','created_date','category_id','num','active'];
   public function Category()
   {
      return $this->belongsTo(Category::class);
   } 

    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
    public function Cart()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

}