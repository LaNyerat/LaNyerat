<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * Relationship to post model
     *
     * @return Relationship
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
