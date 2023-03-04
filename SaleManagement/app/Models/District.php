<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class District extends Model
{
 use HasFactory;
 protected $table = "district";
public $timestamps = false;
protected $fillable=['id','info','province_id' ];

 public function Ward()
 {
 return $this->hasMany(Ward::class);
 }

public function Province()
{

    return $this->belongsTo(Province::class);

} 
}