<?php

class Source extends Eloquent 
{
    protected $primaryKey = 'source_id';
    public $timestamps = false;
    
    public function links()
    {
        return $this->hasMany('Link')->orderBy('publish_date', 'desc');
    }
    
    public function sourceType()
    {
        return $this->belongsTo('SourceType');
    }
    
    public function linkGenerator()
    {
        return $this->belongsTo('LinkGenerator');
    }
    
    public function scopeValidFeeds($query)
    {
        return $query->whereIsError(0)->orderBy('name');
    }
}