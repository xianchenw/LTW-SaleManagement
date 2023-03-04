<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Ward extends Model
{
 use HasFactory;
 protected $table = "ward";
public $timestamps = false;
protected $fillable=['id','info','district_id' ];

 public function Address()
 {
 return $this->hasMany(Address::class);
 }

public function District()
{
    return $this->belongsTo(District::class);
} 
}