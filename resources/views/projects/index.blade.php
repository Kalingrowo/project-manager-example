@extends('layouts.app')

@section('content')

<div class="col-sm-6 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
  <div class="card border-primary">
    <div class="card-header">
      Project list
      <a class="float-right btn btn-primary btn-sm" href="/projects/create">Create a new project</a>
    </div>
    <div class="card-body">
      <div class="list-group">
        @foreach($projects as $project)
          <a href="/projects/{{ $project->id}}" class="list-group-item list-group-item-action">{{ $project->name}}</a>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
