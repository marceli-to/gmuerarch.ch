<header class="site-header {{ request()->routeIs('page.project*') ? 'xs:hide' : '' }}">
  <a href="javascript:;" class="btn-menu js-menu-btn">
    <x-icon type="burger" />
    <x-icon type="cross" />
  </a>
  <div>
    <a href="{{ route('page.home') }}" class="logo" title="{{ __('Home') }}">
      @include('icons.logo')
    </a>
    @include('menu.global')
  </div>
</header>

@if (request()->routeIs('page.project.index'))
  @include('pages.project.partials.header-list')
@endif

@if (request()->routeIs('page.project.show'))
  @include('pages.project.partials.header-show')
@endif