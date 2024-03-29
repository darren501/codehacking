@extends('layouts.admin')


@section('content')

<h1>Posts</h1>

<table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>            
          </tr>
        </thead>
        <tbody>
              @foreach($posts as $post)
                  <tr>
                      <td>{{ $post->id }}</td>
                      <td><img src="{{ $post->photo ?  $post->photo->file : 'http://placehold.it/400x400' }}" alt="" height="50"></td>
                      <td><a href="{{ route('posts.edit',  $post->id) }}">{{ $post->user->name }}</a></td>
                      <td>{{ $post->category ? $post->category->name : 'Uncategorized'}}</td>                 
                      <td>{{ $post->title }}</td>
                      <td>{{ str_limit($post->body, 100) }}</td>
                      <td>{{ $post->created_at->diffForHumans() }}</td>
                      <td>{{ $post->updated_at->diffForHumans() }}</td>

                  </tr>
              @endforeach
        </tbody>
    </table>
@endsection

