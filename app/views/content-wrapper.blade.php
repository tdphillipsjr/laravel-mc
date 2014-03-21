<html>
  <head>
    <title>MMA Feed Indexer</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <!-- Google analytics -->
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-176025-6']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
    <!-- /google analytics -->
  </head>
  
  <body>
    <!-- whole site wrapper -->
    <div id="wrap">

      <!-- top cell -->
      <div class="topBar">
        <div class="topBarLeft">MMA News Express</div>
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
	        <div class="rightContentTitle">
	           Ads by Google
	        </div>
	        <div class="linkList">
              <script type="text/javascript">
                google_ad_client = "ca-pub-7647894115887780";
                /* MMA1 */
                google_ad_slot = "3632658157";
                google_ad_width = 250;
                google_ad_height = 250;
              </script>
              <script type="text/javascript"
                      src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
              </script>
            </div>
          </div>
        
          <!-- right ad-column on the left side -->
          <div class="sidebar-left">
            <div class="rightContentTitle">Feeds Indexed</div>
            <div class="linkList">
              @yield('source_list')
            </div>
          </div>
          <!-- /left -->
        
          <!-- Right ad-column on the right side -->
          <div class="sidebar-left">
  	        <div class="rightContentTitle">Ads by Google</div>
  	        <div class="linkList">
                <script type="text/javascript">
                    google_ad_client = "ca-pub-7647894115887780";
                    /* MMA3 (link tower) */
                    google_ad_slot = "9622614373";
                    google_ad_width = 200;
                    google_ad_height = 90;
                </script>
                <script type="text/javascript"
                        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                </script>
            </div>
          </div>
          <!-- /right -->
        </div>
        <!-- /non-content -->
      </div>
      <!-- /content-->
      <div class="footer">
        Copyright 2014 - Feed Indexer Express
      </div>
      <!-- /footer -->
    </div>
    <!-- /whole site -->
  </body>
</html>