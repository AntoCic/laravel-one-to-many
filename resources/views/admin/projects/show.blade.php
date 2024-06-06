@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <h1>
            {{ $project->id }} - {{ $project->name }} 
            <span class="badge text-bg-warning">
              {{ $project->type->name }}
            </span></h1>
        </div>
        <div class="col-auto">
          
          <a class="btn btn-outline-light" href="{{route('admin.projects.edit', $project)}}">📝</a>
          <form style="display:contents;" action="{{ route('admin.projects.destroy', $project) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-outline-light">🗑️</button>
          </form>
          
        </div>
      </div>
      <div class="d-flex justify-content-between align-items-center">
        
      </div>
      <div class="row">
        <div class="col-12">
          <p>Data: {{ $project->date }}</p>
          <p>State: {{ $project->state }}</p>
          <p>Priorità: {{ $project->priority }}</p>
          <h2>Descrizione</h2>
          <p>{{ $project->description }}</p>
          <p><a href="{{ $project->url }}">{{ $project->url }}</a></p>
        </div>
      </div>
    </div>
    
  </section>
@endsection
