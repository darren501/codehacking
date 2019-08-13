@extends('layouts.admin')


@section('content')

<h1>Create Post</h1>


<div class="row">
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
        
    <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category: </label>
            <select name="category_id" id="" class="form-control">
                <option value="">Select Category</option>
    
                @foreach($categories as $category) 
                <option value="{{ $category->id }}"  {{ ( old("category_id") == $category->id ? 'selected': '') }}>{{ $category->name }}</option>
                @endforeach

            </select>
        </div>

 

        <div class="form-group">
                <label for="file">Upload Photo:</label>
                <input type="file" id="file" name="photo_id">
        </div>

    
        <div class="form-group">
            <label for="body">Body: </label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"> 
            {{ old('body') }}
            </textarea>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-info">Create Post</button>
        </div>
    </form>
</div>

<br>


<div class="row">
@include('includes.form_error')
</div>

@endsection