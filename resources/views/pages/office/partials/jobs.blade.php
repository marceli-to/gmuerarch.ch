@if ($jobImage->publishedImage)
  <x-image 
    :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
    width="1600"
    height="900"
    :classes="'sm:hide'"
    :image="$jobImage->publishedImage" 
  />
@endif
<article class="content content--team">
  @if ($jobs->count() > 0)
    @foreach($jobs as $job)
      @if ($job->file)
        <a href="/storage/uploads/{{ $job->file->name }}" title="{{ __('Download Jobinserat ' . $job->title) }}" target="_blank">
          <h2 class="mb-0">{{ $job->title }}</h2>
        </a>
        {!! $job->text !!}  
      @else
        <h2 class="mb-2">{{ $job->title }}</h2>
        {!! $job->text !!}
      @endif
    @endforeach
  @else
    <p>{{ __('Zur Zeit keine.')}}
  @endif
</article>