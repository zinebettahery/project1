@extends('layouts.nav')

@section('content') 
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        @if($products->count() > 0)
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
            <div class="col mb-5">
                <a href="{{ route('cart.show',$product->id) }}">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="/image/{{ $product->image }}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <!-- Product price-->
                                {{ $product->price }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="col-md-9">
                            <button type="button" class="btn me-3 addToCartBtn float-start" style="background-color:#353535; color:white">Ajouter Au Panier <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <p class="no-results text-center">Aucun résultat trouvé.</p>
        @endif
    </div>
</section>
@endsection

@section('styles')
<style>
.no-results {
    color: red;
    font-weight: bold;
    font-size: 18px;
    /* Ajoutez d'autres propriétés CSS selon vos préférences */
}
</style>
@endsection