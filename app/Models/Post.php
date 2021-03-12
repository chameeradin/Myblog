<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\SecondComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'image',
        'body'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function secondComments(){
        return $this->hasMany(SecondComment::class);
    }

    public function commentedBy(User $user){
        return $this->comments->contains('user_id', $user->id);
    }
}
