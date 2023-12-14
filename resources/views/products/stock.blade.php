@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Stock des produits</h1>

    @if ($products->isEmpty())
        <p>Aucun produit disponible.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>id </th>
                    <th>Nom du produit</th>
                    <th>Quantité</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                       
                        <td>
                            @if ($product->quantity == 0)
                                <span class="text-danger">Le produit est en rupture de stock</span>
                            @elseif ($product->quantity < 5)
                                <span class="text-warning">Le produit est presque en rupture de stock</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
