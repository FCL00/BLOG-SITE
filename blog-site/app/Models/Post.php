<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 'title',  'body', 'user_id'];


    //relationship
    public function user()
    {
        //on this post belongs to this user_id or to this user
        return $this->belongsTo(User::class, 'user_id');
    }
}
