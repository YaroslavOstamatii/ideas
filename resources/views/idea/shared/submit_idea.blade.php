
<div class="row">

    @auth()
        <h4> Share yours ideas </h4>
    @endauth
    @guest()
            <h4> Login to share yours ideas </h4>
    @endguest
    <form action="{{route('idea.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="idea" rows="3" name="idea_content"></textarea>
            @error('idea_content')
            <span class="d-block text-danger mt-2">{{$message}}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share</button>
        </div>
    </form>
</div>

