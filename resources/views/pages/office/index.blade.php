@extends('layout.web')
@section('seo_title', __('Büro'))
@section('seo_description', '')
@section('content')
<section class="content content-grid content-grid--1:1">
  <div class="content-grid__item sm:pt-12x">
    <nav class="page">
      <ul>
        <li>
          <a href="{{ route('page.office.team') }}" title="{{ __('Team') }}">{{ __('Team') }}</a>
        </li>
        {{-- <li>
          <a href="{{ route('page.office.team') }}" title="{{ __('Lebenslauf') }}">{{ __('Lebenslauf') }}</a>
        </li> --}}
        <li>
          <a href="{{ route('page.office.jobs') }}" title="{{ __('Offene Stellen') }}">{{ __('Offene Stellen') }}</a>
        </li>
      </ul>
    </nav>

    @if ($section == 'team' && $team)
      @if ($teamImage)
        <x-image 
          :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
          width="1600"
          height="900"
          :classes="'sm:hide mb-4x'"
          :image="$teamImage->image" 
        />
      @endif
      <nav class="content content--team">
        <ul>
          @foreach($team as $t)
            <li class="{{ $t->postum ? 'is-postum' : '' }}">
              @if ($t->postum)
                <h2 class="mb-3x">{{ __('Postum') }}</h2>
              @endif
              @if ($t->cv)
                <a href="" title="{{ __('CV') }} {{ $t->firstname }} {{ $t->name }}">
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
    @endif
  </div>

  <div class="content-grid__item is-fixed">
    @if ($teamImage)
      <x-image 
        :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
        width="1600"
        height="900"
        :classes="'xs:hide'"
        :image="$teamImage->image" 
      />
    @endif
  </div>
</section>
@endsection