@extends('layouts.nav')
   
@section('content')
    <body>
        <!-- Navigation-->
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#!"><img src='/image/logo.png' width="100 px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" >Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>

                            </ul>
                        
                        </li>
                    </ul>
                    <form action="{{ route('product.search') }}" method="GET">
                        <input type="text" name="search" placeholder="Rechercher un produit">
                        <button type="submit">Rechercher</button>
                      </form>
                      
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit" href="{{ url('/cart') }}">
                            <i  href="{{ url('/cart') }}" class="bi-cart-fill me-1" ></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav> --}}
        <!-- Header-->
        <header style=" background-color: rgba(116, 107, 107, 0);  ">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-{{ session('status_type') }} text-center">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <img src="/image/bg.png" width="100%"   s>
            <div class="container px-4 px-lg-5 my-5 text-overlay">
                
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Electro Shop</h1>
                    <p class="lead fw-normal text-60 mb-0"> Votre destination de confiance pour  </p>
                     <p class="lead fw-normal text-50 mb-0">les téléphones et les PC de qualité supérieure</p>
                   
                </div>
            </div>
            
            
        </header>
        
        
        <style>
     .text-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: left;
    align-items: left;
 
    text-align: left;
    background-color: rgba(116, 107, 107, 0); /* Couleur de fond de la superposition */
}

.text-overlay h1 {
    font-size: 3rem;
    color: rgb(101, 150, 203)
    /* Autres styles de texte */
}

.text-overlay p {
    font-size: 1.5rem;
    color: rgb(18, 17, 25)
    /* Autres styles de texte */
}
.py-5{
    background-color: rgba(116, 107, 107, 0);
}

        </style>
        <!-- Section-->
       
        
        <section class="py-5" style='background-color: rgba(116, 107, 107, 0);'  >
            
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($products as $product)
                    <div class="col mb-5">
                       <a  href="{{ route('cart.show',$product->id) }}">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"></div>
                            <!-- Product image-->
                            <img class="card-img-top" img src="/image/{{ $product->image }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                   
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    
                                    <!-- Product price-->
                                    
                                    {{ $product->price }}DH
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        
                                <div class="text-center">      
                                     <button type="button" class="btn  me-3 addToCartBtn float-start " style="background-color:#323335; color:white">Ajouter Au Panier <i class="fa fa-shopping-cart"></i></button></div>
                            </div>
                        </div>
                       </a>
                    </div>
                 
                   @endforeach
                </div>
            </div>
        

        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/script.js"></script>
    </body>
    @endsection