@extends('layouts.main')
@section('content')

    <h1>{{$title}}</h1>

    {{ Form::open() }}

    {{ Form::hidden('code', $_GET['c'], array('class'=>'form-control'))}}

    <div class="form-group">
    {{ Form::label('nickname', 'Pseudo')}}
    {{ Form::text('nickname', Input::old('nickname'), array('class'=>'form-control'))}}

    @if($errors->has('nickname'))
    <div class="alert alert-danger">{{ $errors->first('nickname') }}</div>
    @endif
    </div>

    <div class="form-group">
    {{ Form::label('email', 'Email')}}
    {{ Form::text('email', Input::old('email'), array('class'=>'form-control'))}}

    @if($errors->has('email'))
    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
    @endif
    </div>

    <div class="form-group">

    {{ Form::label('password', 'Mot de passe')}}
    {{ Form::password('password', array('class'=>'form-control')) }}
    @if($errors->has('password'))
    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
    @endif
    </div>

    <div class="form-group">

    {{ Form::label('password_confirmation', 'Confirmer le mot de passe')}}
    {{ Form::password('password_confirmation', array('class'=>'form-control')) }}

    </div>
    <p>
        {{ Form::submit('S\'enregistrer', array('class'=>'btn btn-default'))}}
    </p>

    {{ Form::close() }}

@stop