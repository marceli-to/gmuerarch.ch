@extends('layout.web')
@section('content')
<section class="content">
  @foreach($grid['imageGrids'] as $imageGrid)
  <div class="image-grid image-grid__{{ $imageGrid->layout }}">
    @foreach($imageGrid->imageGridItems as $gridItem)
    <figure>
      <img 
        data-src="/img/cache/{{ $gridItem->image->name }}/1200/{{ $gridItem->image->coords }}" 
        width="1600" 
        height="900"
        title="{{ $gridItem->image->title }}"
        alt="{{ $gridItem->image->title }}"
        class="is-responsive lazy">
    </figure>
    @endforeach
  </div>
  @endforeach
</section>
@endsection