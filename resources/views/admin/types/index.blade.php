@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Tipi</h1>
        <a class="btn btn-outline-light" href="{{url('admin/types/create')}}">➕</a>
      </div>
    </div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>type</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($types as $type)
            <tr>
              <td>{{ $type->id }}</td>
              <td><a href="{{route('admin.types.show', $type)}}">{{ $type->name }}</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
        
    </div>
  </section>
@endsection
