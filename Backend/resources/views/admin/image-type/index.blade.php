@extends('adminlte::page')

@section('title', 'Image Type List')

@section('content_header')
    <h1>Image Type List</h1>
@stop

@section('content')
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($products) }} --}}
            @foreach($image_types as $image_type)
            <tr>
                <td>{{ $image_type->id }}</td>
                <td>{{ $image_type->name }}</td>
                <td>{{ $image_type->created_at }}</td>
                <td>{{ $image_type->updated_at }}</td>
                <td>
                    <a href="{{ route('image_type.details',$image_type->id) }}"><x-adminlte-button label="Info" theme="info" icon="fas fa-info-circle"/></a>
                    <form method="POST" action="{{ route('image_type.delete',$image_type->id) }}">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button type="submit" label="Delete" theme="danger" icon="fas fa-ban"/>
                    </form>
                </td>
            </tr>
            @endforeach</tbody>
    </table>
    <a href="{{ route('image_type.add-page') }}"><x-adminlte-button label="Add" theme="success"/></a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <style>
        div.container {
            width: 80%;
        }
    </style>
@stop

@section('js')
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script> console.log('Hi!'); </script>
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
@stop