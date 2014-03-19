<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Patterns
Route::pattern('id', '[0-9]+');
Route::pattern('url','(.*)');

// Where users are taken after login and logout
Route::get('/', array('as' => 'login_home', 'uses' => 'IndexController@index'));
Route::get('/', array('as' => 'logout_home', 'uses' => 'IndexController@index'));

// Handle link forwarding here.
Route::get('link_forwarder/{objectType}/{id}/{url}', array('as' => 'show_link', function($objectType, $id, $url)
{
    // The link type is what object to fetch.
    if ($objectType == 'source') {
        $object = Source::find($id);
    } else if ($objectType == 'link') {
        $object = Link::find($id);
    }
    
    if ($object->url == $url) {
        $object->refer_count = $object->refer_count + 1;
        $object->save();
        
        return Redirect::to($url);
    }
    
    return App::abort(404);
}));

/**
 * Link generators.  These should really only be called by cron jobs, but calling from
 * the browser doesn't really matter.
 */
Route::get('link/get_links',        array('uses' => 'LinkController@makeLinks'));
Route::get('link/get_links/{id}',   array('uses' => 'LinkController@makeLinksForOneSource'));

// REST controllers

// User management
Route::controller('user', 'UserController');
Route::get('user/register', array('as' => 'register_form'));
Route::get('user/logout',   array('as' => 'logout_url'));

// Comment management
Route::resource('comment', 'CommentController');
