<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //An answer can belong to only one question.
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    // New accessor to display question with html formating
    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }
// Using laravel events to dynamically update the answers_count column anytime a new answer is created in the db.
/**
 * Laravel events are automatically fired by laravel at certain checkpoints which are - (creating,created), (saving,saved), (deleting,deleted), (updating,updated), (restoring, restored)
 * Leveraging on this, we can perform eloquent actions at any of this checkpoints just like we did at the created checkpoint like below.
 */
    public static function boot(){
        parent::boot();
        
        static::created(function ($answer) {
            $answer->question->increment('answers_count');
        });
    }
}
