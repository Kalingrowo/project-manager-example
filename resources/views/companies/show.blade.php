@extends('layouts.app');

@section('content')
  <div class="col-sm-9 col-md-9 col-lg-9 float-left">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1 class="display-3">{{ $company->name }}</h1>
      <p>{{ $company->description }}</p>
      <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
    </div>

    <!-- Example row of columns -->
    <div class="row" style="background: white; margin: 10px;">
      @foreach($company->projects as $project)
      <div class="col-md-4 col-sm-4">
        <h2>{{ $project->name }}</h2>
        <p>{{ $project->description }}</p>
        <p><a class="btn btn-secondary" href="/project/{{ $project->id }}" role="button">View project »</a></p>
      </div>
      @endforeach
    </div>
  </div>

  <div class="col-sm-3 col-md-3 col-lg-3 float-right">
    <!--
    <div class="p-3 mb-3 bg-light rounded">
      <h4 class="font-italic">About</h4>
      <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    -->

    <div class="p-3">
      <h4 class="font-italic">Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/projects/create">Add a project</a></li>
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
