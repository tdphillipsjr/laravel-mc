@extends('content-wrapper')

@section('content')
  <!-- content, 3-column layout -->      
  <div id="contentContainer">

    <!-- Left content, links, source, comments -->
    <div id="commentWrap">

      <!-- The link -->
      <table class="commentLinkRow">
        <tr class="linkRow">
          <td class="linkTime">
            <a target="_blank" 
               href="{{ URL::route('show_link', array('id'          => $link->link_id, 
                                                      'url'         => $link->url,
                                                      'objectType'  => 'link')) }}"
            >{{{ $link->title }}}</a><br>
            {{ date('m.d.Y g:i a', strtotime($link->created_at)) }}
          </td>
          <td class="linkText">
            {{{ $link->title }}}
          </td>
          <td class="commentLink">
            ({{ $link->comment_count }})
          </td>
        </tr>
      </table>
      <!-- /link -->
      
      @foreach ($link->comments as $comment)
        <div class="commentBlock">
          <div class="commentTitle">
            <div class="commentUser">{{{ $comment->user->username }}}</div>
            <div class="commentDate">{{{ date('m.d.Y h:i:s a', strtotime($comment->created_at)) }}}</div>
          </div>
          <div class="comment">{{{ $comment->comment_text }}}</div>
        </div>
      @endforeach

      <div class="commentPostForm" method="post" action="post_comment.php ?>">
        @if (Session::has('comment_login_failed'))
            <div class="errorMessage">{{ Session::get('comment_login_failed') }}</div>
        @endif
        {{ Form::model($newComment, array('action'=> 'CommentController@store',
                                          'method'=> 'POST',
                                          'name'  => 'comment')) }}
            {{ Form::hidden('link_id', $link->link_id) }}
            @if (Auth::check())
                <div class="loggedInUsername">Logged in as: <b>{{ Auth::user()->username }}</b></div>
            @else
                <div class="textTitle">Username:</div> {{ Form::text('commentUsername', $username) }}
                <div class="textTitle">Password:</div> {{ Form::password('commentPassword') }}
            @endif
            
            @if ($errors->any())
                @foreach ($errors->all() as $message)
                    <div class="errorMessage">{{ $message }}</div>
                @endforeach
            @endif
            <div class="textTitle">Comment:</div>
            {{ Form::textarea('comment_text', null, array('rows' => 10, 'cols' => 80)) }}
            <br><br>
            {{ Form::submit('Post comment') }}
        {{ Form::close() }}
      </div>

      @if (!(Auth::check()))
          <a href="{{ URL::route('register_form') }}">Register</a> to comment on articles.
      @endif
    </div>
    <!-- /left -->
@stop