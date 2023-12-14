@extends('layouts.admin')


@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma page</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .sidebar {
            background-color: #2b7874;
            color: #b82a2a;
            padding: 15px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }

        .body{
            background-color: #2b7874;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="sidebar">
                    <ul>
                        <li><a href="">Products</a></li>
                        <li><a href="{{ route('products.create') }}">Add Product</a></li>
                        <li><a href="{{ route('categorie.index') }}">Categories</a></li>
                        <li><a href="{{ route('categorie.create') }}">Add Category</a></li>
                        <li><a href="{{ url('/orders') }}">Last Orders</a></li>
                        <li><a href="{{route('clients.index')}}">Clients</a></li>
                        <li><a href="{{ url('/mp') }}">Mettre en Promo</a></li>
                        <li><a href="{{ url('/stock') }}">stock des produits</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <header>
                  

                

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </header>

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Categories</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id}}</td>
                            <td><img src="/image/{{ $product->image }}" width="100px"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category_id }}</td>

                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                    <a class="btn btn-info"
                                        href="{{ route('products.show', $product->id) }}">Show</a>

                                    <a class="btn btn-primary"
                                        href="{{ route('products.edit', $product->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
{{-- 
                {!! $products->links() !!} --}}
            </div>
        </div>
    </div>
</body>
@endsection