@if ($projects)
  @foreach($projects as $project)
    @if ($project->previewImage)
      <x-image 
        :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
        width="1600"
        height="900"
        :image="$project->previewImage"
        :visible="$loop->first ? true : false"
        :overlay="true"
        :project="$project"
      />
    @else
      @if ($project->images)
        <x-image 
          :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
          width="1600"
          height="900"
          :image="$project->images[0]"
          :visible="$loop->first ? true : false" 
          :overlay="true"
          :project="$project"
         />
      @endif
    @endif
  @endforeach
@endif