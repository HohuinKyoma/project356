@include('layouts.head')
<div class="container page">
  <div class="fb-like" data-href="https://www.facebook.com/le356emejour" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
  <div class="content @if(Request::is('login') && ! Option::first()->maintenance) login @endif">
  @yield('content')
  </div>
</div>
@include('layouts.footer')