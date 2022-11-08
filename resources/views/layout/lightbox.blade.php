@include('layout.partials.head')
<body>
<main role="main" class="site">
  <div>@yield('content')</div>
</main>
<script src="{{ mix('assets/js/app.js') }}" type="text/javascript"></script>
</body>
<!-- made with ❤ by Hans Grüninger & marceli.to -->
</html>