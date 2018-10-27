<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Course extends Model
{
    use Sluggable;
    protected $guarded = [];
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
        return "/Course/$this->slug";

    }
    protected $casts = [
        'images' => 'array',

    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function Episodes()
    {
        $this->hasMany(Episode::class);
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['description'] = str_limit(preg_replace('/<[^>]*>/', '', $value), 200);
        $this->attributes['body'] = $value;
    }
}
