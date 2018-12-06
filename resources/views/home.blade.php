@extends(Auth::user()->role_id == 1 ? 'layouts.dashboard' : 'layouts.app')

@section('content')

  @if(Auth::user()->role_id == 1)
    <div class="row purchace-popup">
      <div class="col-12">
        <span class="d-flex align-items-center">
          <p>Welcome, {{ Auth::user()->name }}</p>
          <i class="mdi mdi-close popup-dismiss ml-auto" ></i>
        </span>
      </div>
    </div>
  @else
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }} asdasd
                          </div>
                      @endif

                      You are logged in!
                  </div>
              </div>
          </div>
      </div>
    </div>
  @endif

@endsection
