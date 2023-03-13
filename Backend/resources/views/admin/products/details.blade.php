@extends('adminlte::page')

@section('title', 'Create Product')

@section('content_header')
    <h1>Create Product</h1>
@stop

@section('content')
    <div class="card-body">
        <form method="POST" action="{{ route('product.update',$product->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name for product">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{ $product->slug }}" class="form-control" placeholder="Slug for product">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" value="{{ $product->link }}" class="form-control" placeholder="Link for product">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" value="{{ $product->price }}" class="form-control" name="price" id="price" placeholder="Enter price">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="">Image</label><br>
                    <input type="file" name="image" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" igroup-size="sm"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc" rows="3" placeholder="Description for product">{{ $product->desc }}</textarea>
                    </div>
                </div>
            </div> 
            <div class="col-sm-6">
                <div class="form-group">
                    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
                </div>
            </div>        
        </form>
    </div>
@stop
            
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop