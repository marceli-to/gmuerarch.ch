@extends('layout.web')
@section('seo_title', __('Werkliste'))
@section('seo_description', '')
@section('content')
<section class="content content-grid content-grid--1:1">
  <div class="content-grid__item content__text project-list project-list--works">
  @if ($projects)
    <nav class="projects">
      <ul>
        @foreach($projects as $project)
          <li class="is-visible">
            <a href="{{ route('page.project.show', ['category' => $project->categories->first()->slug, 'slug' => AppHelper::slug($project->title), 'project' => $project]) }}" 
              title="{{ $project->title }}" 
              data-project="{{ $project->id }}">
              {!! nl2br($project->text_worklist) !!}
            </a>
          </li>
        @endforeach
      </ul>
    </nav>
  @endif
  </div>
  <div class="content-grid__item project-previews xs-hide">
    <x-project-preview-images :projects="$projects" />
  </div>
</section>
@endsection