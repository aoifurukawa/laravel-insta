<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $post;
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home_posts = $this->gethomePosts();
        $suggest_users = $this->getSuggestUsers();

        return view('users.home')
                ->with('home_posts', $home_posts)
                ->with('suggested_users', $suggest_users);
    }

    private function gethomePosts(){
        $all_posts = Post::latest()->get();
        $home_posts  = [];  //in case the $home_posts latar is empty, it will not return null, but empty array instead

        foreach($all_posts as $post){
            if($post->user->isFollowed() || $post->user->id === Auth::user()->id){
                $home_posts[] = $post;
            }
        }

        return $home_posts;
    }

    private function getSuggestUsers(){
        $all_users = $this->user->all()->except(Auth::user()->id);
        $suggested_user = [];

        foreach($all_users as $user){
            if(!$user->isFollowed()){
                $suggested_user[] = $user;
            }
        }

        return $suggested_user;
    }

    public function search(Request $request){
        $users = $this->user->where('name', 'like', '%'. $request->search . '%')->get();
        return view('users.search')->with('users', $users)->with('search', $request->search);
    }

    public function allSuggest(){
        $suggest_users = $this->getSuggestUsers();
        return view('users.allSuggest')->with('suggested_users', $suggest_users);
    }
}

