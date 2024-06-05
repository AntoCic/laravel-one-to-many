@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Progetti</h1>
      </div>
    </div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>name</th>
            <th>url</th>
            <th>stato</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $project)
            <tr>
              <td>{{ $project->id }}</td>
              <td>{{ $project->name }}</td>
              <td>{{ $project->url }}</td>
              <td>{{ $project->state }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
        
      </div>
    </div>
  </section>
@endsection
