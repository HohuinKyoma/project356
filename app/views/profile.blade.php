@extends('layouts.auth')
@section('content')

<script type="text/javascript">
$( document ).ready( function() {
	clipboard.init({'url' : '{{Asset('swf')}}'});
});
</script>

<div class="profile">
	<div class="row">
		<div class="col-md-4">
			<h1 class="username">{{$user->profile->nickname}}</h1>
			<div class="avatar">{{$user->getAvatar()}}</div>
			<span class="registered_at">Inscrit le {{strftime("%d %B %Y", strtotime($user->created_at))}}</span> 
		</div>
		<div class="col-md-6 progression">
			<div class="jauge"></div>
			<h2>0<span>%</span></h2>
		</div>
	</div>
	@if(Auth::user() == $user)
	<div class="code">
		<h2>{{$user->code->value}}</h2>
		<div></div>
		@if($code === true)
		<code>{{URL::to('register?c='.$user->code->value)}}</code> 	<a class="clipboard" title="Copier dans le presse-papier" href="#"></a>
		@else
	   <div class="alert alert-danger">Votre code ne peut pas être partagé pour le moment. Il sera de nouveau disponible dans <strong>{{$code}}</strong></div>
		@endif
	</div>
		@if(count($user->visits))
		<div class="visits">
			<h2>Visites sur votre profile</h2>
			<ul>
				@foreach($user->visits as $visit)
				<li><a href="{{URL::to('profile/'.$visit->visitor->profile->nickname)}}">{{$visit->visitor->profile->nickname}}</a></li>
				@endforeach
			</ul>
		</div>
		@endif
	@endif
</div>
@stop