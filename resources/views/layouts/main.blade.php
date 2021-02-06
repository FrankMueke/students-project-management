<!DOCTYPE html>
<html lang="en">
<head>
@include('partials._head')
    @yield('stylesheets')
    <style>
    
    #zmmtg-root{
      background-color:transparent!important;
      position:relative!important;
    }
  </style>
</head>
    <body>
            @include('partials._navbar')
            <div class="container-fluid">

                @include('partials._messages')

                @yield('content')

                @include('partials._footer')
            </div><!-- end of container -->
        @include('partials._javascript')

        @yield('scripts')
        <noscript>
    <strong>We're sorry but poc doesn't work properly without JavaScript enabled. Please enable it to
      continue.</strong>
  </noscript>

  <div id="app"></div>
  <!-- built files will be auto injected -->
  <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
    </body>
</html>