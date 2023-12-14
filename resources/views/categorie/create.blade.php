@extends('layouts.app')
   
@section('content')
   
<div class="container ">
    <div class="mb-3">
        <div class="pull-left">
            <h2>Add New category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('categorie.index') }}"> Back</a>
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
     
<form  action="{{ route('categorie.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    
     <div class="container ">
        <div class="mb-3">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
     
       
        <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
</form>

@endsection