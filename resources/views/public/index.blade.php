@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-8 my-3 text-white border border-opacity-75 rounded-4 bg-white bg-opacity-10">
        @foreach ($projects as $project)
          <div class="m-3">
            <h4><a href="{{ $project->url }}">{{$project->name}} <span class="material-symbols-rounded">
              arrow_right
              </span></a></h4>
            <p class="text-light mb-0">{{substr($project->description,0,strpos($project->description,".")+1)}}</p>
            <p class="text-secondary small fw-lighter text-end">@foreach ($project->technologies as $technology)#{{$technology->name}} @endforeach</p>
            <hr>
          </div>
          @endforeach
        
      </div>
      <div class="col-4">
        <div class="my-3 text-white border border-opacity-75 rounded-4 bg-white bg-opacity-10 p-3">
          <a href="#">
            <span class="material-symbols-rounded p-1">
              public
            </span>
            <span class="material-symbols-rounded p-1">
              public
            </span>
            <span class="material-symbols-rounded p-1">
              public
            </span>
            <span class="material-symbols-rounded p-1">
              public
            </span>
          </a>
        </div>
        <div class="my-3 text-white border border-opacity-75 rounded-4 bg-white bg-opacity-10 p-3">
          <h5>Competenze digitali:</h5>
          <hr>
          <h5>Competenze Linguistiche:</h5>
        </div>
      </div>
        
    </div>
</div>
@endsection