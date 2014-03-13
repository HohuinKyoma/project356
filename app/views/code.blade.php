@extends('layouts.main')
@section('content')

    {{ Form::open(array('url' => URL::to('register'), 'method' => 'get', 'class' => 'code-form')) }}

    <div class="form-group">
    {{ Form::label('c', 'Code')}}
    {{ Form::text('c', Input::old('code'), array('class'=>'form-control'))}}
    </div>

    <p>
        {{ Form::submit('S\'enregistrer', array('class'=>'btn btn-default'))}}
        <a href="{{URL::to('login')}}"></span>&nbsp&nbsp&#8592;&nbspSe connecter</a>
    </p>

    {{ Form::close() }}

@stop