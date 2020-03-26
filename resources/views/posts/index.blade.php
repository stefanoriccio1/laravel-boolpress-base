@extends('layouts.layout')

@section('header')
 <h1>Posts index</h1>
 @if(!empty($id))
   <div>
     Hai cancellato il post con ID: {{$id}}
   </div>
 @endif
@endsection

@section('main')
  @foreach ($posts as $post)
    @dd($post->user);
    <div class="room">
      <ul>
        <li>id: {{$post->id}}</li>
        <li>Title: {{$post->title}}</li>
        <li>Text: {{$post->content}}</li>
        <li>Author: {{$post->author}}</li>
        <li>
          <form action="{{route('posts.destroy', $post->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">DELETE</button>
          </form>
        </li>
      </ul>
    </div>
  @endforeach
@endsection
