<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

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

    public function Courses()
    {
        $this->belongsTo(Course::class);
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['description'] = str_limit(preg_replace('/<[^>]*>/', '', $value), 200);
        $this->attributes['body'] = $value;
    }

}
