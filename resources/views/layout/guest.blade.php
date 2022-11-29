@include('layout.partials.head')
<body class="auth">
<main role="main" class="site site--auth">
  <div>
    <section class="mx-auto">
      @include('icons.logo')
      @yield('content')
    </section>
  </div>
</main>
@include('layout.partials.footer')