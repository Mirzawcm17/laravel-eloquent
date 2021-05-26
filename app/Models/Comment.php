<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        $comment = App\Comment::find(1);
        return $this->morphTo();
    }

    public function show() {
        return $this->hasMany('App\Comment', 'parent_id');
    }
}
