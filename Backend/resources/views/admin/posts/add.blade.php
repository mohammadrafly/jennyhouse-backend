@extends('adminlte::page')

@section('title', 'Create Post')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')
    <div class="card-body">
        <form method="POST" action="{{ route('post.create') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <x-adminlte-select-bs id="optionsCategory" name="category_id" label="Categories">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </x-adminlte-select-bs>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <x-adminlte-select-bs id="optionsCategory" name="product_id" label="Products">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                        </x-adminlte-select-bs>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title for article">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Slug (*gunakan title sebagai slug dengan format: judul-title-yang-akan-upload)</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug | slug-text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Content</label><br>
                        <textarea id="editor" name="content"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Published</label>
                    <select name="published" class="custom-select">
                        <option value="1">True</option>
                        <option value="0">False</option>
                    </select>
                </div>
            </div>        
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Image</label><br>
                    <input type="file" name="image" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" igroup-size="sm"/>           
                </div>
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
    <script src="https://cdn.tiny.cloud/1/dly10rldwl93fpwdoi8nv78im7skypdt2x18nwuoh1juc8eb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
          tinymce.init({
            selector: 'textarea#editor',
          });
        </script>
@stop