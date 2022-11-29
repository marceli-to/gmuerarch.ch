<header class="site-header sm:hide">
  <a href="javascript:history.back()" class="btn-menu btn-menu--projects is-active">
    <x-icon type="burger" />
    <x-icon type="cross" />
    <span>{{ __('Projekte') }}</span>
  </a>
  <div>
    <a href="{{ route('page.home') }}" class="logo logo--projects" title="{{ __('Home') }}">
      @include('icons.logo')
    </a>
    @include('menu.global')
  </div>
</header>