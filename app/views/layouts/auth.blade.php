@include('layouts.head')
  <div class="header">
    <div class="container">
    <div class="fb-like" data-href="https://www.facebook.com/le356emejour" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
    <ul class="nav nav-tabs col-lg-10">
      <li @if(Active::is('/')) class="active" @endif ><a class="logged" href="{{URL::to('/')}}"><div class="avatar">{{Auth::user()->getAvatar('min')}}</div><span>{{Auth::user()->profile->nickname}}</span></a></li>
      <li @if(Active::is('parameters*')) class="active" @endif ><a href="{{URL::to('parameters')}}">Paramètres</a></li>
      <li @if(Active::is('news*')) class="active" @endif ><a href="{{URL::to('news')}}">News</a></li>

      @if(Auth::user()->isAdmin())
    <li @if(Active::is('administration*')) class="active dropdown" @else class="dropdown" @endif>
      <a href="#" class="active dropdown-toggle" id="adminNav" data-toggle="dropdown">Administration</a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="adminNav">
        <li><a role="menuitem" tabindex="-1" href="{{URL::to('administration/options')}}">Options du site</a></li>
        <li><a role="menuitem" tabindex="0" href="{{URL::to('administration/post/add')}}">Ajouter un article</a></li>
      </ul>
    </li>
      @endif
      <li><a href="{{URL::to('logout')}}">Se déconnecter</a></li>
    </ul>

    <div class="search pull-right col-lg-2">
     {{ Form::open() }}
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Rechercher..." id="query" name="query" value="">
        </div>
    {{ Form::close() }}
    </div>

  </div>
</div>
<div class="container page">
  <div class="auth-content">
  @yield('content')
  </div>
</div>
@include('layouts.footer')