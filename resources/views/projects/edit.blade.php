@extends(Auth::user()->role_id == 1 ? 'layouts.dashboard' : 'layouts.app')

@section('content')

  @if(Auth::user()->role_id == 1)
    <div class="row">
      <div class="col-sm-9 col-md-9 col-lg-9 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit a project</h4>
            <p class="card-description">
              Edit a project details
            </p>
            <br />
            <form class="forms-sample" method="post" action="{{ route('projects.update', [$project->id]) }}">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="put">
              <div class="form-group">
                <label for="project-name">Project Name</label>
                <input type="text"
                  name="name"
                  class="form-control"
                  id="project-name"
                  placeholder="Enter name"
                  value="{{ $project->name }}"
                  required>
              </div>
              <div class="form-group">
                <label for="project-desc">Description</label>
                <textarea class="form-control"
                  name="description"
                  id="project-desc"
                  rows="3"
                  placeholder="description"
                  required>
                  {{ $project->description }}
                </textarea>
              </div>
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @else
    <div class="col-sm-9 col-md-9 col-lg-9 float-left">
      <h1>Edit a project</h1>
      <!-- Example row of columns -->
      <div class="col-sm-12 col-md-12 col-lg-12" style="background: white; margin: 10px;">
        <form method="post" action="{{ route('projects.update', [$project->id]) }}">
          {{ csrf_field() }}

          <input type="hidden" name="_method" value="put">

          <div class="form-group">
            <label for="project-name">Name<span class="required">*</span></label>
            <input placeholder="Enter name"
              id="project-name"
              required
              name="name"
              spellcheck="false"
              class="form-control"
              value="{{ $project->name }}"
            />
          </div>

          <div class="form-group">
            <label for="project-content">Description</label>
            <textarea placeholder="Enter description"
              id="project-content"
              name="description"
              rows="5"
              spellcheck="false"
              class="form-control text-left">
              {{ $project->description }}
            </textarea>
          </div>

          <div class="form-group">
            <input type="submit"
              class="btn btn-primary"
              value="submit" />
          </div>

        </form>
      </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 float-right">

      <div class="p-3">
        <h4 class="font-italic">Actions</h4>
        <ol class="list-unstyled">
          <li><a href="/projects/{{ $project->id }}">View project</a></li>
          <li><a href="/projects/">All projects</a></li>
        </ol>
      </div>

    </div>
  @endif
@endsection
