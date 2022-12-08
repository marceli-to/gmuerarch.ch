@extends('layout.web')
@section('content')
<section class="content">
  @foreach($grid['grids'] as $imageGrid)
    <div class="content-grid content-grid--{{ $imageGrid->layout }}">

      @if ($imageGrid->layout == '1:2')
        @include('components.project.grid-item', ['gridItem' => $imageGrid->gridItems[0], 'stack' => FALSE])
        <div class="content-grid__item content-grid__item--stack">
          @include('components.project.grid-item', ['gridItem' => $imageGrid->gridItems[1], 'stack' => TRUE])
          @include('components.project.grid-item', ['gridItem' => $imageGrid->gridItems[2], 'stack' => TRUE])
        </div>
      @elseif ($imageGrid->layout == '2:1')
        <div class="content-grid__item content-grid__item--stack">
          @include('components.project.grid-item', ['gridItem' => $imageGrid->gridItems[0], 'stack' => TRUE])
          @include('components.project.grid-item', ['gridItem' => $imageGrid->gridItems[1], 'stack' => TRUE])
        </div>
        @include('components.project.grid-item', ['gridItem' => $imageGrid->gridItems[2], 'stack' => FALSE])
      @else
        @foreach($imageGrid->gridItems as $gridItem)
          @include('components.project.grid-item', ['gridItem' => $gridItem, 'stack' => FALSE])
        @endforeach
      @endif
    </div>
  @endforeach
</section>
@endsection