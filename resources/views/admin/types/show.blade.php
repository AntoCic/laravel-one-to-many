@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <h1 class="pt-3">
            <span class="badge text-bg-primary">
              {{ $type->id }}
            </span> {{ $type->name }}</h1>
        </div>
        <div class="col-auto">
          
          <a class="btn btn-outline-light" href="{{route('admin.types.edit', $type)}}">📝</a>
          <form style="display:contents;" action="{{ route('admin.types.destroy', $type) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-outline-light">🗑️</button>
          </form>
          
        </div>
      </div>      
    </div>
    
  </section>
@endsection
