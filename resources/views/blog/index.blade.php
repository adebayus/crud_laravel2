{{ Session::get('message') }}

All Bloglist

<?php foreach ($blogs as $blog ): ?>

  <a href="/crud_laravel2/blog/{{ $blog->id }}"><p> {{ $blog->title }} </p></a>
  <p> {{ $blog->subject }} </p>
  <a href="/crud_laravel2/blog/{{ $blog->id }}/edit">edit</a>

    <form class="" action="/crud_laravel2/blog/{{ $blog->id }}" method="post">
      <input type="hidden" name="_method" value="delete">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" name="name" value="delete">
    </form>
  <hr>
<?php endforeach;
