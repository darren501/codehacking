@extends('layouts.admin')


@section('content')
        <h1>Edit User</h1>
        

        <div class="row">
                <div class="col-sm-3">
        
                        <img src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt="No Photo" height="60" class="img-responsive img-rounded">
                    
                </div>

                <div class="col-sm-9">
        
                <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" >
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    @if($errors->has('name'))
                        <span class="form_errors"> {{ $errors->first('name') }} </span>
                    @endif
                    </div>

                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        @if($errors->has('email'))
                        <span class="form_errors"> {{ $errors->first('email') }} </span>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="role_id">Role:</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">Choose Role</option>
                            @foreach($roles as $role) 
                            <option value="{{ $role->id }}" {{ (  $user->role->id == $role->id ? 'selected': '') }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('role_id'))
                        <span class="form_errors"> {{ $errors->first('role_id') }} </span>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="is_active">Status:</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option value="0" {{ ( $user->is_active == 0 ? 'selected': '') }}>Not Active</option>
                            <option value="1" {{ ( $user->is_active  == 1 ? 'selected': '') }}>Active</option>

                        </select>
                        @if($errors->has('is_active'))
                        <span class="form_errors"> {{ $errors->first('is_active') }} </span>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if($errors->has('password'))
                        <span class="form_errors"> {{ $errors->first('password') }} </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="file">Upload File:</label>
                        <input type="file" id="file" name="photo_id">
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-info col-sm-6">Save</button>
                    </div>
                </form>

   
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                   
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger col-sm-6" value="Delete User">
                    </div>
                </form>

                </div>
        </div>

        <div class="row">            
            @include('includes.form_error')
        </div>




@endsection