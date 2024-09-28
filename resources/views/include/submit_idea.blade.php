<div class="row">
    <h4> Share yours ideas </h4>
    <form action="{{route('idea.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="idea" rows="3" name="content"></textarea>
            @error('content')
            <span class="d-block text-danger mt-2">{{$message}}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share</button>
        </div>
    </form>
</div>
