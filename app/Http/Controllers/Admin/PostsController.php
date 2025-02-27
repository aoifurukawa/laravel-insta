<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    private $post;

    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index(){
        $all_posts = $this->post->withTrashed()->latest()->paginate(3);

        return view('admin.post.index')->with('all_posts', $all_posts);
    }

    public function hide($id){
        $this->post->destroy($id);
        return redirect()->back();
    }

    public function visible($id){
        $this->post->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }


}
