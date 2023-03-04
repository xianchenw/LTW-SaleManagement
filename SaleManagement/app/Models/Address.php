<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Address extends Model
{
    use HasFactory;
    protected $table = "address";
    public $timestamps = false;
    protected $fillable=['id','info','ward_id' ];
    public function User()
    {
        return $this->hasMany(User::class);
    }
    public function Ward()
    {
        return $this->belongsTo(Ward::class);
    } 
    public function __toString() {
        return $this->info;
    }
}