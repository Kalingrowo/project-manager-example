@extends(Auth::user()->role_id == 1 ? 'layouts.dashboard' : 'layouts.app')

@section('content')

  @if(Auth::user()->role_id == 1)
    <div class="row">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Users</h4>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      User ID
                      <i class="fa fa-user-o"></i>
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Role
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td class="font-weight-medium">
                      {{ $user->id }}
                    </td>
                    <td>
                      {{ $user->name }}
                    </td>
                    <td>
                      {{ $user->email }}
                    </td>
                    <td>
                      @if ($user->role_id == 1)
                        Admin
                      @else
                        User
                      @endif
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
  @endif

@endsection
