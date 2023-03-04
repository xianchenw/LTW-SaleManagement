<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_role_id',
        'active',
        'phone',
        'gender_id',
        'birthday',
        'address_id',
        'email',
        'image',
        'password',
    ];

    public function UserRole()
    {
    return $this->belongsTo(UserRole::class);
    }

    public function Gender()
    {
    return $this->belongsTo(Gender::class);
    } 

    public function Address()
    {
    return $this->belongsTo(Address::class);
    } 

    public function Order()
    {
        return $this->hasMany(SaleOrder::class, 'customer_id', 'id');
    }

    public function Sale()
    {
        return $this->hasMany(SaleOrder::class, 'sale_id', 'id');
    }

    public function SaleChat()
    {
        return $this->hasMany(Chat::class, 'sale_id', 'id');
    }
    public function CustomerChat()
    {
        return $this->hasMany(Chat::class, 'customer_id', 'id');
    }

    public function Cart(){
        return $this->hasMany(Cart::class, 'customer_id', 'id');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
