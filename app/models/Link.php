<?php

class Link extends Eloquent 
{
    protected   $primaryKey = 'link_id';
    protected   $guarded    = array('link_id');

    public function source()
    {
        return $this->belongsTo('Source');
    }
    
    public function comments()
    {
        return $this->hasMany('Comment');
    }
}