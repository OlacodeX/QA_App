<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    //
    protected $fillable = ['title', 'body'];
    public function user() {
        //A question belongs to a user
        return $this->belongsTo(User::class);
    }
    //The code below is a mutator function - this allows me to alter data before it's saved to
    //Acessors are the opposite
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }
}
