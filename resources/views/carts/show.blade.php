@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="py-3 mb-4 shadow-sm border-top" style="color: black;">
  <div class="container">
    <h4 class="mb-0">
      <a href="{{ url('/') }}"> <i class="fa fa-home"></i></a>
    </h4>
  </div>
</div>

<div class="container mb-5">
  <div class="card shadow product_data">
    <div class="card-body">
      <div class="row">
        <div class="col-md-4 border-right">
          <img src="/image/{{ $product->image }}" class="w-100" alt="">
        </div>
        <div class="col-md-8">
          <h2 class="mb-0">
            {{ $product->name }}
            <label style="font-size: 16px;background-color:#f7a54a;" class="float-end badge trending_tag">
              {{ $product->trending == '1' ? 'Nouveauté' : '' }}
            </label>
          </h2>
          <hr>
          
          <label class="fw-bold">Selling Price: {{ $product->price }}</label>
          <p class="mt-3">
            {{ $product->detail }}
          </p>
          <hr>
          @if ($product->quantity > 0)
          <label class="badge bg-success">In stock</label>
          
          <div class="col-md-9">
            <form action="{{ route('cart.ajouter') }}" method="POST">
                @csrf
                <input type="hidden" name="produit_id" value="{{ $product->id }}">
                <input type="number" name="quantite" value="1" min="1" max="{{ $product->quantity }}">
                <button class="btn btn-outline-dark" type="submit">ajouter au panier</button>
            </form>
          </div>
          @else
          <label class="badge bg-danger">Out of stock</label>
          <div class="col-md-9">
            <button class="btn btn-secondary" disabled>Indisponible</button>
          </div>
          @endif
          
          @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
          @endif

          @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
          @endif
          
        </div>
      </div>
      <hr/>
      <h3>Description</h3>
      <p>{{ $product->detail }}</p>
    </div>
  </div>
</div>
<script></script>

@endsection

