@extends('layouts.auth')
@section('content')

    <h1>{{$title}}</h1>

    @if (Session::has('success'))
    <div class="alert alert-success">Les paramètres ont bien été enregistrés</div>
    @endif
    <div class="row">

        {{ Form::open(array('class' => 'col-md-6')) }}

        <div class="form-group">
            {{ Form::label('title', 'Titre du site')}}
            {{Form::text('title', $options->title, array('class'=>'form-control'))}}

            @if($errors->has('title'))
            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('maintenance', 'Mode maintenance')}}
            <div>
                @if( $options->maintenance )
                Oui {{Form::radio('maintenance', 1, true)}}&nbsp&nbsp
                Non {{Form::radio('maintenance', 0)}}
                @else
                Oui {{Form::radio('maintenance', 1)}}&nbsp&nbsp
                Non {{Form::radio('maintenance', 0, true)}}
                @endif
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('ips', 'Adresses IP exclues de la maintenance')}}
            {{Form::textarea('ips', $options->ips, array('class'=>'form-control', 'style' => 'width:500px; height:100px'))}}
        </div>

        <p>
            {{ Form::submit('Enregistrer', array('class'=>'btn btn-default'))}}
        </p>

        {{ Form::close() }}
    </div>
@stop