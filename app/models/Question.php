<?php

class Question extends Eloquent {

    protected $table = 'questions';
    protected $guarded = array('id');

   public function subquestion(){
        return $this->hasMany('Subquestion','question_id','id');
    }

    public function category(){
        return $this->belongsTo('Category','id','category');
    }
    
}

