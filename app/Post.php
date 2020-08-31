<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;
    //table name
    protected $table = 'posts';
    //primary key
    protected $primaryKey = 'id';

    protected $fillable = [
        'text', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function media()
    {
        return $this->hasMany('App\MediaEntity');
    }
}
