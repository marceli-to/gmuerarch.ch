<nav class="site js-menu">
  <div>
    <ul>
      <li>
        <a href="{{ route('page.project.index') }}" title="{{ __('Projekte') }}" class="{{ request()->routeIs('page.project*') ? 'is-active' : '' }}">
          {{ __('Projekte') }}
        </a>
        @if ($project_categories)
          <ul class="sm:hide">
            @foreach($project_categories as $category)
              <li>
                <a href="{{ route('page.project.index', ['category' => $category->slug]) }}" title="{{ $category->title }}">
                  {{ $category->title }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
      <li>
        <a href="{{ route('page.worklist.index') }}" title="{{ __('Werkliste') }}" class="{{ request()->routeIs('page.worklist.index') ? 'is-active' : '' }}">
          {{ __('Werkliste') }}
        </a>
      </li>
      <li>
        <a href="{{ route('page.office.index') }}" title="{{ __('Büro') }}" class="{{ request()->routeIs('page.office.index') ? 'is-active' : '' }}">
          {{ __('Büro') }}
        </a>
      </li>
      <li>
        <a href="{{ route('page.discourse.index') }}" title="{{ __('Diskurs') }}" class="{{ request()->routeIs('page.discourse.index') ? 'is-active' : '' }}">
          {{ __('Diskurs') }}
        </a>
      </li>
      <li>
        <a href="{{ route('page.contact.index') }}" title="{{ __('Kontakt') }}" class="{{ request()->routeIs('page.contact.index') ? 'is-active' : '' }}">
          {{ __('Kontakt') }}
        </a>
      </li>
    </ul>
  </div>
</nav>





