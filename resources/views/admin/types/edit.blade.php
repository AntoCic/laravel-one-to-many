@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <h1>Nuovo Tipo</h1>
    </div>
    <div class="container">
      <form action="{{ route('admin.types.update',$type) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="ex.CSS" value="{{ old('name',$type->name) }}">
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