
    <div class="mt-3">
        @auth()
        @if(Auth::user()->isLike($idea) ?? '')
            <form method="post" action="{{route('ideas.unlike',$idea->id)}}">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1"> </span>{{$idea->likes_count}} </button>
            </form>
        @else
            <form method="post" action="{{route('ideas.like',$idea->id)}}">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1"> </span>{{$idea->likes_count}} </button>
            </form>
        @endif
        @endauth
        @guest()
                <form method="post" action="{{route('ideas.like',$idea->id)}}">
                    @csrf
                    <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1"> </span>{{$idea->likes_count}} </button>
                </form>
        @endguest
    </div>

