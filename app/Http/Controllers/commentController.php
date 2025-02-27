<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    private $comment;
    public function __construct(Comment $comment){  
        $this->comment = $comment;
    }

    public function store(Request $request, $post_id){
        $request->validate( [
            'comment_body'. $post_id => 'required|max:150'
        ],
[
            'comment_body' . $post_id . '.required' => 'You can not submit an empty content',
            "comment_body$post_id.max"              => 'The comment must not have than 150 characters'
        ]
        );
        // echo $request->input('comment_body' . $post_id);
        $this->comment->body = $request->input('comment_body' . $post_id);
        // $this->comment->body = "test";
        $this->comment->user_id = Auth::user()->id;
        $this->comment->post_id = $post_id;
        $this->comment->save();

        return redirect()->route('post.show', $post_id);
     }

     public function destroy($id){
        // $comment = $this->comment->findOrfail($id);
        // $comment->delete();
        $this->comment->destroy($id);
        return redirect()->back();
     }
}

