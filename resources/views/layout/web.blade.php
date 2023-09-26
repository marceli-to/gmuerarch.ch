@include('layout.partials.head')
<body>
@include('layout.partials.header')
<main role="main" class="site {{ request()->routeIs('*page.home') || request()->routeIs('*page.project.show') ? 'site--grids' : '' }}">
  @yield('content')
</main>
@include('layout.partials.footer')