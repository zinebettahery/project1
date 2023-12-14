@extends('layouts.nav')
   
@section('content')
  <!-- Navigation-->
 
<!-- Header-->
<header style=" background-color: rgba(116, 107, 107, 0);  ">
    <img src="/image/bg.png" width="100%" alt="Background Image">
    <div class="container px-4 px-lg-5 my-5 text-overlay">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Electro Shop</h1>
            <p class="lead fw-normal -50 mb-0"> Votre destination de confiance pour les</p>
            <p class="lead fw-normal -50 mb-0">    téléphones et les PC de qualité supérieure</p>
                  </div>
    </div>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-{{ session('status_type') }} text-center">
                {{ session('status') }}
            </div>
        @endif
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
color: rgb(40, 32, 48)
/* Autres styles de texte */
}

.text-overlay p {
font-size: 1.5rem;
/* Autres styles de texte */
}

</style>

<!-- Section-->
<section class="py-5">
   
    
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
                            
                            {{ $product->price }} DH
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
    <script>
        function filterProducts(categoryId) {
    if (categoryId === 'all') {
        // Affichez tous les produits existants
        // Code pour afficher tous les produits
    } else {
        // Appel AJAX pour récupérer les produits filtrés
        fetch('/products/category/' + categoryId)
            .then(response => response.json())
            .then(data => {
                // Mettez à jour le contenu du conteneur avec les produits filtrés
                // Code pour mettre à jour le contenu du conteneur avec les produits filtrés
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
}

    </script>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/script.js"></script>
@endsection

