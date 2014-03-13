@extends('layouts.main')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-success">Merci de votre inscription, vous pouvez maintenant vous connecter</div>
    @endif

    {{ Form::open(array('class' => 'login')) }}

    <div class="form-group">
    {{ Form::label('email', 'Email')}}
    {{ Form::text('email', Input::old('email'), array('class'=>'form-control'))}}
    </div>

    <div class="form-group">

    {{ Form::label('password', 'Mot de passe')}}
    {{ Form::password('password', array('class'=>'form-control')) }}

    </div>
    <p>
        {{ Form::submit('Se connecter', array('class'=>'btn btn-default'))}}
        <a href="{{URL::to('code')}}"></span>&nbsp&nbsp&#8594;&nbspS'enregistrer</a>
    </p>

    @if (Session::has('error'))
    <div class="alert alert-danger">Les identifiants sont incorrects</div>
    @endif

    {{ Form::close() }}

@stop