@if ($teamImage)
  <x-image 
    :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
    width="1600"
    height="900"
    :classes="'sm:hide'"
    :image="$teamImage->image" 
  />
@endif
<article class="content content--team">
  <nav class="content">
    <ul>
      @foreach($team as $t)
        <li class="{{ $t->postum ? 'is-postum' : '' }}">
          @if ($t->postum)
            <h2 class="mb-3x">{{ __('Postum') }}</h2>
          @endif
          @if ($t->cv)
            <a href="{{ route('page.office.cv', ['slug' => AppHelper::slug($t->firstname .'-'. $t->name), 'teamMember' => $t->id]) }}" title="{{ __('CV') }} {{ $t->firstname }} {{ $t->name }}">
              {{ $t->firstname }} {{ $t->name }}@if($t->description), {{ $t->description }}@endif
            </a>
            @if ($t->title)<br>{{ $t->title }}@endif
          @else
            <div>
              {{ $t->firstname }} {{ $t->name }}@if($t->description), {{ $t->description }}@endif
              @if ($t->title)<br>{{ $t->title }}@endif
            </div>
          @endif
        </li>
      @endforeach
    </ul>
  </nav>
</article>