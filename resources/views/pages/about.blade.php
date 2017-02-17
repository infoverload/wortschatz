@extends('layouts.layout')

@section('content')

<div class="flex-center position-ref full-height">

    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif


	<div class="content2">
		<h1>About</h1>

		<h3>This project is meant to be a tool to help people who are learning German to keep track of the vocabulary they have learned and to review the articles of nouns through a simple quiz feature.  Access all your notes in one spot anywhere you have access to the Internet. Organize it semantically in ways that help you remember and learn! <br><br> This is an ongoing project with further features in the works. <a href="{{ url('/contact') }}">Feedback</a> is welcomed. </h3>

	</div>
</div>

@stop

@section('footer')
<div class="row" id="footer">
    <div class="col-xs-6"><p><a href="{{ url('/') }}">Wortschatz Logger 2017</a></p></div>
    <div class="col-xs-6">
        <p><a href="{{ url('/about') }}">About</a> | <a href="{{ url('/contact') }}">Contact</a></p>
    </div>
</div>
@stop


