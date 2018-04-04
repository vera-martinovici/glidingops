<!DOCTYPE HTML>
<html>
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content="initial-scale=1.0">

  <head>
    {{-- styles --}}
    @stack('styles')

    {{-- scripts --}}
    @stack('scripts')
  </head>

  <body>
@if (App::environment('development'))
    <div style='width: 100%;background-color: red;color: white;font-weight: bolder;font-size: 20px;text-align: center;'>
      DEVELOPMENT MODE
    </div>
@endif

  @yield('content')

  </body>
</html>