@extends('layouts.app')

@section('title') create @endsection
@section('content')
        <form method="POST" action="{{route('posts.store')}}">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="desc" type="text"  class="form-control"></textarea>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                <select name="posted-by" class="form-control">
                    @foreach ($users as $user)
                    <option value="{{$user -> id}}">{{$user -> name}}</option>
                    @endforeach
                </select>
              </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
   
@endsection