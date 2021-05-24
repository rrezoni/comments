<html>
<body>
  <form method="post" action="{{ route('post.update',$post->id)}}">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id}}">
    <p>Title:<input type="text" name="title" value="{{ $post->title}}">
    <p>Body:<input type="text" name="body" value="{{ $post->body}}">
    <input type="submit"  value="Submit">
  </form>
</body>
</html>
