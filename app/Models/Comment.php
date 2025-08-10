<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelLike\Traits\Likeable;


class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    use SoftDeletes;
    use Likeable;

    protected $guarded = [];

    
    function commentable() : MorphTo{
        return $this->morphTo();
    }

    function parent(): BelongsTo{
        return $this->belongsTo(self::class,"parent_id");
    }

    function replies(){
        return $this->hasMany(Comment::class,"parent_id","id")->with('replies');
    }

    function user(): BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }
}
