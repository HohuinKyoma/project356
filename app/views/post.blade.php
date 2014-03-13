@extends('layouts.auth')
@section('content')
<h1>{{$title}}</h1>
<div class="row">
<p>{{$post->content}}</p>
</div>
@stop