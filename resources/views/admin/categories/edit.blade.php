@extends('layouts.admin')


@section('content')
    <h1>Edit Category</h1>
<br>

    
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn btn-info col-sm-6">Update Category</button>
            </div>
        </form>




        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
        {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <div class="form-group">
                <button type="submit" class="btn btn-danger col-sm-6">Delete Category</button>
            </div>
        </form>
    

@endsection
