<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];
    
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function genres()
    {
      return $this->hasMany(Genre::class);
    }
}
