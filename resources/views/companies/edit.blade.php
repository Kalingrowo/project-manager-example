@extends(Auth::user()->role_id == 1 ? 'layouts.dashboard' : 'layouts.app')

@section('content')

  @if(Auth::user()->role_id == 1)
    <div class="row">
      <div class="col-sm-9 col-md-9 col-lg-9 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit a company</h4>
            <p class="card-description">
              Edit a company details
            </p>
            <br />
            <form class="forms-sample" method="post" action="{{ route('companies.update', [$company->id]) }}">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="put">
              <div class="form-group">
                <label for="company-name">Company Name</label>
                <input type="text"
                  name="name"
                  class="form-control"
                  id="company-name"
                  placeholder="Enter name"
                  value="{{ $company->name }}"
                  required>
              </div>
              <div class="form-group">
                <label for="company-desc">Description</label>
                <textarea class="form-control"
                  name="description"
                  id="company-desc"
                  rows="3"
                  placeholder="description"
                  required>
                  {{ $company->description }}
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
      <h1> Edit a company</h1>
      <!-- Example row of columns -->
      <div class="col-sm-12 col-md-12 col-lg-12" style="background: white; margin: 10px;">
        <form method="post" action="{{ route('companies.update', [$company->id]) }}">
          {{ csrf_field() }}

          <input type="hidden" name="_method" value="put">

          <div class="form-group">
            <label for="company-name">Name<span class="required">*</span></label>
            <input placeholder="Enter name"
              id="Company-name"
              required
              name="name"
              spellcheck="false"
              class="form-control"
              value="{{ $company->name }}"
            />
          </div>

          <div class="form-group">
            <label for="company-content">Description</label>
            <textarea placeholder="Enter description"
              id="company-content"
              name="description"
              rows="5"
              spellcheck="false"
              class="form-control text-left">
              {{ $company->description }}
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
          <li><a href="/companies/{{ $company->id }}">View company</a></li>
          <li><a href="/companies/">All companies</a></li>
        </ol>
      </div>

    </div>
  @endif

@endsection
