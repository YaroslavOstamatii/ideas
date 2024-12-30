<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-between">
                <img style="width:50px; height: 50px" class="me-2 avatar-sm rounded-circle"
                     src="{{$idea->user->getImageUrl()}}" alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a
                            href="{{ route('user.show',$idea->user->id) }}"> {{$idea->user->name}}
                        </a></h5>
                </div>

            </div>
            <div class="d-flex align-items-center justify-content-between">
                @if (!Route::is('idea.show'))
                    <a href="{{route('idea.show',['idea'=>$idea])}}">Show</a>
                @endif
                @auth
                    @can('idea.edit',$idea)
                        <form action="{{route('idea.destroy',$idea->id)}}" method="post">
                            @csrf
                            @method('delete')

                            <a class="mx-2" href="{{route('idea.edit',['idea'=>$idea])}}">Edit</a>
                            <button class=" ms-1 btn btn-danger btn-sm"> X</button>
                        </form>
                    @endcan
                @endauth
            </div>

        </div>
    </div>
    <div class="card-body">
        @if($editing ?? false)
            <form action="{{route('idea.update',$idea->id)}}" method="post">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" id="idea" rows="3"
                              name="content">{{ old('content', $idea->idea_content) }}</textarea>
                    @error('content')
                    <span class="d-block text-danger mt-2">{{$message}}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update</button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{$idea->idea_content}}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                @include('idea.shared.like-button')

            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea->created_at->format('d M Y, H:i')}}</span>
            </div>
        </div>
        @include('include.comment-box')
    </div>
</div>
