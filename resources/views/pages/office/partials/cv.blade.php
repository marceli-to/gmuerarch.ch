@if ($teamMember->publishedImage)
  <x-image 
    :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
    width="1600"
    height="900"
    :classes="'sm:hide'"
    :image="$teamMember->publishedImage" 
  />
@endif
<article class="content content--team">
  <h2 class="mb-3x sm:mb-5x">
    <span class="underline-static">{{ $teamMember->firstname }} {{ $teamMember->name }}@if($teamMember->description), {{ $teamMember->description }}@endif</span>
    @if ($teamMember->title)<br>{{ $teamMember->title }}@endif
  </h2>
  {!! $teamMember->cv !!}  
</article>