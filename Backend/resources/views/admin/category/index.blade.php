@extends('adminlte::page')

@section('title', 'Category List')

@section('content_header')
    <h1>Category List</h1>
@stop

@section('content')
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($products) }} --}}
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->desc }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="{{ route('category.details',$category->id) }}"><x-adminlte-button label="Info" theme="info" icon="fas fa-info-circle"/></a>
                    <form method="POST" action="{{ route('category.delete',$category->id) }}">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button type="submit" label="Delete" theme="danger" icon="fas fa-ban"/>
                    </form>
                </td>
            </tr>
            @endforeach</tbody>
    </table>
    <a href="{{ route('category.add-page') }}"><x-adminlte-button label="Add" theme="success"/></a>
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