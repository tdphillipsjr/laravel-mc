<?php

class SourceType extends Eloquent 
{
    protected $primaryKey = 'source_type_id';
    public $timestamps = false;
    
    public function sources()
    {
        return $this->hasMany('Source');
    }

}