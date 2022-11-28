@include('layout.partials.head')
<body>
@include('partials.header')
<main role="main" class="site">
  @yield('content')
</main>
<script src="{{ mix('assets/js/app.js') }}" type="text/javascript"></script>
</body>
<!-- made with ❤ by Hans Grüninger & marceli.to -->
</html>