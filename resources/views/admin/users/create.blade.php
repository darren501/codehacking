@extends('layouts.admin')
<?php
    use Illuminate\Support\Facades\Input;
?>


@section('content')
        <h1>Create Users</h1>

      
      
 
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" >
        {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
               @if($errors->has('name'))
                   <span class="form_errors"> {{ $errors->first('name') }} </span>
               @endif
            </div>

            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                   <span class="form_errors"> {{ $errors->first('email') }} </span>
               @endif
            </div>

            <div class="form-group">
                <label for="role_id">Role:</label>
                <select name="role_id" id="role_id" class="form-control">
                    <option value="">Choose Role</option>
                    @foreach($roles as $role) 
                    <option value="{{ $role->id }}" {{ ( old("role_id") == $role->id ? 'selected': '') }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('role_id'))
                   <span class="form_errors"> {{ $errors->first('role_id') }} </span>
               @endif
            </div>

            <div class="form-group">
                <label for="is_active">Status:</label>
                <select name="is_active" id="is_active" class="form-control">
                    <option value="0" {{ ( old("is_active") == 0 ? 'selected': '') }}>Not Active</option>
                    <option value="1" {{ ( old("is_active") == 1 ? 'selected': '') }}>Active</option>

                </select>
                @if($errors->has('is_active'))
                   <span class="form_errors"> {{ $errors->first('is_active') }} </span>
               @endif
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>


            <div class="form-group">
                <label for="file">Upload File:</label>
                <input type="file" id="file" name="photo_id">
            </div>

            <button type="submit" class="btn btn-info">Save</button>
        </form>

    @include('includes.form_error')


@endsection