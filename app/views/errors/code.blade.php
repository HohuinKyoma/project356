@extends('layouts.main')
@section('content')
<h1 class="error">{{$title}}</h1>
<div class="alert">Le code entré n'est pas valide ou est déjà utilisé. Vérifiez que vous avez bien tapé le code exact et rééssayez.</div> 
<a href="{{URL::to('code')}}"></span>&nbsp&nbsp&#8592;&nbspRééssayer</a>
@stop