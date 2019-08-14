@extends('layouts.admin')


@section('content')
    <h1>Categories</h1>
<br>

    <div class="col-sm-6">
        <form method="POST" action="{{ route('categories.store') }}">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn btn-info">Create Category</button>
            </div>
        </form>
     </div>


    <div class="col-sm-6">
 
            @if($categories)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>    
                    <th>Created</th>
                    <th>Updated</th>        
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>                      
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
 

    </div>


@endsection
