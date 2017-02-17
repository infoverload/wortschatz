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
		<h1>Contact</h1>

		<h3>Your feedback or questions are welcomed. Please use the form below. </h3>
		<hr>

		<div class="row">
			<div class="col-md-12">
				<form method="POST" action="{{ url('/contact') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label name="email">Email:</label>
						<input id="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label name="subject">Subject:</label>
						<input id="subject" name="subject" class="form-control">
					</div>
					<div class="form-group">
						<label name="message">Message:</label>
						<textarea id="message" name="message" class="form-control"></textarea>
					</div>
					<input type="submit" value="Send" class="btn btn-success pull-right">
				</form>
			</div>
		</div>
		<hr>
	    @if(count($errors))
	        <ul>
	            @foreach ($errors->all() as $error)
	            <div class="col-xs-4 alert alert-danger">
	                <li>{{ $error }}</li>
	            </div>
	            @endforeach
	        </ul>
	    @endif
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