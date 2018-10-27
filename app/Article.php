<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;
    protected $guarded=[];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function path()
    {
        return "/article/$this->slug";
    }
    protected $casts = [
        'images' => 'array'
    ];

    public function user()
    {
    $this->belongsTo(User::Class);
    }
}
