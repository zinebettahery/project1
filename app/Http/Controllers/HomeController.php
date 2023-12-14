<?php
   
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $cartItems = Cart::getContent();
    $categories = Category::all();
    $products = Product::latest()->paginate(5);
    
    return view('home', compact('products', 'cartItems', 'categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    
  
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('adminHome',compact('products','categories'));
       
            
     
    }
    
}