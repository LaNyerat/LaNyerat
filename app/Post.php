<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public $incrementing = false;
    public $timestamps = ['published_at'];
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'view',
        'status',
        'published_at',
        'user_id'
    ];

    /**
     * Child boot function
     * 
     * Generate uuid for post id
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    /**
     * Get post scope publish
     * 
     * Something missing, i will repair soon, hahaha
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<', Carbon::now());
    }

    /**
     * Relationship to tag model
     *
     * @return \App\Tag
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Relationship to user model
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    /**
     * Make published date readable by humans
     *
     * @return string
     */
    public function getPublishedAttribute()
    {
        $published_date = Carbon::parse($this->published_at)->diffForHumans();
        return $published_date;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
