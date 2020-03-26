<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <h1>Insert a Post</h1>
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
    <form class="" action="{{route('posts.store')}}" method="post">
      @csrf
        <input name="title" type="text" value="" placeholder='Title'>
        <input name="content" type="text" value="" placeholder = 'Content'>
        <input name="slug" type="text" value="" placeholder = 'Slug'>
        <input name="author" type="text" value="" placeholder= 'Author'>

        <button type="submit" name="button">Save</button>
      @method('POST')
    </form>
  </body>
</html>
