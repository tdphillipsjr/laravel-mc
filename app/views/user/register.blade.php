@extends('content-wrapper')

@section('source_list')
    @foreach ($sources as $source)
        <li> &raquo; <a target="_blank" 
                        href="{{ URL::route('show_link', array('id'         => $source->source_id, 
                                                               'url'        => $source->url,
                                                               'objectType' => 'source')) }}"
                     >{{{ $source->name }}}</a>
    @endforeach
@stop

@section('content')
  <!-- content, 3-column layout -->      
  <div id="contentContainer">

    <!-- Left content, links, source, comments -->
    <div id="commentWrap">

      <!-- The link -->
        {{ Form::model($newUser, array('url' => 'user/register', 'method' => 'POST')) }}
        <table class="commentLinkRow">
          <tr colspan="2">
            <td class="titleRow">Register</td>
          </tr>
          @if ($errors->has('username'))
            <tr colspan="2"><td class="errorCell">{{ $errors->first('username') }}</td></tr> 
          @endif
          <tr>
            <td class="regTitle">User Name (this name will accompany all your posts)</td>
            <td>{{ Form::text('username') }}</td>
          </tr>
          @if ($errors->has('email_address')) 
            <tr colspan="2"><td class="errorCell">{{ $errors->first('email_address') }}</td></tr> 
          @endif
          <tr>
            <td class="regTitle">Valid E-mail Address (We will send a confirmation e-mail to this address; never displayed on-site)</td>
            <td>{{ Form::text('email_address') }}</td>
          </tr>
          @if ($errors->has('email_address_confirmation')) 
            <tr colspan="2"><td class="errorCell">{{ $errors->first('email_address_confirmation') }}</td></tr> 
          @endif
          <tr>
            <td class="regTitle">Confirm Valid E-mail Address</td>
            <td>{{ Form::text('email_address_confirmation') }}</td>
          </tr>
          @if ($errors->has('password')) 
            <tr colspan="2"><td class="errorCell">{{ $errors->first('password') }}</td></tr> 
          @endif
          <tr>
            <td class="regTitle">Password</td>
            <td>{{ Form::password('password') }}</td>
          </tr>
          @if ($errors->has('password_confirmation')) 
            <tr colspan="2"><td class="errorCell">{{ $errors->first('password_confirmation') }}</td></tr> 
          @endif
          <tr>
            <td class="regTitle">Confirm Password</td>
            <td>{{ Form::password('password_confirmation') }}</td>
          </tr>
          @if ($errors->has('birthday'))
            <tr colspan="2"><td class="errorCell">{{ $errors->first('birthday') }}</td></tr> 
          @endif
          <tr>
            <td class="regTitle">Date of Birth</td>
            <td>
                {{ Form::selectMonth('month') }}
                {{ Form::selectRange('day', 1, 31) }}
                {{ Form::selectRange('year', date('Y', strtotime("-13 years")), date('Y', strtotime("-100 years"))) }}
            </td>
          </tr>
          @if ($errors->has('gender'))
            <tr colspan="2"><td class="errorCell">{{ $errors->first('gender') }}</td></tr> 
          @endif
          <tr>
            <td class="regTitle">Gender</td>
            <td>
                {{ Form::radio('gender', 'male') }} Male
                {{ Form::radio('gender', 'female') }} Female
            </td>
          </tr>
          <tr colspan="2">
            <td>{{ Form::submit('Register') }}</td>
          </tr>
        </table>
        {{ Form::close() }}
    </div>
    <!-- /left -->
@stop