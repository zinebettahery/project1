@extends('layouts.app')
   
@section('content')

    <div class="row">
        <div class="p-4 g-col-6">
            <div class="pull-left">
                <h2>Edit category</h2>
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
    
    <form action="{{ route('categorie.update',$category->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div  class="container ">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
    
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 pt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </div>
     
    </form>
@endsection