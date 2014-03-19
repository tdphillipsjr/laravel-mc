<html>
  <head>
    <title>Mommy Coach</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <!-- Google analytics -->
    <!-- /google analytics -->
  </head>
  
  <body>
    <!-- whole site wrapper -->
    <div id="wrap">

      <!-- top cell -->
      <div class="topBar">
        <div class="topBarLeft">Mommy Coach</div>
	    <div class="topBarRight">
	      @if (Auth::check())
            <div class="loggedInMessage">Welcome, {{{ Auth::user()->username }}}</div>
            <div class="loggedInMessage"><a href="{{ URL::route('logout_url') }}">(Logout)</a></div>
	      @else
	        @if (Session::has('login_message'))
  	          <div class="loginError">{{ Session::get('login_message') }}</div>
  	        @endif
            <div id="userLoginForm" class="loginForm">
              {{ Form::open(array('url'     => 'user/login', 
                                  'method'  => 'POST', 
                                  'name'    => 'registration')) }}
                {{ Form::token() }}
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username') }}
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
                {{ Form::submit('Login') }} &nbsp;&nbsp;&nbsp; 
                <a href="{{ URL::route('register_form') }}">(Register)</a>
              {{ Form::close() }}
            </div>
	      @endif
	    </div>
      </div>
      <!-- /top cell -->
      <!-- /end header -->
        
      @yield('content')

      <!-- start footer -->
        <!-- Right non-content container, links, ads, etc -->
        <div class="nonContentContainer">
          <div class="sidebar-left">
          </div>
        
          <!-- right ad-column on the left side -->
          <div class="sidebar-left">
          </div>
          <!-- /left -->
        
          <!-- Right ad-column on the right side -->
          <div class="sidebar-left">
          </div>
          <!-- /right -->
        </div>
        <!-- /non-content -->
      </div>
      <!-- /content-->
      <div class="footer">
      </div>
      <!-- /footer -->
    </div>
    <!-- /whole site -->
  </body>
</html>