@extends('adminlte::page')

@section('title', 'Post List')

@section('content_header')
    <h1>Post List</h1>
@stop

@section('content')
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Content</th>
                <th>Deleted At</th>
                <th>Published</th>
                <th>Image</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($posts) }} --}}
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->users_name }}</td>
                <td>{{ $post->category_title }}</td>
                <td>{{ $post->posts_title }}</td>
                <td>{{ $post->posts_slug }}</td>
                <td>{{ Str::limit($post->posts_content, 50) }}</td>
                <td>{{ $post->deleted_at }}</td>
                <td>{{ $post->posts_published }}</td>
                <td>
                    <img style="width: 35px; height: 35px" src="{{ asset('uploads/'.$post->posts_image) }}" alt="" srcset="">
                </td>
                <td>{{ $post->posts_date }}</td>
                <td>
                    <a href="{{ route('post.details',$post->posts_id) }}"><x-adminlte-button label="Info" theme="info" icon="fas fa-info-circle"/></a>
                    <form method="POST" action="{{ route('post.delete',$post->posts_id) }}">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button type="submit" label="Delete" theme="danger" icon="fas fa-ban"/>
                    </form>
                </td>
            </tr>
            @endforeach</tbody>
    </table>
    <a href="{{ route('post.add-page') }}"><x-adminlte-button label="Add" theme="success"/></a>
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