@extends('layouts.app');

@section('content')
  <div class="col-sm-9 col-md-9 col-lg-9 float-left">
    <!-- Example row of columns -->
    <div class="col-sm-12 col-md-12 col-lg-12" style="background: white; margin: 10px;">
      <form method="post" action="{{ route('companies.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="company-name">Name<span class="required">*</span></label>
          <input placeholder="Enter name"
            id="Company-name"
            required
            name="name"
            spellcheck="false"
            class="form-control"
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
        <li><a href="/companies/">All companies</a></li>
      </ol>
    </div>

  </div>

@endsection
