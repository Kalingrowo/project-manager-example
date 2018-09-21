@extends('layouts.app')

@section('content')

<div class="col-sm-6 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
  <div class="card border-primary">
    <div class="card-header">
      Company list
      <a class="float-right btn btn-primary btn-sm" href="/companies/create">Create a new company</a>
    </div>
    <div class="card-body">
      <div class="list-group">
        @foreach($companies as $company)
          <a href="/companies/{{ $company->id}}" class="list-group-item list-group-item-action">{{ $company->name}}</a>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
