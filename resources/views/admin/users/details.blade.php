@extends('adminlte::page')

@section('title', 'Details User')

@section('content_header')
    <h1>Details User</h1>
@stop

@section('content')
<form action="POST" action="{{ route('user.update',$user->id) }}">
    @csrf
    <x-adminlte-input name="iUser" label="User" value="{{ $user->name }}" label-class="text-lightblue">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input name="iMail" type="email" value="{{ $user->email }}">
        <x-slot name="prependSlot">
        <div class="input-group-prepend">
            <span class="input-group-text">@</span>
        </div>
        </x-slot>
    </x-adminlte-input>
    
    {{-- <x-adminlte-input name="iMail" type="email" value="{{ $user->email }}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-red"></i>
            </div>
        </x-slot>
    </x-adminlte-input> --}}
    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop