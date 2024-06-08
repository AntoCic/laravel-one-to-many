@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($projects as $project)
        <div class="col-4 my-3">
            <div class="card h-100">
                <div class="card-header"> 
                    <h3>{{$project->name}}</h3>
                </div>

                <div class="card-body">
                    <p>{{ $project->description }}</p>
                    <p><a href="{{ $project->url }}">{{ $project->url }}</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection