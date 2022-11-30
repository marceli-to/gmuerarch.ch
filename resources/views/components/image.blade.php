@if ($maxSizes && $image)
  <picture 
    class="{{ $overlay ? 'is-overlay' : '' }} {{ !$visible ? 'is-hidden' : '' }} {{ $classes }}"
    data-project="{{ $project ? $project->id : '' }}">
    @foreach($maxSizes as $minWidth => $maxSize)
      @if ($minWidth > 0)
        <source media="(min-width: {{ $minWidth }}px)" data-srcset="/img/cache/{{ $image->name }}/{{ $maxSize}}/{{ $image->coords }}">
      @else
        <img 
          data-src="/img/cache/{{ $image->name }}/{{ $maxSize }}/{{ $image->coords }}"
          width="{{ $width }}" 
          height="{{ $height }}"
          title="{{ $image->caption }}"
          alt="{{ $image->caption }}"
          class="is-responsive lazy">
      @endif
    @endforeach
  </picture>
@endif

