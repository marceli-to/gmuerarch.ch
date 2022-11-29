@extends('layout.web')
@section('seo_title', $project->title . '•' . __('Projekt'))
@section('seo_description', '')
@section('content')
<section class="content">
  @foreach($project->imageGrids as $imageGrid)
    <div class="content-grid content-grid--{{ $imageGrid->layout }}">
      @foreach($imageGrid->imageGridItems as $gridItem)
        <figure class="content-grid__item">
          <x-image 
            :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
            width="1600"
            height="900"
            :image="$gridItem->image" 
          />
        </figure>
      @endforeach
    </div>
  @endforeach
</section>
@endsection