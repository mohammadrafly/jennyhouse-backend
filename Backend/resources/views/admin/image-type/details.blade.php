@extends('adminlte::page')

@section('title', 'Create Image Type')

@section('content_header')
    <h1>Create Image Type</h1>
@stop

@section('content')
    <div class="card-body">
        <form method="POST" action="{{ route('image_type.update',$image_type->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <x-adminlte-input name="name" label="Name" value="{{ $image_type->name }}" placeholder="Footer/Header" fgroup-class="col-md-6" disable-feedback/>
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