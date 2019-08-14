@extends('layouts.admin')


@section('content')

<h1>Edit Post</h1>



<div class="row">

    <div class="col-sm-3">
            
            <img src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt="No Photo" height="60" class="img-responsive img-rounded">
        
    </div>

    <div class="col-sm-9">
    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
        
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category: </label>
            <select name="category_id" id="" class="form-control">
                <option value="">Select Category</option>
    
                @foreach($categories as $category) 
                <option value="{{ $category->id }}"  {{ ( $post->category_id == $category->id ? 'selected': '') }}>{{ $category->name }}</option>
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
            {{ $post->body }}
            </textarea>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-info col-sm-6">Update Post</button>
        </div>
    </form>

     
        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger col-sm-6" value="Delete Post">
                </div>
        </form>
    </div>


   
</div>

<br>


<div class="row">
@include('includes.form_error')
</div>

@endsection