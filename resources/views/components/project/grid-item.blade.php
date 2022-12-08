@if ($gridItem->project && $gridItem->image)
  <figure class="{{ !$stack ? 'content-grid__item' : '' }}">
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
@else
  <figure class="xs:hide">
    <img src="/assets/img/transparent.png" width="1600" height="900">
  </figure>
@endif