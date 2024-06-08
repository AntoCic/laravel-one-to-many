@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <h1>Nuovo Progetto</h1>
    </div>
    <div class="container">
      <form action="{{ route('admin.projects.update',$project) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="ex.Projettone" value="{{ old('name',$project->name) }}">
        </div>

        <div class="mb-3">
          <label for="url" class="form-label">Link</label>
          <input type="text" class="form-control" name="url" id="url" placeholder="ex.http://ciao.com" value="{{ old('url',$project->url) }}">
        </div>

        <div class="d-flex gap-2">
          @foreach ($technologies as $technology)

            <div class="form-check">
              <input @checked( in_array($technology->id, old('technologies',$project->technologies->pluck('id')->all())) ) name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="technology-{{$technology->id}}">
              <label class="form-check-label" for="technology-{{$technology->id}}">
                {{ $technology->name }}
              </label>
            </div>
              
          @endforeach
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Descrizione</label>
          <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrizione del progetto" >{{old('description',$project->description)}}</textarea>
        </div>

        <div class="mb-3">
          <label for="state" class="form-label">Stato</label>
          <input type="text" class="form-control" name="state" id="state" placeholder="ex.Done, In progress, Delated" value="{{ old('state',$project->state) }}">
        </div>
        
        <div class="mb-3">
          <label for="priority" class="form-label">Priorità</label>
          <input type="range" class="form-range" min="1" max="5" step="1" id="priority" name="priority" value="{{ old('priority',$project->priority) }}">
        </div>

        

        <div class="mb-3">
          <label for="date" class="form-label">Data</label>
          <input type="date" class="form-control" name="date" id="date" value="{{ old('date',$project->date) }}">
        </div>

        <div class="mb-3">
          <label for="type_id" class="form-label">Tipo</label>
          <select class="form-control" name="type_id" id="type_id">
            <option value="">-- Seleziona Tipo --</option>
            @foreach($types as $type) 
              <option @selected( $type->id == old('category_id',$project->type_id) ) value="{{ $type->id }}"> {{ $type->name }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Modifica</button>
      </form>

      @if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
  </section>
@endsection