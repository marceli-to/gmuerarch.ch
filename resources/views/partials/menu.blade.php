<nav class="site js-menu">
  <div>
    <ul>
      <li>
        <a href="" title="{{ __('Projekte') }}">
          {{ __('Projekte') }}
        </a>
      </li>
      <li>
        <a href="" title="{{ __('Werkliste') }}">
          {{ __('Werkliste') }}
        </a>
      </li>
      <li>
        <a href="" title="{{ __('Büro') }}">
          {{ __('Büro') }}
        </a>
      </li>
      <li>
        <a href="" title="{{ __('Diskurs') }}">
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





