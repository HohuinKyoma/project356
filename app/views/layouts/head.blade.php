<!doctype html>
<html lang="FR">
<head>
<meta charset="UTF-8">
<title>{{Option::first()->title}} @if(isset($title)) | {{$title}}@endif</title>
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<meta name="Description" content="En développement">
<meta name="Keywords" content="ARG, 356ème jour, français, jouer, enigme, enquête, social, la clinique, les gardiens du présent">
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('styles/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('styles/style.css')}}" />
@if(Auth::check())
@if(Auth::user()->isAdmin())
<link rel="stylesheet" href="{{asset('styles/redactor.css')}}" />
@endif
@endif
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
@if(Auth::check())
<script type="text/javascript" src="{{asset('js/clipboard.js')}}"></script>
@if(Auth::user()->isAdmin())
<script type="text/javascript" src="{{asset('js/redactor.min.js')}}"></script>
@endif
@endif
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body @if(Request::is('login') && ! Option::first()->maintenance) class="login" @endif>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>