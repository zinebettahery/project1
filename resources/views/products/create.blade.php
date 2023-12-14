@extends('layouts.app')
   
@section('content')
   
<div class="container ">
    <div class="mb-3">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/adminhome') }}"> Back</a>
        </div>
    </div>
</div>

     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form  action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    
     <div class="container ">
        <div class="mb-3">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="text" name="price" class="form-control" placeholder="price">
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <strong>Stock:</strong>
                <input type="text" name="quantity" class="form-control" placeholder="quantity">
            </div>
        </div>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
</form>

@endsection