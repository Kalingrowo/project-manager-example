@extends('layouts.app');

@section('content')
  <div class="col-sm-9 col-md-9 col-lg-9 float-left">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1 class="display-3">{{ $company->name }}</h1>
      <p>{{ $company->description }}</p>
      <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
    </div>

    <!-- contents -->
    <div class="row" style="background: white; margin: 10px;">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <a class="btn btn-outline-secondary btn-md float-right" href="/projects/create/{{ $company->id }}">Add projects</a>
      </div>
      <!-- projects list -->
      @foreach($company->projects as $project)
      <div class="col-md-4 col-sm-4 col-lg-4 float-left">
        <h2>{{ $project->name }}</h2>
        <p>{{ $project->description }}</p>
        <p><a class="btn btn-secondary" href="/projects/{{ $project->id }}" role="button">View project »</a></p>
      </div>
      @endforeach
      <!-- end project list -->
      </div>
    </div>
  </div>

  <!-- Right content -->
  <div class="col-sm-3 col-md-3 col-lg-3 float-right">
    <div class="p-3">
      <h4 class="font-italic">Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/projects/create/{{ $company->id }}">Add a project</a></li>
        <br />

        <li><a href="/companies/create">Create a new company</a></li>
        <li><a href="/companies">All companies</a></li>
        <br />

        <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
        <li>
          <a
            href="/companies/{{ $company->id }}"
            onclick="var result=confirm('Are yo sure you wish to delete this Company ({{ $company->name }}) ?');
              event.preventDefault();
              if(result){
                document.getElementById('delete-form').submit();
              }"
          >
            Delete
          </a>

          <form id="delete-form" action="{{ route ('companies.destroy', [$company->id]) }}"
            method="post" style="display: none">
            <input type="hidden" name="_method" value="delete">
            {{ csrf_field() }}
          </form>

        </li>
        <li><a href="#">Add new member</a></li>
      </ol>
    </div>

  </div>

@endsection
