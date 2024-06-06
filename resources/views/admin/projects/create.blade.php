@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <h1>Nuovo Progetto</h1>
    </div>
    <div class="container">
      <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="ex.Projettone" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
          <label for="url" class="form-label">Link</label>
          <input type="text" class="form-control" name="url" id="url" placeholder="ex.http://ciao.com" value="{{ old('url') }}">
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Descrizione</label>
          <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrizione del progetto" >{{old('description')}}</textarea>
        </div>

        <div class="mb-3">
          <label for="state" class="form-label">Stato</label>
          <input type="text" class="form-control" name="state" id="state" placeholder="ex.Done, In progress, Delated" value="{{ old('state') }}">
        </div>
        
        <div class="mb-3">
          <label for="priority" class="form-label">Priorità</label>
          <input type="range" class="form-range" min="1" max="5" step="1" id="priority" name="priority" value="{{ old('priority',1) }}">
        </div>

        

        <div class="mb-3">
          <label for="date" class="form-label">Data</label>
          <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}">
        </div>

        <div class="mb-3">
          <label for="type_id" class="form-label">Tipo</label>
          <select class="form-control" name="type_id" id="type_id">
            <option value="">-- Seleziona Tipo --</option>
            @foreach($types as $type) 
              <option @selected( $type->id == old('category_id') ) value="{{ $type->id }}"> {{ $type->name }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Crea</button>
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