@extends('layout.web')
@section('content')
<section class="content">
  @foreach($grid['imageGrids'] as $imageGrid)
    <div class="content-grid content-grid--{{ $imageGrid->layout }}">
      @foreach($imageGrid->imageGridItems as $gridItem)
        <figure class="content-grid__item">
          <a href="{{ route('page.project.show', 
              [
                'category' => $gridItem->project->categories->first()->slug, 
                'slug' => AppHelper::slug($gridItem->project->title), 
                'project' => $gridItem->image->imageable_id
              ]
            )}}">
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