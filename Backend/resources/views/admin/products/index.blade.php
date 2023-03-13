@extends('adminlte::page')

@section('title', 'Product List')

@section('content_header')
    <h1>Product List</h1>
@stop

@section('content')
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Link</th>
                <th>Price</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Image</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($products) }} --}}
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->link }}</td>
                <td>{{ $product->slug }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->desc }}</td>
                <td>
                    <img style="width: 35px; height: 35px" src="/storage/products/images/{{ $product->image }}" alt="" srcset="">
                </td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a href="{{ route('product.details',$product->id) }}"><x-adminlte-button label="Info" theme="info" icon="fas fa-info-circle"/></a>
                    <form method="POST" action="{{ route('product.delete',$product->id) }}">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button type="submit" label="Delete" theme="danger" icon="fas fa-ban"/>
                    </form>
                </td>
            </tr>
            @endforeach</tbody>
    </table>
    <a href="{{ route('product.add-page') }}"><x-adminlte-button label="Add" theme="success"/></a>
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