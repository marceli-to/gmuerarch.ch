@extends('layout.web')
@section('seo_title', __('Projekte'))
@section('seo_description', '')
@section('content')
<section class="content content-grid content-grid--1:1">
  <div class="content-grid__item content__text project-list">
    @if ($project_categories)
      <nav class="page">
        <ul>
          @foreach($project_categories as $category)
            <li>
              <a 
                href="{{ route('page.project.index', ['category' => $category->slug]) }}" 
                title="{{ $category->title }}"
                class="{{ $category->id == $project_active_category->id ? 'is-active' : '' }}">
                {!! str_replace(' ', '&nbsp;', $category->title) !!}
              </a>
            </li>
          @endforeach
        </ul>
      </nav>
      @if ($projects)
        <nav class="content">
          <ul>
            @foreach($projects as $project)
              @php 
                $categories = $project->categories->pluck('id');
              @endphp

              <li data-categories="{{ $categories->join(',') }}" 
                  class="{{ !in_array($project_active_category->id, $categories->toArray()) ? 'is-hidden' : 'is-visible' }}">

                <a href="{{ route('page.project.show', ['category' => $project_active_category->slug, 'slug' => AppHelper::slug($project->title), 'project' => $project]) }}" 
                  title="{{ $project->title }}" 
                  data-project="{{ $project->id }}">
                  {{ $project->title }}
                </a>

              </li>
            @endforeach
          </ul>
        </nav>
      @endif
    @endif

  </div>
  <div class="content-grid__item is-fixed">
    <x-project-preview-images :projects="$projects_by_category" />
  </div>
</section>
@endsection