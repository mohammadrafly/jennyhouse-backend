@extends('adminlte::page')

@section('title', 'Details Post')

@section('content_header')
    <h1>Details Post</h1>
@stop

@section('content')
    <x-adminlte-input name="iUser" label="User" placeholder="username" label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop