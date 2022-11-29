<nav class="site js-menu">
  <div>
    <ul>
      <li>
        <a href="" title="{{ __('Projekte') }}">
          {{ __('Projekte') }}
        </a>
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





