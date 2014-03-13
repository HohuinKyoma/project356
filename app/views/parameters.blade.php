@extends('layouts.auth')
@section('content')

    <h1>{{$title}}</h1>

    @if (Session::has('success'))
    <div class="alert alert-success">Les paramètres ont bien été enregistrés</div>
    @endif
    <div class="row">

        {{ Form::open(array('class' => 'col-md-6', 'files' => true)) }}

        <div class="form-group">

        {{ Form::label('password', 'Nouveau mot de passe')}}
        {{ Form::password('password', array('class'=>'form-control')) }}
        @if($errors->has('password'))
        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
        @endif
        </div>

        <div class="form-group">

        {{ Form::label('password_confirmation', 'Confirmer le nouveau mot de passe')}}
        {{ Form::password('password_confirmation', array('class'=>'form-control')) }}

        </div>


        <div class="form-group">

        {{ Form::label('avatar', 'Avatar')}}
        {{ Form::file('avatar') }}
        
        @if($errors->has('avatar'))
        <div class="alert alert-danger">{{ $errors->first('avatar') }}</div>
        @endif
        </div>

        <p>
            {{ Form::submit('Enregistrer', array('class'=>'btn btn-default'))}}
        </p>

        {{ Form::close() }}
    </div>

@stop