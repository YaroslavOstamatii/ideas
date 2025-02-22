<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px; height: 150px" class="me-3 avatar-sm rounded-circle"
                     src="{{$user->getImageUrl()}}" alt="{{ $user->name }}">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            <div>
                @can('update',$user)
                    <div class="mt-3">
                        <a href="{{route('user.edit', $user->id)}}"> Edit </a>
                    </div>
                @endcan
            </div>
        </div>

        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio: </h5>

            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> {{ $user->followers()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                    </span> {{ $user->ideas()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-comment me-1">
                                    </span> {{ $user->comments()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-heart me-1">
                                    </span> {{ $user->likes()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-comment me-1">
                                    </span> {{ $user->comments()->count() }} </a>
            </div>

            @auth()
                @if(auth()->id() !== $user->id)
                    <div class="mt-3">
                        @if(Auth::user()->follows($user))
                            <form method="post" action="{{route('users.unfollow',$user->id)}}">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit"> Unfollow</button>
                            </form>
                        @else
                            <form method="post" action="{{route('users.follow',$user->id)}}">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit"> Follow</button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
            @guest()
                <form method="post" action="{{route('users.follow',$user->id)}}">
                    @csrf
                    <button class="btn btn-primary btn-sm" type="submit"> Follow</button>
                </form>
            @endguest
        </div>
    </div>
</div>
