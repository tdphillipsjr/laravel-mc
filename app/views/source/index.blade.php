@extends('content-wrapper')

@section('source_list')
    @foreach ($sources as $rightSource)
        <li> &raquo; <a target="_blank" 
                        href="{{ URL::route('show_link', array('id'         => $rightSource->source_id, 
                                                               'url'        => $rightSource->url,
                                                               'objectType' => 'source')) }}"
                     >{{{ $rightSource->name }}}</a>
    @endforeach
@stop

@section('content')
  <!-- content, 3-column layout -->      
  <div id="contentContainer">
    
    <!-- Left content, links, source, comments -->
    <div id="mainContentWrap">
        <table class="feedTable">
      	    <tr><td>
                <script type="text/javascript"><!--
                    google_ad_client = "ca-pub-7647894115887780";
                    /* MMA2 */
                    google_ad_slot = "7116076135";
                    google_ad_width = 468;
                    google_ad_height = 60;
                    //-->
                </script>
                <script type="text/javascript"
                        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                </script>
            </td></tr>
            <tr><td class="feedTitle">{{{ $source->name }}}</td></tr>
            
            @foreach ($source->links as $link)
                <tr class="linkRow">
        	        <td>
                        <div style="padding-left: 25px;">
                            &raquo; <a target="_blank" 
                                       href="{{ URL::route('show_link', array('id'          => $link->link_id, 
                                                                              'url'         => $link->url,
                                                                              'objectType'  => 'link')) }}"
                                    >{{{ $link->title }}}</a>
                        </div>
                        <div style="padding-left: 50px; font-weight: bold; font-size: .7em;">
                            <a style="color: black;" href="{{ URL::route('source_index', array('slug' => $link->source->slug)) }}">
                                {{{ $link->source->name }}}
                            </a>
                        </div>
                        @if (trim($link->provider_id))
                            <div style="padding-left: 50px; font-size: .7em;">
                                <a href="{{ URL::route('provider_index', array('slug' => $link->provider->alias_slug)) }}">
                                    <i>{{{ $link->provider->alias }}}</i>
                                </a>
                            </div>
                        @endif
                        <div style="padding-left: 50px; font-size: .7em;">
                            {{ date('m/d/Y g:i a', strtotime($link->publish_date)) }}
                        </div>
                        <div style="padding-left: 50px; font-size: .8em; padding-bottom: 5px;">
                            <a href="{{ URL::action('CommentController@show', array('id' => $link->link_id)) }}">Comments ({{ $link->comment_count }})</a>
                        </div>
		            </td>
                </tr>
            @endforeach
        </table>
    </div>
    <!-- /left -->
@stop