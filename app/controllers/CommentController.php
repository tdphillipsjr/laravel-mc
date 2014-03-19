<?php

class CommentController extends \BaseController {

    protected $layout = 'content-wrapper';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    /**
	     * If the user is not logged in, try to log in with the comment user info.
	     */
	    if (!Auth::check()) {
	        $login = array('username' => Input::get('commentUsername'),
	                       'password' => Input::get('commentPassword'));
            if (!Auth::attempt($login)) {
                return Redirect::back()->with('comment_login_failed', 
                                              'Username/Password combination not found.')
                                       ->withInput(Input::all());
            }
	    }
	    
	    $commentData= array('comment_text'  => Input::get('comment_text'),
	                        'link_id'       => Input::get('link_id'),
	                        'user_id'       => Auth::user()->user_id);
        $rules      = Comment::getValidatorRules();
        $validator  = Validator::make($commentData, $rules);
        
        if ($validator->fails()) {
            return Redirect::action('CommentController@show', array('id' => Input::get('link_id')))
                            ->withErrors($validator)
                            ->withInput(Input::all());
        } else {
            DB::transaction(function($commentData) use ($commentData)
            {
                $comment = Comment::create($commentData);
                $comment->link->comment_count++;
                $comment->link->save();
            });
            return $this->show(Input::get('link_id'));
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $link   = Link::find($id);
	    $sources= Source::all();
	    $comment= new Comment();
	    $username = Auth::check() ? Auth::user()->email_address : '';
	    
	    $this->layout->content = View::make('comment.index', array('link'       => $link,
	                                                               'sources'    => $sources,
	                                                               'newComment' => $comment,
	                                                               'username'   => $username));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}