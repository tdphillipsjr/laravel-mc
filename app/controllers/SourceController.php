<?php

class SourceController extends BaseController
{
    protected $layout = 'content-wrapper';

    public function index($slug)
    {
        $sources = Source::validFeeds()->get();
        $source  = Source::where('slug', '=', $slug)->firstOrFail();
        
	    $this->layout->content = View::make('source.index', array('source'   => $source,
	                                                              'sources'  => $sources));
    }
}