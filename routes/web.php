<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('index');
});


Route::get('/cnx', function () {
    return view('cnx');
});

// web.php
Route::get('/','App\Http\Controllers\ProductController@afficheData')->name('index');
//pour les produits
Route::resource('products', ProductController::class);


//auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::get('/stock', [ProductController::class, 'stock'])->name('product.stock');

//search client
Route::get('/product/search', [ProductController::class, 'searchProduct'])->name('product.search');
//search admin
Route::get('/admin/search', [CategoryController::class, 'searchProduct'])->name('admin.search');

//filter

Route::get('/products/filter/{id}', [ProductController::class, 'filter'])->name('products.filter');

Route::get('/admin/filter/{id}', [CategoryController::class, 'filter'])->name('admin.filter');
//pour le panier
Route::post('/ajouter-au-panier', [CartController::class, 'ajouterAuPanier'])->name('cart.ajouter');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/AddCart{id}', [CartController::class, 'show'])->name('cart.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::delete('/cart/{cartItemId}', [CartController::class, 'destroy'])->name('cart.destroy');


 Route::post('/place-order', [checkoutController::class, 'placeorder'])->name('place-order');
Route::get('/checkout', [checkoutController::class, 'index'])->name('checkout');


//pour le category
Route::get('/categories', [CategorieController::class, 'index'])->name('categorie.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categorie.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categorie.store');
Route::get('/categories/{category}/edit', [CategorieController::class, 'edit'])->name('categorie.edit');
Route::put('/categories/{category}', [CategorieController::class, 'update'])->name('categorie.update');
Route::delete('/categories/{category}', [CategorieController::class, 'destroy'])->name('categorie.destroy');


Route::get('/mp','App\Http\Controllers\ProductController@pro');
Route::get('/promo', [ProductController::class, 'produitsEnPromo'])->name('produits.enpromo');
Route::post('/produits/{id}/promotion', [ProductController::class, 'mettreEnPromotion'])->name('product.promotion');

Route::get('/nvproduct', [ProductController::class, 'nvproduct'])->name('produits.nvproduct');
//LES CLIENTS
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');


Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
Route::put('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');


Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');