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

    //An acessor
    //This returns a url for each question
    public function getUrlAttribute() {
        return route("questions.show", $this->id);
        //Above line of code returns the show url for the question with the specified id.
    }
    //The acessor below takes the date and format it like 1 day ago etc using the diffForHumans() function.
    public function getCreatedDateAttribute() {
        return $this->created_at->diffForHumans();
    }
    public function getStatusAttribute(){
        if($this->answers > 0){
            if ($this->best_answer_id){
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

}
