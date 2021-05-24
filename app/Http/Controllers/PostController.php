<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Post;

class PostController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
    {
      $post = new Post;
      $post->title = $request->get('title');
      $post->body = $request->get('body');

      $post->save();

      return redirect('posts');
    }
    public function index()
{
    $posts = Post::select('id', 'title')->get();

    return view('index', compact('posts'));
}
public function show($id)
{
    $post = Post::find($id);

    return view('show', compact('post'));
}
public function edit($id){

  $post = Post::find($id);
  return view('edit',compact('post'));
}



public function update(Request $request)
{
  $post_id =$request->input('post_id');
  $post_title = $request->input('title');
  $post_body = $request->input('body');

  $post = Post::find($post_id);
  $post->title = $post_title;
  $post->body = $post_body;

  if($post->save()) {
    echo "Post is update";
  }else{
    echo "Error";
  }

//  return redirect('posts');
}
function delete($id){
  $post = Post::find($id);
  if($post !==null){
    $post->delete();
    return "Post is delete";

    }
    return "Post is not found";

}
}
