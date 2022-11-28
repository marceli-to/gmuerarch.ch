@extends('layout.web')
@section('content')
<section class="content">
  @foreach($grid['imageGrids'] as $imageGrid)
  <div class="image-grid image-grid__{{ $imageGrid->layout }}">
    @foreach($imageGrid->imageGridItems as $gridItem)
    <figure>
      <a href="{{ route('page.project.show', ['slug' => 'projekt-test-slug', 'project' => $gridItem->image->imageable_id]) }}">
        <x-image 
          :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
          width="1600"
          height="900"
          :image="$gridItem->image" 
        />
      </a>
    </figure>
    @endforeach
  </div>
  @endforeach
</section>
@endsection