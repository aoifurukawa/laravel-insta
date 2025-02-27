<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'category_post';  //Tells Laravel to use this table in the database
    protected $fillable = ['post_id', 'category_id'];
    public $timestamps = false; //Tell lalavel not to use created_at and updated_at columns

    // to get the name of the category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

