@extends('layout.web')
@section('content')
<section class="content">
  @foreach($grid['grids'] as $grid)
    <div class="content-grid content-grid--{{ $grid->layout }}">

      @if ($grid->layout == '1:2')

        @include('components.grid-item', ['gridItem' => $grid->gridItems[0], 'stack' => FALSE])
        <div class="content-grid__item content-grid__item--stack">
          @include('components.grid-item', ['gridItem' => $grid->gridItems[1], 'stack' => TRUE])
          @include('components.grid-item', ['gridItem' => $grid->gridItems[2], 'stack' => TRUE])
        </div>

      @elseif ($grid->layout == '2:1')
      
        <div class="content-grid__item content-grid__item--stack">
          @include('components.grid-item', ['gridItem' => $grid->gridItems[0], 'stack' => TRUE])
          @include('components.grid-item', ['gridItem' => $grid->gridItems[1], 'stack' => TRUE])
        </div>
        @include('components.grid-item', ['gridItem' => $grid->gridItems[2], 'stack' => FALSE])
      
      @else

        @foreach($grid->gridItems as $gridItem)
          @include('components.grid-item', ['gridItem' => $gridItem, 'stack' => FALSE])
        @endforeach
      
      @endif
    </div>
  @endforeach
</section>
@endsection