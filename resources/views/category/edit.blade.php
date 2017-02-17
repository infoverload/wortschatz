@extends('layouts.app2')

@section('content')
	<h1>Edit the Category</h1>

	<form method="POST" action="/category/{{ $category->id }}">
	    {{ method_field('PATCH') }}
        {{ csrf_field() }}
    	<div class="form-group">
    		<textarea name="title" class="form-control">{{ $category->title }}</textarea>
    	</div>
        <hr>
        <h3>Card Colour (optional):</h3>
        <div class="form-group">
            <label class="radio-inline">
              <input type="radio" name="colour" value="#FFFFFF">Default
            </label>
            <label class="radio-inline">
              <input type="radio" name="colour" value="#54C571">Green
            </label>
            <label class="radio-inline">
              <input type="radio" name="colour" value="#A0CFEC">Blue
            </label>
            <label class="radio-inline">
              <input type="radio" name="colour" value="#E77471">Pink
            </label>
            <label class="radio-inline">
              <input type="radio" name="colour" value="#FDD017">Yellow
            </label>
        </div>
        <hr>
    	<div class="form-group pull-right">
    		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span></button>
            <b><a href="{{ url('/dashboard') }}">BACK</a></b>
    	</div>
    </form>

@stop
