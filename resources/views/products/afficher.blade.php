{{-- <form action="{{ route('products.filter') }}" method="GET">
    <select name="category">
        <option value="iphone">toute les catégories</option> --}}
       
        @foreach($categories as $category)
            <a href="{{route('products.filter',$category->id)}}">{{ $category->name }}</a>
        @endforeach
    {{-- </select>
    <button type="submit">Filtrer</button>
</form> --}}
