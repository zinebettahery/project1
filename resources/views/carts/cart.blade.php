@extends('layouts.nav')

@section('title', 'Panier')

@section('content')
<div class="container">
  <h1>Panier</h1>

  @if ($cartItems->count() > 0)
    <table class="table">
      <thead>
        <tr>
          <th>Produit</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Quantité</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cartItems as $cartItem)
          <tr>
            <td><img src="/image/{{ $cartItem->product->image }}" width="100px"></td>
            <td>{{ $cartItem->product->name }}</td>
            <td>{{ $cartItem->product->price }}</td>
            <td>{{ $cartItem->prod_quantity }}</td>
            <td>{{ $cartItem->product->price * $cartItem->prod_quantity }}</td>
            <td>
              <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="text-end">
      <h4>Total: {{ $total }}</h4>
      <a href="{{ route('checkout') }}" class="btn btn-primary">Passer à la caisse</a>
    </div>
  @else
    <p>Votre panier est vide.</p>
    <a href="{{ route('index') }}" class="btn btn-primary">Continuer vos achats</a>
  @endif
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  function addToCart(productId, quantity) {
    fetch('/ajouter-au-panier', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({
        produit_id: productId,
        quantite: quantity
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.login_required) {
        // Redirigez l'utilisateur vers la page de connexion
        window.location.href = '{{ route("login") }}';
        alert('Connectez-vous d\'abord.');
      } else {
        // Affichez un message de confirmation
        alert('Le produit a été ajouté au panier.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }
</script>
@endsection
