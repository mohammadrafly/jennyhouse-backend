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
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title for article">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc" rows="3" placeholder="Description for article"></textarea>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Video</label>
                        <input type="text" name="video" class="form-control" placeholder="Video embed for article">
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
                    <label for="">Header Image</label><br>
                    <input type="file" name="image1" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" igroup-size="sm"/>           
                </div>
                <div class="form-group">
                    <label for="">Content Image</label><br>
                    <input type="file" name="image2" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" igroup-size="sm"/>
                </div>
                <div class="form-group">
                    <label for="">Content Image</label><br>
                    <input type="file" name="image3" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" igroup-size="sm"/>
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
    <script> console.log('Hi!'); </script>
@stop