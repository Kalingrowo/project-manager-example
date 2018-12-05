@extends(Auth::user()->role_id == 1 ? 'layouts.dashboard' : 'layouts.app')

@section('content')
  @if(Auth::user()->role_id == 1)
    <div class="row">
      <div class="col-sm-9 col-md-9 col-lg-9 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add a project</h4>
            <p class="card-description">
              Add a new project to system
            </p>
            <br />
            <form class="forms-sample" method="post" action="{{ route('projects.store') }}">
              {{ csrf_field() }}
              <!-- company ID -->
              @if($companies == null)
              <input
                type="hidden"
                id="company-id"
                name="company_id"
                value="{{ $company_id }}"
              />
              @endif
              <!-- company list (dropdown) -->
              @if($companies != null)
              <div class="form-group">
                <label for="company-content">Select Company</label>
                <select name="company_id" class="form-control">
                  @foreach($companies as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
                  @endforeach
                </select>
              </div>
              @endif
              <div class="form-group">
                <label for="project-name">Project name</label>
                <input type="text" name="name" class="form-control" id="project-name" placeholder="Enter name" required>
              </div>
              <div class="form-group">
                <label for="project-desc">Description</label>
                <textarea class="form-control" name="description" id="project-desc" rows="3" placeholder="description" required></textarea>
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
      <h1>Create a new project</h1>
      <!-- Example row of columns -->
      <div class="col-sm-12 col-md-12 col-lg-12" style="background: white; margin: 10px;">
        <form method="post" action="{{ route('projects.store') }}">
          {{ csrf_field() }}
          <!-- company ID -->
          @if($companies == null)
          <input
            type="hidden"
            id="company-id"
            name="company_id"
            value="{{ $company_id }}"
          />
          @endif
          <!-- company list (dropdown) -->
          @if($companies != null)
          <div class="form-group">
            <label for="company-content">Select Company</label>
            <select name="company_id" class="form-control">
              @foreach($companies as $company)
              <option value="{{ $company->id }}">{{ $company->name }}</option>
              @endforeach
            </select>
          </div>
          @endif
          <!-- project name form input -->
          <div class="form-group">
            <label for="project-name">Name<span class="required">*</span></label>
            <input placeholder="Enter name"
              id="project-name"
              required
              name="name"
              spellcheck="false"
              class="form-control"
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
        <li><a href="/projects/">All projects</a></li>
      </ol>
    </div>

  </div>
  @endif
@endsection
