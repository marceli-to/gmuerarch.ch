@extends('layout.web')
@section('seo_title', __('Büro'))
@section('seo_description', '')
@section('content')
<section class="content content-grid content-grid--1:1">
  <div class="content-grid__item sm:pt-12x pb-3x">
    <nav class="page">
      <ul>
        <li>
          <a href="{{ route(locale() . '.page.office.team') }}" class="{{ $section == 'team' ? 'is-active' : '' }}" title="{{ __('Team') }}">{{ __('Team') }}</a>
        </li>
        @if ($section == 'cv')
          <li>
            <span class="underline">{{ __('Lebenslauf') }}</span>
          </li>
        @endif
        <li>
          <a href="{{ route(locale() . '.page.office.jobs') }}" class="{{ $section == 'jobs' ? 'is-active' : '' }}" title="{{ __('Offene Stellen') }}">{{ __('Offene Stellen') }}</a>
        </li>
      </ul>
    </nav>

    @if ($section == 'team' && $team)
      @include('pages.office.partials.team')
    @endif
    @if ($section == 'cv' && $teamMember)
      @include('pages.office.partials.cv')
    @endif
    @if ($section == 'jobs' && $jobs)
      @include('pages.office.partials.jobs')
    @endif
  </div>

  <div class="content-grid__item is-fixed">
    @if (isset($teamImage) && $teamImage && $teamImage->image)
      <x-image 
        :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
        width="1600"
        height="900"
        :classes="'xs:hide'"
        :image="$teamImage->image" 
      />
    @endif

    @if (isset($teamMember) && $teamMember->publishedImage)
      <x-image 
        :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
        width="1600"
        height="900"
        :classes="'xs:hide'"
        :image="$teamMember->publishedImage" 
      />
    @endif

    @if (isset($jobImage) && $jobImage->publishedImage)
      <x-image 
        :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
        width="1600"
        height="900"
        :classes="'xs:hide'"
        :image="$jobImage->publishedImage" 
      />
    @endif

  </div>
</section>
@endsection