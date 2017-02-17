@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if( Session::has('loggedin_status') )
                        {{ Session::get('loggedin_status') }} {{ $user->name }}
                    @endif

                    <h4>Review and organize the vocabulary you have saved!</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($category as $cat)
        <div class="col-sm-6">
            <div class="panel panel-default" style="background-color: {{$cat->colour}}">
                <h3>{{ $cat->title }}
                <a href="/category/{{$cat->id}}/delete" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <a href="/category/{{$cat->id}}/edit" class="pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
                </h3>

                <table class="table table-condensed">
                    <thead>
                      <tr>
                        <th>Gender*</th>
                        <th>Vocab*</th>
                        <th>Translation*</th>
                        <th>Note</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach( $cat->words as $w )
                      <tr>
                        <td>{{$w->gender}}</td>
                        <td id="vocab">{{$w->body}}
                            <a target="_blank" href="http://www.dict.cc/?s={{$w->body}}">&nbsp<span class="glyphicon glyphicon-search"></span></a>&nbsp
                            <a target="popup" onclick="window.open('https://code.responsivevoice.org/develop/getvoice.php?t={{$w->body}}&tl=de&sv=&vn=&pitch=0.5&rate=0.5&vol=1','popup','width=300,height=50'); return false;" ><span class="glyphicon glyphicon-volume-up"></span></a>
                        </td>
                        <td>{{$w->translation}}</td>
                        <td>{{$w->note}}</td>
                        <td><a href="/words/{{$w->id}}/delete" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                        <a href="/words/{{$w->id}}/edit" class="pull-right"><span class="glyphicon glyphicon-pencil"></span></a></td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- <ul class="list-group">
                    @foreach( $cat->words as $w )
                    <li class="list-group-item">
                        <item>{{$w->gender}}</item>
                        <item>{{$w->body}}</item>
                        <item>{{$w->translation}}</item>
                        <item>{{$w->note}}</item>
                        <a href="/words/{{$w->id}}/delete" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                        <a href="/words/{{$w->id}}/edit" class="pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
                    </li>
                    @endforeach
                </ul> -->
                <table class="table table-condensed"><tr><td>     
                    <form method="POST" action="/category/{{$cat->id}}/words">
                        {{ csrf_field() }}
                        <div class="form-group">

                            <div class="col-xs-3">
                                <select name="gender" class="form-control">
                                    <option selected disabled>Gender</option>
                                    <option>None</option>
                                    <option>Der</option>
                                    <option>Die</option>
                                    <option>Das</option>
                                </select>
                            </div>

                            <!-- <div class="col-xs-2"><input type="text" name="gender" class="form-control" value="Gender"></div> -->
                            <div class="col-xs-2"><input type="text" name="body" class="form-control" placeholder="Vocab"></div>
                            <div class="col-xs-3"><input type="text" name="translation" class="form-control" placeholder="Translation"></div>
                            <div class="col-xs-2"><input type="text" name="note" class="form-control" placeholder="Note"></div>
                            <div class="col-xs-2"><button type="submit" class="btn btn-sm btn-primary pull-right"><span class="glyphicon glyphicon-ok"></span></button></div>
                        </div>
                    </form> 
                </td></tr></table>

            </div>
        </div>
        @endforeach

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

    <div class="row" id="newcategory">
        <div class="col-md-4 col-md-offset-4">

            <form method="POST" action="/category">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-xs-11"><input type="text" name="title" class="form-control" placeholder="Add a new category"></div>
                    <div class="col-xs-1"><button type="submit" class="btn btn-sm btn-primary pull-right"><span class="glyphicon glyphicon-ok"></span></button></div>
                </div>
            </form> 
                       
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-6">          
            <a href="/words/train" class="pull-right"><button class="btn btn-lg btn-danger pull-right">TRAIN: Artikeln</button></a>
        </div>
    </div>

    <div class="row" id="footer">
        <div class="col-xs-6"><p><a href="{{ url('/') }}">Wortschatz Logger 2017</a></p></div>
        <div class="col-xs-6">
            <p><a href="{{ url('/about') }}">About</a> | <a href="{{ url('/contact') }}">Contact</a></p>
        </div>
    </div>

</div>
@endsection
