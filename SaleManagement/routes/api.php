<?php
use App\Models\Category;
use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\SaleOrder;
use App\Models\User;
use Hamcrest\Number\OrderingComparisonTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', function() {
    return User::all();
});
Route::post('/order', function (Request $request) {
    $listCart = array();
    $listDetail = array();
    $money = 0;
    foreach ($request->carts as $cartid) {
        $cart = Cart::where('id', $cartid)->first();
        $money += $cart->quantity * $cart->Product->price;
        array_push($listCart, $cart);
    };
    $order = SaleOrder::create([
        'created_date' => now(),
        'user_id' => 2,
        'customer_id' => $listCart[0]->customer_id,
        'status' => 1,
        'total_money' => $money, 
    ]);
    foreach ($listCart as $c){
        $orderdetail = OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $c->Product->id,
            'quantity' => $c->quantity,
            'unit_price' => $c->Product->price
        ]);
        array_push($listDetail, $orderdetail);
        Cart::where('id',$c->id)->delete();
    };
    return response()->json("Đã đặt đơn", 200);
});
Route::get('/Stars', function() {
    return Category::select("id", "name")
    ->withSum('Product', 'price')
    ->get()
    ->toArray();
});
