<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('image/logo.png') }}" width="100px">

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <script src="{{ asset('js/app.js') }}" defer></script>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                                <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}" aria-current="page" >Home</a></li>
                                <li class="nav-item"><a class="nav-link active" href="{{ route('produits.enpromo') }}">promo</a></li>
                                <li class="nav-item"><a class="nav-link active" href="{{ route('produits.nvproduct') }}">nouveau</a></li>
                                {{-- @foreach($categories as $category)
                                <a href="{{route('products.filter',$category->id)}}">{{ $category->name }}</a>
                            @endforeach --}}
                            <select name="category" id="categorySelect" class="form-select" aria-label="Default select example" style="width: 120px;">
                                <option selected value="{{url('/')}}"> Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#categorySelect').on('change', function() {
                                        var categoryId = $(this).val();
                                        var url = "{{ route('products.filter', ['id' => ':id']) }}";
                                        window.location.href = url.replace(':id', categoryId);
                                    });
                                });
                            </script>
                            
                            

                            <form class="d-flex" action="{{ route('product.search') }}" method="GET">
                                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </form>
                            
                           
                        </div>

                    </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                
                            </li>
                         
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                 <form action="{{ url('/cart') }}" > 
                                <button class="btn btn-outline-dark" type="submit">
                                    <a href="{{ url('/cart') }}" class="bi-cart-fill me-1"></a>
                                    Cart
                                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                                </button>
                                 </form>
                                
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
