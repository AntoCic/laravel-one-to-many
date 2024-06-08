@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"> 
                    <h3>Tipi</h3>
                    <a class="btn btn-outline-secondary" href="{{url('admin/types/create')}}">➕</a>
                </div>

                <div class="card-body">
                    |
                    @foreach ($types as $type)
                        <a href="{{route('admin.types.edit', $type)}}">{{ $type->name }}</a> |
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"> 
                    <h3>Tecnologie</h3>
                    <a class="btn btn-outline-secondary" href="{{url('admin/technologies/create')}}">➕</a>
                </div>
                <div class="card-body">
                    |
                    @foreach ($technologies as $technology)
                        <a href="{{route('admin.technologies.edit', $technology)}}">{{ $technology->name }}</a> |
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
