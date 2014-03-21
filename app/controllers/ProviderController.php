<?php

class ProviderController extends BaseController
{
    protected $layout = 'content-wrapper';
    
    public function index($slug)
    {
        $sources  = Source::validFeeds()->get();
        $provider = Provider::where('alias_slug', '=', $slug)->firstOrFail();
        
	    $this->layout->content = View::make('provider.index', array('provider' => $provider,
	                                                                'sources'  => $sources));
    }
}