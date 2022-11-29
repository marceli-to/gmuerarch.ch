@include('layout.partials.head')
<body>
@include('layout.partials.header')
<main role="main" class="site">
  @yield('content')
</main>
@include('layout.partials.footer')