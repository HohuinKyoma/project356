@extends($layout)
@section('content')
<h1 class="not-found">404</h1>
<h2 class="error">{{$title}}</h2>
<div class="alert">La page <strong>{{$page}}</strong> est introuvable</div> 
@if(Auth::check())
<a href="{{URL::to('/')}}"></span>&nbsp&nbsp&#8592;&nbspRetourner à l'accueil</a>
@else
<a href="{{URL::to('login')}}"></span>&nbsp&nbsp&#8592;&nbspSe connecter</a>
@endif
@stop