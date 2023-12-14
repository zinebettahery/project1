@extends('layouts.app')

@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Date de commande</th>
                <th>Numéro de suivi</th>
                <th>Statut</th>
                <th>Modifier</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->tracking_no }}</td>
                    <td>
                        @if ($order->status == 0)
                            En attente
                        @elseif ($order->status == 1)
                            En cours de livraison
                        @elseif ($order->status == 2)
                            Livrée
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="status">Statut :</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>En attente</option>
                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>En cours de livraison</option>
                                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Livrée</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </td>
                    <td>{{ $order->total_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
