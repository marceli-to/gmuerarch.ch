@if ($projects)
  @foreach($projects as $project)
    @if ($project->previewImage)
      <x-image 
        :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
        width="1600"
        height="900"
        :image="$project->previewImage"
        :visible="false"
        :overlay="true"
        :project="$project->id"
      />
    @else
      @if ($project->images->count() > 0)
        <x-image 
          :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
          width="1600"
          height="900"
          :image="$project->images[0]"
          :visible="false" 
          :overlay="true"
          :project="$project->id"
         />
      @endif
    @endif
  @endforeach
@endif