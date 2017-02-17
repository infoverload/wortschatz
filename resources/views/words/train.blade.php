@extends('layouts.app2')

@section('content')
<div class="container-fluid">
    <div class="row">
    	<h1>Train Your Vocabulary Articles</h1>
        <hr>

        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <div id="quiz">
                    <!-- QUESTIONS GET GENERATED HERE -->               
                </div>    
            
                <a href="#"><button class="btn btn-primary" id="next"><span class="glyphicon glyphicon-forward"></span></button></a>
            </div>
            <a href="#"><button class="btn btn-primary" id="start">START OVER</button></a>
        </div>

    </div>

    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
            <a href="{{ url('/dashboard') }}"><button class="btn btn-primary pull-right" id="back">Back to Dashboard</button></a>
    	</div>
    </div>
</div>

<script>    
    var words = {!! json_encode($words->toArray()) !!};   
</script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
<script src="/js/quiz.js"></script>
@stop