<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'release_date', 'rating', 'price', 'country_id', 'photo', 'slug',];
    
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function genres()
    {
      return $this->belongsToMany(Genre::class,'film_genres');
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function country()
    {
      return $this->belongsTo(Country::class);
    }
}
