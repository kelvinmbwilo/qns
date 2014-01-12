<?php

class Subquestion extends Eloquent {

    protected $table = 'subquestion';
    protected $guarded = array('id');
    
    public function question(){
        return $this->belongsTo('Question','id','question_id');
    }

}
