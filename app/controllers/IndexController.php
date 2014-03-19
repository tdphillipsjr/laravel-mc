<?php

/**
 * Index controller manages the front page and the link forwarder.
 */
class IndexController extends BaseController 
{
    protected $layout = 'content-wrapper';
    
    /**
     * Front page of the website grabs all links for the last 4 days.
     */
	public function index()
	{
	    $this->layout->content = View::make('index.index');
	}
}