@extends('layouts.app');

@section('content')
  <div class="col-sm-9 col-md-9 col-lg-9 float-left">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="card card-header">
      <h1 class="display-3">Project : <br /> {{ $project->name }}</h1>
      <p>{{ $project->description }}</p>
      <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
    </div>

    <!-- Example row of columns -->
    <div class="row" style="background: white; margin: 10px;">
      <!--
      <div class="col-sm-12 col-md-12 col-lg-12">
        <a class="btn btn-outline-secondary btn-md float-right" href="/projects/create">Add projects</a>
      </div>
      -->

      <br />
        <!-- Comments section -->
        <div class="col-sm-12 col-md-12 col-lg-12 float-left">
          <!-- Example row of columns -->
          <div class="col-sm-12 col-md-12 col-lg-12" style="background: white; margin: 10px;">
            <form method="post" action="{{ route('comments.store') }}">
              {{ csrf_field() }}
              <!-- Pass hidden value -->
              <input type="hidden" name="commentable_type" value="Project">
              <input type="hidden" name="commentable_id" value="{{ $project->id }}">
              <!-- Input comment -->
              <div class="form-group">
                <label for="comment-content">Comment</label>
                <textarea placeholder="Enter comment"
                  id="comment-content"
                  name="body"
                  rows="4"
                  spellcheck="false"
                  class="form-control text-left">
                </textarea>
              </div>
              <!-- Input url/screenshots -->
              <div class="form-group">
                <label for="comment-content">Proof of work done (Url/Photos)</label>
                <textarea placeholder="Enter url or screenshots"
                  style="resize: vertical"
                  id="comment-content"
                  name="url"
                  rows="3"
                  spellcheck="false"
                  class="form-control text-left">
                </textarea>
              </div>
              <!-- Submit comment -->
              <div class="form-group">
                <input type="submit"
                  class="btn btn-primary"
                  value="submit" />
              </div>
            </form>
          </div>
        </div>


      {{--
      @foreach($project->projects as $project)
      <div class="col-md-4 col-sm-4 col-lg-4 float-left">
        <h2>{{ $project->name }}</h2>
        <p>{{ $project->description }}</p>
        <p><a class="btn btn-secondary" href="/project/{{ $project->id }}" role="button">View project »</a></p>
      </div>
      @endforeach
      --}}

    </div>
  </div>

  <div class="col-sm-3 col-md-3 col-lg-3 float-right">
    <div class="p-3">
      <h4 class="font-italic">Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/projects">All projects</a></li>
        <li><a href="#">Add new member</a></li>
        <br />
        <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>

        @if($project->user_id == Auth::user()->id)
        <li>
          <a
            href="/projects/{{ $project->id }}"
            onclick="var result=confirm('Are yo sure you wish to delete this Project ({{ $project->name }}) ?');
              event.preventDefault();
              if(result){
                document.getElementById('delete-form').submit();
              }"
          >
            Delete
          </a>

          <form id="delete-form" action="{{ route ('projects.destroy', [$project->id]) }}"
            method="post" style="display: none">
            <input type="hidden" name="_method" value="delete">
            {{ csrf_field() }}
          </form>

        </li>
        @endif

      </ol>
    </div>

  </div>

@endsection
