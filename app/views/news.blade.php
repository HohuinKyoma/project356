@extends('layouts.auth')
@section('content')
<h1>{{$title}}</h1>
<div class="row">
@foreach($posts as $post)
<h2><a href="{{URL::to('news/'.$post->slug)}}">{{$post->title}}</a></h2>
<p>{{Helper::excerpt($post->content, 90)}}</p>
<a href="{{URL::to('news/'.$post->slug)}}">[ Lire la suite ]</a>
@endforeach
</div>
{{$posts->links()}}
@stop