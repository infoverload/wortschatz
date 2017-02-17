@extends('layouts.app2')

@section('content')

	<h1>Edit the Vocabulary</h1>

	<form method="POST" action="/words/{{ $word->id }}">
	    {{ method_field('PATCH') }}
        {{ csrf_field() }}
    	<div class="form-group">
    		<textarea name="gender" class="form-control">{{ $word->gender }}</textarea>
            <textarea name="body" class="form-control">{{ $word->body }}</textarea>
            <textarea name="translation" class="form-control">{{ $word->translation }}</textarea>
            <textarea name="note" class="form-control">{{ $word->note }}</textarea>
    	</div>
    	<div class="form-group pull-right">
    		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span></button>
            <b><a href="{{ url('/dashboard') }}">BACK</a></b>
    	</div>

    </form>

@stop
