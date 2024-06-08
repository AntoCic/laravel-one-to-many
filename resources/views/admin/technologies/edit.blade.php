@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <h1 class="pt-3">Modifica Tecnologia</h1>
        </div>
        <div class="col-auto">
          <form style="display:contents;" action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-outline-danger">🗑️</button>
          </form>
        </div>
      </div>
    </div>
    <div class="container">
      <form action="{{ route('admin.technologies.update',$technology) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="ex.CSS" value="{{ old('name',$technology->name) }}">
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