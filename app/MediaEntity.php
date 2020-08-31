<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MediaEntity extends Model
{
    use Notifiable;

    protected $fillable = [
        'type', 'size', 'post_id', 'file_name'
    ];

    protected $table = 'media_entities';
    protected $primaryKey = 'id';

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
