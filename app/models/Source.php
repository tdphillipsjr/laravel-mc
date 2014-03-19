<?php

class Source extends Eloquent 
{
    protected $primaryKey = 'source_id';
    public $timestamps = false;
    
    public function links()
    {
        return $this->hasMany('Link');
    }
    
    public function sourceType()
    {
        return $this->belongsTo('SourceType');
    }
}
