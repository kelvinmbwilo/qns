<?php

class Answer extends Eloquent {

    protected $table = 'answer';
    protected $guarded = array('id'); 
    public function question(){
        return $this->belongsTo('Question','id','question_id');
    }

    

}