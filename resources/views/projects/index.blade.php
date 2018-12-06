@extends(Auth::user()->role_id == 1 ? 'layouts.dashboard' : 'layouts.app')

@section('content')

@if(Auth::user()->role_id == 1)
  <div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Projects</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="2">
                    <center>Actions</center>
                  </th>
                  <th>
                    Project ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Description
                  </th>
                  <th>
                    Company ID
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
                @foreach($projects as $project)
                <tr>
                  <td>
                    <a href="/projects/{{ $project->id }}/edit">
                    Edit
                    </a>
                  </td>
                  <td>
                    <a
                      href="/projects/{{ $project->id }}"
                      onclick="var result=confirm('Are yo sure you wish to delete this Project ({{ $project->name }}) ?');
                        event.preventDefault();
                        if(result){
                          document.getElementById('delete-form-{{$project->id}}').submit();
                        }"
                    >
                    Delete
                    </a>
                    <form id="delete-form-{{$project->id}}" action="{{ route ('projects.destroy', [$project->id]) }}"
                      method="post" style="display: none">
                      <input type="hidden" name="_method" value="delete">
                      {{ csrf_field() }}
                    </form>
                  </td>
                  <td class="font-weight-medium">
                    {{ $project->id }}
                  </td>
                  <td>
                    {{ $project->name }}
                  </td>
                  <td>
                    {{ $project->description }}
                  </td>
                  <td>
                    {{ $project->company_id }}
                  </td>
                  <td>
                    {{ $project->user_id }}
                  </td>
                  <td>
                    {{ $project->created_at }}
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
@endif
@endsection
