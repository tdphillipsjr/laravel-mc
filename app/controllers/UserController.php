<?php

class UserController extends BaseController
{
    protected $layout = 'content-wrapper';

    /**
     * Handle logging the user in.
     */
    public function postLogin()
    {
        $login = array('username' => Input::get('username'),
                       'password' => Input::get('password'));
        
        if (Auth::attempt($login)) {
            return Redirect::route('login_home');
        } else {
            return Redirect::back()->with('login_message',
                                          'Username/Password combination not found.')
                                   ->withInput();
        }
    }
    
    /**
     * Log out the user.
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('logout_home');
    }
    
    /**
     * Display the registration form.
     */
    public function getRegister()
    {
        $user   = new User();
        $sources= Source::all();
	    $this->layout->content = View::make('user.register', array('newUser'        => $user,
	                                                               'sources'        => $sources,
	                                                               'confirmEmail'   => null));
    }
    
    /**
     * Register the user.
     */
    public function postRegister()
    {
        $sources  = Source::all();
        $birthDay = Input::get('year') . '-' . Input::get('month') . '-' . Input::get('day');
        $userData = array('username'                    => Input::get('username'),
                          'password'                    => Input::get('password'),
                          'email_address'               => Input::get('email_address'),
                          'gender'                      => Input::get('gender'),
                          'birthday'                    => $birthDay);
        $confirmData = array('password_confirmation'       => Input::get('password_confirmation'),
                             'email_address_confirmation'  => Input::get('email_address_confirmation'));

        $rules    = User::getValidatorRules();
        $validator= Validator::make(array_merge($userData,$confirmData), $rules);
        
        if ($validator->fails()) {
            return Redirect::to('user/register')->withErrors($validator)
                                                ->withInput(Input::all());
        } else {
            $userData['password'] = Hash::make($userData['password']);
            $user = User::create($userData);
            Auth::login($user->user_id);
            return Redirect::route('login_home');
        }
    }
}