<?php

class Provider extends Eloquent 
{
    protected   $primaryKey = 'provider_id';
    protected   $guarded    = array('provider_id');

    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function links()
    {
        return $this->hasMany('Link');
    }
}