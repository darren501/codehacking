@extends('layouts.admin')

@section('content')

  @if(Session::has('deleted_user'))
    <div class="alert alert-danger">
      <strong>{{ session('deleted_user') }}</strong> 
    </div>
  @endif


  @if(Session::has('user_created'))
    <div class="alert alert-success">
    <strong>{{ session('user_created') }}</strong> 
  </div>
@endif

@if(Session::has('user_edited'))
    <div class="alert alert-info">
    <strong>{{ session('user_edited') }}</strong> 
  </div>
@endif

    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
              @foreach($users as $user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td><img src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt="No Photo" height="50"></td>
                      <td><a href="{{ route('users.edit',  $user->id) }}">{{ $user->name }}</a></td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role->name }}</td>
                      <td>
                         {{$user->is_active == 1 ? 'Active' :  'Not Active' }}                      
                      </td>
                      <td>{{ $user->created_at->diffForHumans() }}</td>
                      <td>{{ $user->updated_at->diffForHumans() }}</td>

                  </tr>
              @endforeach
        </tbody>
    </table>
@endsection