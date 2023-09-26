<header class="site-header">
  <a href="javascript:;" class="btn-menu js-menu-btn">
    <x-icon type="burger" />
    <x-icon type="cross" />
  </a>
    @if (request()->routeIs('page.project*'))
      <a href="{{ route(locale() . '.page.project.index') }}" title="{{ __('Projekte') }}" class="btn-page sm:hide">
        {{ __('Projekte') }}
      </a>
    @endif
    @if (request()->routeIs('page.worklist.index'))
      <a href="{{ route(locale() . '.page.worklist.index') }}" title="{{ __('Projekte') }}" class="btn-page sm:hide">
        {{ __('Werkliste') }}
      </a>
    @endif
    @if (request()->routeIs('page.office*'))
      <a href="{{ route(locale() . '.page.office.team') }}" title="{{ __('Büro') }}" class="btn-page sm:hide">
        {{ __('Büro') }}
      </a>
    @endif
    @if (request()->routeIs('page.discourse*'))
      <a href="{{ route(locale() . '.page.discourse.index') }}" title="{{ __('Diskurs') }}" class="btn-page sm:hide">
        {{ __('Diskurs') }}
      </a>
    @endif
  <div>
    <a href="{{ route(locale() . '.page.home') }}" class="logo {{ request()->routeIs('page.project*') ? 'logo--projects' : '' }}" title="{{ __('Home') }}">
      @include('icons.logo')
    </a>
    @include('menu.global')
  </div>
</header>

@if (request()->routeIs('*page.project.show'))
  @include('pages.project.partials.header-show')
@endif