<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItems;
class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afficheData($id = null)
    {
        $categories = Category::all();
    
        if (isset($id)) {
            $products = Product::join('categories as c', 'c.product_id', '=', 'products.id')
                ->select('products.*', 'c.name as nom', 'c.id as id_category')
                ->where('category_id', $id)
                ->get();
        } else {
            $products = Product::inRandomOrder()->paginate(10);
    
            return view('index', compact('products', 'categories'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }
          

    public function index()
    {
        $categories = Category::all();
        // $products = Product::latest()->paginate(5);
        // $cartItems = Cart::getContent();
        $products = Product::latest();
        return view('adminHome',compact('products','categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
           

            // return view('products.index', compact('categories'));
    }

    public function pro()
    {
        $categories = Category::all();
        // $products = Product::latest()->paginate(5);
        // $cartItems = Cart::getContent();
        $products = Product::latest()->paginate(5);
    
        return view('mettrepromo',compact('products','categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
           

            // return view('products.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   
      
{
    $categories = Category::all();
    return view('products.create', ['categories' => $categories]);
}

public function show($id)
{
    $categories = Category::all();
    $product = Product::findOrFail($id);
    $orderItems = OrderItems::where('prod_id', $id)->get();
   
    // Retrieve the order related to the given product
    $orderIds = $orderItems->pluck('order_id');
    $orders = Order::whereIn('id', $orderIds)->get();
    
    return view('products.show', compact('product', 'orderItems', 'orders','categories'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
       
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);
     
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    
   
    
    
   
    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $product->update($input);
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
     
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
    
    public function filter($id)
    {
        $categories = Category::all();
        $products = Product::join('categories as c', 'c.id', '=', 'products.category_id')
            ->select('products.*', 'c.name as category_name', 'c.id as category_id')
            ->where('category_id', $id)
            ->get();
    
        return view('products.filtered', compact('products','categories'));
    }
    



    public function searchProduct(Request $request)
{
    $searchTerm = $request->input('search');

    $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')->get();

    return view('products.search', compact('products'));
}

public function produitsEnPromo()
{
    $categories = Category::all();
    $products = Product::where('promo', true)->get();
    
    if ($products->isEmpty()) {
        $message = "Aucun produit en promotion pour le moment.";
        return view('promo', compact('message','products','categories'));
    }
    
    return view('promo', compact('products','categories'));
}



public function mettreEnPromotion(Request $request,$id )
{
    $product = Product::find($id);
    
    if ($product) {
        $product->promo = true;
        $product->prixpromo = $request->prixPromo;
        $product->duree = $request->duree;
        $product->save();
        
        return redirect()->back()->with('success', 'Le produit a été mis en promotion.');
    } else {
        return redirect()->back()->with('error', 'Produit non trouvé.');
    }
}


public function stock()
{
    $categories = Category::all();
    $products = Product::where('quantity', '<=', 5)->get();

    foreach ($products as $product) {
        if ($product->quantity == 0) {
            $product->message = "Le produit est en rupture de stock";
        } elseif ($product->quantity < 5) {
            $product->message = "Le produit est presque en rupture de stock";
        }
    }

    return view('products.stock', compact('products','categories'));
}


public function nvproduct()
{
    $categories = Category::all();
    $sixMonthsAgo = now()->subMonths(6)->format('Y-m-d');
    $products = Product::whereDate('created_at', '>=', $sixMonthsAgo)
                        ->get();

    return view('nvproduct', compact('products','categories'));
}
}