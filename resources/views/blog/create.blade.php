<h1>Create Blog Post</h1>

<form class="" action="/crud_laravel2/blog" method="post"> <!-- action="/nama_controller" -> di sini menggunakan controller blog    -->
  <input type="text" name="title" value="" placeholder="Judul">
    {{ ($errors)->has('title') ? $errors->first('title') : '' }}<br>
  <textarea name="subject" rows="8" cols="40" placeholder="is...."></textarea>
  {{ ($errors)->has('subject') ? $errors->first('subject') : '' }}<br>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" name="name" value="post">
</form>
