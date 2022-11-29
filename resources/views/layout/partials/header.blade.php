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
@endif

@if (request()->routeIs('page.project.show'))
  <header class="site-header site-header--project">
    <a href="javascript:history.back()" class="btn-menu btn-menu--projects">
      <x-icon type="burger" />
      <span>{{ __('Projekte') }}</span>
    </a>
    <div>
      <a href="{{ route('page.home') }}" class="logo logo--project" title="{{ __('Home') }}">
        @include('icons.logo')
      </a>
      <h1 class="sm:hide">{{ $project->title }}</h1>
      <nav class="project">
        <h1 class="xs:hide">{{ $project->title }}</h1>
        <div class="project__meta">
          <a href="" title="{{ $category->title }}">
            {{ $category->title }}
          </a>
          <div class="project__browse">
            <a href="">
              <x-icon type="arrow-prev" />
            </a>
            <a href="">
              <x-icon type="arrow-next" />
            </a>
          </div>
          <a href="" title="{{ __('Info') }}">
            {{ __('Info') }}
          </a>
        </div>
      </nav>
    </div>
  </header>
@endif



