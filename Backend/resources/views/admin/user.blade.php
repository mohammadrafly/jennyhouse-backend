@extends('adminlte::page')

@section('title', 'User List')

@section('content_header')
    <h1>User List</h1>
@stop

@section('content')
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <x-adminlte-button label="Info" theme="info" icon="fas fa-info-circle"/>
                    <x-adminlte-button label="Delete" theme="danger" icon="fas fa-ban"/>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script> console.log('Hi!'); </script>
<script>
    $(document).ready(function () {
    $('#table').DataTable({
        columnDefs: [
            {
                targets: [0],
                orderData: [0, 1],
            },
            {
                targets: [1],
                orderData: [1, 0],
            },
            {
                targets: [4],
                orderData: [4, 0],
            },
        ],
    });
});
    </script>
@stop