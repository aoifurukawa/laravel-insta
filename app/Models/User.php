<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    const ADMIN_ROLE_ID = 1;
    const USER_ROLE_ID =2;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // to get all the posts of the user
    public function posts(){
        return $this->hasMany(Post::class)->latest();
    }

    public function commnets(){
        return $this->hasMany(Comment::class);
    }

    public function followers(){
        return $this->hasMany(Follow::class, 'following_id');
        // following_id can show who are following me
    }

    // to get app the users that user is following
    public function following(){
        return $this->hasMany(Follow::class, 'follower_id');
    }

    // to check if the logged in user is following the user
    public function isFollowed(){
        return $this->followers()->where('follower_id', Auth::user()->id)->exists();
        // auth::user()->id id the follower_id
        // firstly, get all the followers of of the users ($this->followers()). Then, form that list, serch for the Auth user form the follower column (where('follower_id', Auth::user()->id))
    }
}
