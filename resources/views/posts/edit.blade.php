<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <h1>Modify a Room</h1>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </header>
    <form class="" action="{{route('posts.update', $post->id)}}" method="post">
      @csrf
        <input name="title" type="text" value="{{$post->title}}" placeholder='Title'>
        <input name="content" type="text" value="{{$post->content}}" placeholder = 'Content'>
        <input name="slug" type="text" value="{{$post->slug}}" placeholder= 'Slug'>
        <input name="author" type="text" value="{{$post->author}}" placeholder= 'Author'>


        <input type="hidden" name="id" value="{{$post->id}}">
        <button type="submit" name="button">Save</button>
      @method('PATCH')
    </form>
  </body>
</html>
