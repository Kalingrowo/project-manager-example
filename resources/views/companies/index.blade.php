@extends(Auth::user()->role_id == 1 ? 'layouts.dashboard' : 'layouts.app')

@section('content')

@if(Auth::user()->role_id == 1)
  <div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Companies</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="2">
                    <center>Actions</center>
                  </th>
                  <th>
                    Company ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Description
                  </th>
                  <th>
                    Created by
                  </th>
                  <th>
                    Created at
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($companies as $company)
                <tr>
                  <td>
                    <a href="/companies/{{ $company->id }}/edit">
                    Edit
                    </a>
                  </td>
                  <td>
                    <a
                      href="/companies/{{ $company->id }}"
                      onclick="var result=confirm('Are yo sure you wish to delete this Company ({{ $company->name }}) ?');
                        event.preventDefault();
                        if(result){
                          document.getElementById('delete-form-{{$company->id}}').submit();
                        }"
                    >
                    Delete
                    </a>
                    <form id="delete-form-{{$company->id}}" action="{{ route ('companies.destroy', [$company->id]) }}"
                      method="post" style="display: none">
                      <input type="hidden" name="_method" value="delete">
                      {{ csrf_field() }}
                    </form>
                  </td>
                  <td class="font-weight-medium">
                    {{ $company->id }}
                  </td>
                  <td>
                    <a href="/companies/{{ $company->id }}">
                    {{ $company->name }}
                    </a>
                  </td>
                  <td>
                    {{ $company->description }}
                  </td>
                  <td>
                    {{ $company->user_id }}
                  </td>
                  <td>
                    {{ $company->created_at }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@else
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
@endif

@endsection
