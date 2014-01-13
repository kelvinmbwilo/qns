<?php

class Category extends Eloquent {

    protected $table = 'category';
    protected $guarded = array('id'); 
    public function question(){
        return $this->hasMany('Question','category','id');
    }

    

}