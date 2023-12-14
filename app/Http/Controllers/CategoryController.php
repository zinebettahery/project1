<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class CategoryController extends Controller
{
    public function searchProduct(Request $request)
    {
        $searchTerm = $request->input('search');
        $categories = Category::all();
        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')->get();
    
        return view('admin.search', compact('products','categories'));
    }

    public function filter($id)
    {
        $categories = Category::all();
        $products = Product::join('categories as c', 'c.id', '=', 'products.category_id')
            ->select('products.*', 'c.name as category_name', 'c.id as category_id')
            ->where('category_id', $id)
            ->get();
    
        return view('admin.filtered', compact('products','categories'));
    }
    
}
