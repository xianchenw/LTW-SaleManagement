<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\Redirect;

use App\Models\User;


class ProductController extends Controller
{
    public function index()
    {
        $category = Category::paginate(13);
        $product = Product::all();
        $productnew = Product::orderBy('created_date', 'desc')->paginate(6);
   
        $user = User::all();  //tv
        return view('product',compact('product','user', 'category', 'productnew'));

    }
    public function getProductDetail($ProductId){
        $category = Category::All();
        $product = Product::where('id', $ProductId)->first();
        $user = User::all();
        return view('productDetail',compact('product','user', 'category'));
    }
    public function addProduct(){
        $category = Category::All();
        $pro= Product::paginate(5);
        $user = User::all();  //tv
        return view('addProduct',compact('category', 'pro','user'))->with('i', (request()->input('page', 1)-1)*5);
    }
    
    public function insertProduct(Request $request)
    {
        $this->validate(request(), ['name'=>'required']);
        $filename ="";
        if($request->file('fileUpload')->isValid())
        {
            $filename= $request -> fileUpload -> getClientOriginalName();
            $request -> fileUpload -> move('images/', $filename);
        }
        $product = Product::create([

            'name' => $request -> name,
            'description' => $request -> description,
            'price' => $request -> price,
            'manufacturer' => $request -> manufacturer,
            'image' => $filename,
            'created_date' => now(),
            'category_id' => $request -> category_id,
            'num' => $request -> num,
            'active' => 1, 
        ]);
        $product = Product::All();
        Return \Redirect::back()->with('addsuccess','Thêm sản phẩm thành công!' );;
    }
    public function deletePro($ProductId){
        $record = Product::where('id', $ProductId)->first();
        if(file_exists(public_path("images/".$record->image ))){
            unlink(public_path("images/".$record->image));

        }
        Product::where('id', $ProductId)->delete();
        $product = Product::All();
        Return \Redirect::back()->with('thongbao','Xóa sản phẩm thành công!' );
    }
    public function editPro($ProductId)
    {
        $category = Category::All();
        $product = Product::where('id', $ProductId)->first();
        return view('editProduct', compact('category','product'));
    }
   
    public function editPro2(Request $request, $ProductId){
      
        $sp = Product::where('id', $ProductId)->first();
        $sp->name = $request -> name;
        $sp->description = $request -> description;
        $sp->price = $request -> price;
        $sp->manufacturer = $request -> manufacturer;
        $sp->created_date  = now();
        $sp->category_id = $request -> category_id;
        $sp->num = $request -> num;
        $sp->active = 1; 
        $sp->update();
        return redirect()->route('prodAdd');
    }
    public function Stars (){
        $category = Category::All();
        $countpro = Category::select("id", "name")
        ->withSum('Product', 'price')
        ->get()
        ->toArray();
        // dd($countpro);
        return view('Stars', compact('countpro', 'category'));
    }

    //search
    public function getSearch(Request $req){
        $category = Category::All();
        $product = Product::where('name', 'like', '%' . $req->key . '%')
            ->orWhere('price', $req->key)
            ->get();
        return view('search', compact('product','category' ));
    }
    public function layoutSelectSearch()
    {
        $category = Category::All();
        return view('layout',compact('category'));

    }
    //liên hệ
    public function contact()
    {
        $category = Category::All();
        return view('contact', compact('category'));
    }
}
