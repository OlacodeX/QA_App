<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['title', 'body'];
    public function user() {
        //A question belongs to a user
        return $this->belongTo(User::class);
    }
    //The code below is a mutator function - this allows me to alter data before it's saved to
    //Acessors are the opposite
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);

    }
}
