@extends('layouts.auth')
@section('content')

<script type="text/javascript">

$(document).ready(function() {
    $('#redactor').redactor();
});

</script>

    <h1>{{$title}}</h1>

    <div class="row">

        {{ Form::open() }}

        <div class="form-group">
            {{ Form::label('title', 'Titre')}}
            {{Form::text('title', Input::old('title'), array('class'=>'form-control'))}}

            @if($errors->has('title'))
            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('content', 'Corps')}}
            {{Form::textarea('content', Input::old('content'), array('class'=>'form-control', 'id' => 'redactor'))}}

            @if($errors->has('content'))
            <div class="alert alert-danger">{{ $errors->first('content') }}</div>
            @endif
        </div>

        <p>
            {{ Form::submit('Publier', array('class'=>'btn btn-default'))}}
        </p>

        {{ Form::close() }}
    </div>
@stop