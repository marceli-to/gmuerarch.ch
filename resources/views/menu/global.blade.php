<nav class="site js-menu">
  <div>
    <ul>
      <li>
        <a href="{{ localized_route('page.project.index') }}" title="{{ __('Projekte') }}" class="{{ request()->routeIs('page.project*') ? 'is-active' : '' }}">
          {{ __('Projekte') }}
        </a>
        @if ($project_categories)
          <ul class="sm:hide">
            @foreach($project_categories as $category)
              <li>
                <a href="{{ localized_route('page.project.index', ['category' => $category->slug]) }}" title="{{ $category->title }}">
                  {{ $category->title }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
      <li>
        <a href="{{ localized_route('page.worklist.index') }}" title="{{ __('Werkliste') }}" class="{{ request()->routeIs('page.worklist.index') ? 'is-active' : '' }}">
          {{ __('Werkliste') }}
        </a>
      </li>
      <li>
        <a href="{{ localized_route('page.office.team') }}" title="{{ __('Büro') }}" class="{{ request()->routeIs('*page.office*') ? 'is-active' : '' }}">
          {{ __('Büro') }}
        </a>
        
      </li>
      <li>
        <a href="{{ localized_route('page.discourse.index') }}" title="{{ __('Diskurs') }}" class="{{ request()->routeIs('*page.discourse.index') ? 'is-active' : '' }}">
          {{ __('Diskurs') }}
        </a>
      </li>
      <li>
        <a href="{{ localized_route('page.contact.index') }}" title="{{__('Kontakt')}}" class="{{ request()->routeIs('*page.contact.index') ? 'is-active' : '' }}">
          {{__('Kontakt')}}
        </a>
      </li>
    </ul>
    <ul class="is-language">
      <li>
        <a href="{{ current_route('en') }}">EN</a>
      </li>
      <li>
        <a href="{{ current_route('de') }}">DE</a>
      </li>
    </ul>
  </div>
</nav>





