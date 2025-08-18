<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $date = ['read_at'];

    function Conversation() {
        return $this->belongsTo(Conversation::class);
    }

    function isRead(){
        return $this->read_at != null;
    }
}
