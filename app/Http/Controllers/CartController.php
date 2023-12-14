<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // Récupérer les éléments du panier pour l'utilisateur connecté
        $cartItems = Cart::where('user_id', auth()->id())->get();
        $total = 0;
        $cartItemCount = count(Cart::getContent());

        foreach ($cartItems as $cartItem) {
          
            if (is_numeric($cartItem->product->price) && is_numeric($cartItem->prod_quantity)) {
                $total += $cartItem->product->price * $cartItem->prod_quantity;
            }
        }
        return view('Carts.cart', compact('cartItems', 'total', 'cartItemCount','categories'));

    }

    public function ajouterAuPanier(Request $request)
    {
        $produitId = $request->input('produit_id');
        $quantite = $request->input('quantite');
    
        // Verify if the product exists
        $produit = Product::find($produitId);
        if (!$produit) {
            return redirect()->back()->with('error', 'Produit non trouvé');
        }
    
        // Verify if the quantity is available
        if ($quantite > $produit->quantity) {
            return redirect()->back()->with('error', 'Quantité non disponible');
        } 
    
        // Check if user is authenticated
        if (!Auth::check()) {
            return view('auth.login');
        }
    
        // Add the product to the cart of the logged-in user
        $cart = new Cart;
        $cart->prod_id = $produitId;
        $cart->user_id = Auth::user()->id;
        $cart->prod_quantity = $quantite;
        $cart->save();
    
        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès');
    }
    
    
    public function show($id)
    {
        // Utilisez l'identifiant $id pour récupérer les détails du produit depuis la base de données
        $product = Product::findOrFail($id);
        
        // Retourne la vue 'carts.show' en passant les détails du produit
        return view('carts.show', compact('product'));
    }
    
    
    
    public function destroy($cartItemId)
    {
        // Find the cart item in the database
        $cartItem = Cart::where('id', $cartItemId)->where('user_id', auth()->id())->firstOrFail();
    
        // Delete the cart item
        $cartItem->delete();
    
        // Redirect back to the cart page or any other appropriate route
        return redirect()->route('cart')->with('success', 'Produit supprimé du panier');
    }
    
            
            public function checkout()
        {
            
            // Effectuez ici les étapes nécessaires pour le processus de paiement
            
            // Par exemple, vous pouvez accéder aux articles du panier comme ceci :
            $cartItems = Cart::getContent();
            $total = 0;
           
            foreach ($cartItems as $cartItem) {
          
                if (is_numeric($cartItem->product->price) && is_numeric($cartItem->prod_quantity)) {
                    $total += $cartItem->product->price * $cartItem->prod_quantity;
                }
            }
            
            // Vous pouvez également effectuer d'autres opérations, telles que vider le panier, en fonction de vos besoins
            
            // Retournez la vue de la page de paiement avec les données nécessaires
            return view('checkout', compact('cartItems','total'));
        }


}
