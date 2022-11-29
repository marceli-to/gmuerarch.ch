<header class="site-header {{ request()->routeIs('page.project*') ? 'xs:hide' : '' }}">
  <a href="javascript:;" class="btn-menu js-menu-btn">
    <x-icon type="burger" style="burger" />
    <x-icon type="cross" style="cross" />
  </a>
  <div>
    <a href="{{ route('page.home') }}" class="logo" title="{{ __('Home') }}">
      @include('icons.logo')
    </a>
    @include('menu.global')
  </div>
</header>

@if (request()->routeIs('page.project*'))
  <header class="site-header {{ request()->routeIs('page.project*') ? 'sm:hide' : '' }}">
    <a href="javascript:;" class="btn-menu btn-menu--projects {{ request()->routeIs('page.project.index') ? 'is-active' : '' }}">
      <x-icon type="burger" style="burger" />
      <x-icon type="cross" style="cross" />
      <span>{{ __('Projekte') }}</span>
    </a>
    <div>
      <a href="{{ route('page.home') }}" class="logo logo--project" title="{{ __('Home') }}">
        @include('icons.logo')
      </a>
    </div>
  </header>
@endif
