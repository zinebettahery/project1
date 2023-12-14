@extends('layouts.nav')

@section('content')


@if($products->isEmpty())
    <p class="promo-message">Aucun produit en promotion pour le moment.</p>
@else
    <h1>Produits en promotion :</h1>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $product)
                <div class="col mb-5">
                   <a  href="{{ route('cart.show',$product->id) }}">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" img src="/image/{{ $product->image }}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                               
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                
                                <!-- Product price-->
                                
                                <p style="text-decoration: line-through ;color:black;">{{ $product->price }} DH</p>
                                <p style="color:rgb(224, 9, 9);">{{ $product->prixpromo }} DH</p>
                            </div>
                        </div>
                        <!-- Product actions-->
                       
                      <div class="col-md-9">
                         
                          
                          <button type="button" class="btn  me-3 addToCartBtn float-start" style="background-color:#353535; color:white">Ajouter Au Panier <i class="fa fa-shopping-cart"></i></button>
                          
    
                          </div>
                    </div>
                   </a>
                </div>
             
               @endforeach
            </div>
        </div>
    </section>
@endif
<style>
    .promo-message {
        font-size: 18px;
        color: #555;
        text-align: center;
        padding: 10px;
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }
</style>
@endsection