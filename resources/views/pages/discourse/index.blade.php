@extends('layout.web')
@section('seo_title', __('Diskurs'))
@section('seo_description', '')
@section('content')
<section class="content">
  @if ($discourse_topics)
    <div class="sm:pt-12x">
      <nav class="page">
        <ul>
          @foreach($discourse_topics as $topic)
            <li>
              <a 
                href="{{ route(locale() . '.page.discourse.index', ['topic' => $topic->slug]) }}" 
                title="{{ $topic->title }}"
                class="{{ $topic->id == $active_topic->id ? 'is-active' : '' }}">
                {!! str_replace(' ', '&nbsp;', $topic->title) !!}
              </a>
            </li>
          @endforeach
        </ul>
      </nav>
    </div>
  @endif
  @if ($discourses)
    <div class="md:grid-cols-12 grid-gap pb-3x">
      @foreach($discourses as $discourse)
        <article class="content content-discourse sm:span-6">
          <h2>{{ $discourse->title }}</h2>
          <div class="discourse-item">
            @if ($discourse->publishedImage)
              @if ($discourse->publishedFile)
                <figure class="span-4">
                  <a href="{{ $discourse->link }}" target="_blank">
                    <x-image 
                      :maxSizes="[1200 => 1000, 0 => 600]" 
                      width="600"
                      height="800"
                      :image="$discourse->publishedImage" 
                    />
                  </a>
                </figure>
              @elseif ($discourse->link)
                <figure class="span-4">
                  <a href="{{ $discourse->link }}" target="_blank">
                    <x-image 
                      :maxSizes="[1200 => 1000, 0 => 600]" 
                      width="600"
                      height="800"
                      :image="$discourse->publishedImage" 
                    />
                  </a>
                </figure>
              @else
                <figure class="span-4">
                  <x-image 
                    :maxSizes="[1200 => 1000, 0 => 600]" 
                    width="600"
                    height="800"
                    :image="$discourse->publishedImage" 
                  />
                </figure>
              @endif
            @endif
            @if ($discourse->text)
              <div class="{{ $discourse->publishedImage ? 'span-8' : 'span-12' }}">
                @if ($discourse->publishedFile)
                  <a href="/storage/uploads/{{ $discourse->publishedFile->name }}" target="_blank">
                    {!! $discourse->text !!}&nbsp;<x-icon type="arrow-up" />
                  </a>
                @elseif ($discourse->link)
                  <a href="{{ $discourse->link }}" target="_blank">
                    {!! $discourse->text !!}&nbsp;<x-icon type="arrow-up" />
                  </a>
                @else
                  {!! $discourse->text !!}
                @endif
              </div>
            @endif
          </div>
        </article>
      @endforeach
    </div>
  @endif
</section>
@endsection