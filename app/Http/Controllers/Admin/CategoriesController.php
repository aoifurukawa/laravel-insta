<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    private $category;
    private $post;

    public function __construct(Category $category, Post $post){
        $this->category = $category;
        $this->post = $post;
    }

    public function index(){
        $all_categories = $this->category->orderBy('updated_at', 'desc')->get();
        $uncategorized_count = $this->countUncategorized();

        return view('admin.categories.index')->with('all_categories', $all_categories)
                                                ->with('uncategorized_count', $uncategorized_count);
    }

    private function countUncategorized(){
        $all_posts = $this->post->all();
        $uncategorized_count = 0;
        
        foreach($all_posts as $post){
            if($post->CategoryPost->count() == 0){
                $uncategorized_count++;
            }
        }

        return $uncategorized_count;
    }

    public function add(Request $request){
        $request->validate([
            'name' => 'required|min:1|max:50',
        ]);

        $this->category->name = $request->name;
        $this->category->save();

        return redirect()->back();
    }

    public function edit(Request $request, $id){
        $request->validate([
            'name' => 'required|min:1|max: 50'
        ]);

        $category = $this->category->findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->back();
    }

    public function destroy($id){
        $category = $this->category->findOrFail($id);
        $category->delete();

        return redirect()->back();
    }
}

