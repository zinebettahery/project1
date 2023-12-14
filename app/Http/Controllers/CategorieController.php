<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller

{
    public function index()
    {
       
        $category = Category::latest()->paginate(5);
    
        return view('categorie.index',compact('category'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
          
    }
    public function create()
    {
        return view('categorie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
           
        ]);
  
        $input = $request->all();
        Category::create($input);
     
        return redirect()->route('categorie.create')
                        ->with('success','category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categorie.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
           
        ]);
  
        $input = $request->all();
  
       
          
        $product->update($input);
    
        return redirect()->route('categorie.index')
                        ->with('success','category updated successfully');
    }
    public function destroy(Category $category)
    {
        $category->delete();
     
        return redirect()->route('categorie.index')
                        ->with('success','categorie deleted successfully');
    }
}
