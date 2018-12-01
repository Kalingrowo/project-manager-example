<!-- shows recent comments -->
<div class="col-xl-12 col-lg-12 col-md-12 col-12">
    <!-- Fluid width widget -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
              <span class="glyphicon glyphicon-comment"></span>
              Recent Comments
          </h3>
        </div>
        <div class="card-body">
            <ul class="media-list">
                @foreach($comments as $comment)
                <li class="media">
                    <div class="media-left">
                        <img src="http://placehold.it/60x60" class="rounded-circle">
                    </div>
                    <div class="media-body">
                         <h4 class="media-heading">
                            <small>
                                <a href="users/{{ $comment->user->id }}">
                                  {{ $comment->user->name }} - ( {{ $comment->user->email }} )
                                </a>
                                <br>
                                  commented on {{ $comment->created_at }}
                            </small>
                          </h4>
                        <p>{{ $comment->body }}</p>
                        <b>Proof :</b>
                        <p>{{ $comment->url }}</p>
                    </div>
                </li>
                @endforeach
              </ul>
        </div>
    </div>
    <!-- End fluid width widget -->
</div>
<!-- end shows recent comments -->
