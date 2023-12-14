@extends('layouts.admin')

@section('content')
    <!-- Display product details -->
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->detail }}</p>
    <!-- ... -->

    <!-- Display order items if any -->
    @if ($orderItems->isNotEmpty())
        <h2>Order Items</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Quantity</th>
                <th>Name</th>
            </tr>
            @foreach ($orderItems as $orderItem)
                <tr>
                    <td>{{ $orderItem->order_id }}</td>
                    <td>{{ $orderItem->qty }}</td>
                    <td>
                        @foreach ($orders as $order)
                            @if ($order->id == $orderItem->order_id)
                                {{ $order->name }} {{ $order->lastname }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No order items found.</p>
    @endif
@endsection

