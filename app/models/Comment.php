<?php

class Comment extends Eloquent 
{
    protected $primaryKey = 'comment_id';
    protected $guarded    = array('comment_id');

    public function link()
    {
        return $this->belongsTo('Link');
    }
    
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public static function getValidatorRules()
    {
        return array('comment_text' => 'required|max:65000',
                     'link_id'      => 'required|exists:links,link_id',
                     'user_id'      => 'required|exists:users,user_id');
    }
}