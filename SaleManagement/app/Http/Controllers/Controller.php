<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user, $currentUser, $cart;

    //Bien toan cuc
    public function __construct() 
    {
        $this->currentUser = Auth::user();
        $this->cart = Cart::where('customer_id', Auth::id())->get();
        $this->user = User::all();
        View::share('user', $this->user);
        View::share('currentUser', $this->currentUser); 
        View::share('cart', $this->cart);

    }

}
