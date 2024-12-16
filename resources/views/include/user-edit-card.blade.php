<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px; height: 150px;" class="me-3 avatar-sm rounded-circle"
                         src="{{$user->getImageUrl()}}" alt="{{ $user->name }}">
                    <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                        <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth()
                        @if(auth()->id() === $user->id)
                            <div class="mt-3">
                                <a href="{{route('user.show', $user->id)}}"> View </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="mt-3">
                <label>Profile picture</label>
                <input name="image" value="{{ $user->name }}" type="file" class="form-control">
                @error('image')
                <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio: </h5>
                <textarea class="form-control" id="bio" rows="3" name="bio">{{ $user->bio }}</textarea>
                @error('bio')
                <span class="d-block text-danger mt-2">{{$message}}</span>
                @enderror
                <button class="btn btn-dark btn-sm my-2">Save</button>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> 0 </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                    </span> {{ $user->ideas()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> {{ $user->comments()->count() }} </a>
                </div>
            </div>
        </form>
    </div>
</div>
