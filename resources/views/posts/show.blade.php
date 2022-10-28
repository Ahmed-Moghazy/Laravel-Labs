@extends('layouts.app')

@section('title') Show @endsection
@section('content')
<div class="card">
  <h5 class="card-header">Post Info</h5>
  <div class="card-body">
    <h5 class="card-title">Title: {{$post -> title}}</h5>
    <p class="card-text">Description</p>
    <p class="card-text">{{$post -> description}}</p>
    
  </div>
</div>
<div class="card">
  <h5 class="card-header">Post Creator Info</h5>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"><span>Name:</span> {{$post -> user -> name}}</p>
    <p class="card-text"><span>Email:</span> {{$post -> user -> email}}</p>
    <p class="card-text"><span>Created at:</span> {{$post -> created_at -> toDayDateTimeString()}}</p>
    <a href="{{route('posts.index')}}" class="btn btn-primary">Go back</a>
  </div>
</div>
<div>
  <h5>Comments</h5>
  <table class="table nt-4">
    <thead>
      <th class="col">#</th>
      <th class="col">comment</th>
      <th class="col">date</th>
      <th class="col">action</th>
    </thead>
    <tbody>
      @foreach ($post->comments as $comment )
      <tr>
        <td>{{$comment -> id}}</td>
        <td>{{$comment -> content}}</td>
        <td>{{$comment -> created_at}}</td>
        <td>
          <a href="#" class="btn "><x-button type='secondary' action='Edit'></x-button></a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button> 
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center my-3">
    <form action="{{route('posts.comment.store', $post['id'])}}" method="POST" class="d-flex">
      @csrf
      <label for="" class="form-label">Add Comment</label>
      <input type="text" class="form-control w-75" name="comment">
      <input type="submit" value="add comment" class="btn btn-primary w-25">
    </form>
  </div>
</div>
@endsection