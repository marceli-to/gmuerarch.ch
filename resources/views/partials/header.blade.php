<header class="site-header">
  <a href="javascript:;" class="btn-menu js-menu-btn">
    <x-icon type="burger" style="burger" />
    <x-icon type="cross" style="cross" />
  </a>
  <div>
    <a href="{{ route('page.home') }}" class="logo" title="{{ __('Home') }}">
      @include('partials.logo')
    </a>
    @include('partials.menu')
  </div>

</header>