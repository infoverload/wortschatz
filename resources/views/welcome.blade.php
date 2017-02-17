@extends('layouts.layout')

@section('content')

    @if( Session::has('success') )
    <div class="jumbotron">
        {{ Session::get('success') }}
    </div>
    @endif

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


        <div class="content">
            <div class="title m-b-md">
                Wortschatz Logger
            </div>

            <div class="links">
                <a href="{{ url('/about') }}">About</a>
                <a href="{{ url('/contact') }}">Contact</a>
            </div>
        </div>

    </div>


@stop


