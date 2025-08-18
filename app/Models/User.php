<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFavorite\Traits\Favoriter;
use Overtrue\LaravelFollow\Traits\Followable;
use Overtrue\LaravelFollow\Traits\Follower;
use Overtrue\LaravelLike\Traits\Liker;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use  HasApiTokens,HasFactory, Notifiable;
    use Liker;
    use Favoriter;
    use Follower;
    use Followable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
 

    protected $primaryKey = 'user_id';
    protected $fillable = [
       'name', 
        'username',
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

     public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'user_id');
    }
    function comments(): HasMany{
        return $this->hasMany(Comment::class,'user_id', 'user_id');
    }

    function conversations(): HasMany {
        return $this->hasMany(Conversation::class,'sender_id')->orWhere('receiver_id',$this->user_id);
    }

        public function receivesBroadcastNotificationsOn(): string
    {
        return 'users.'.$this->user_id;
    }
}
