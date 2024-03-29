@extends('layout.web')
@section('seo_title', __('Werkliste'))
@section('seo_description', '')
@section('content')
<section class="content content-grid content-grid--1:1">
  <div class="content-grid__item sm:pt-12x project-list project-list--works">
  @if ($projects)
    <nav class="content">
      <ul>
        @foreach($projects as $project)
          <li class="is-visible">
            @if ($project->isProject)
            <a href="{{ route(locale() . '.page.project.show', ['category' => $project->categories->first() ? $project->categories->first()->slug : 'slug', 'slug' => $project->title ? AppHelper::slug($project->title) : 'title', 'project' => $project]) }}" 
              title="{{ $project->title }}" 
              data-project="{{ $project->id }}">
              {!! nl2br($project->text_worklist) !!}
            </a>
            @else
            <div class="mb-3x"
              title="{{ $project->title }}" 
              data-project="{{ $project->id }}">
              {!! nl2br($project->text_worklist) !!}
            </div>
            @endif
          </li>
        @endforeach
      </ul>
    </nav>
  @endif
  </div>
  <div class="content-grid__item is-fixed xs:hide">
    <x-project-preview-images :projects="$projects" />
  </div>
</section>
@endsection