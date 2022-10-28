@extends('layouts.app')

@section('title') Edit @endsection
@section('content')
        <form method="POST" action="{{route('posts.update', $post['id'])}}">
          @method('PUT')
          @csrf
          <div><input type="hidden" name="post-id" value="{{$post->id}}"></div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input type="text" name="title" type="text" value="{{$post -> title}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="desc" type="text"  class="form-control">{{$post -> description}}</textarea>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                <select name="posted-by" class="form-control">
                    <option value="{{$post -> user -> id}}">{{$post-> user -> name}}</option>
                </select>
              </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

@endsection