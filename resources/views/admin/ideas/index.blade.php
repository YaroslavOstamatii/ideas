@extends('layout.layout')
@section('title', 'Admin Ideas')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>Ideas</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Content</th>
                    <th scope="col">Author</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
            @foreach($ideas as $idea)
                    <tr>
                        <th scope="row">{{$idea->id}}</th>
                        <td>{{Str::limit($idea->idea_content, 20, '...')}}</td>
                        <td>
                            <a href="{{route('user.show',$idea->user->id)}}">{{$idea->user->name}}</a>
                        </td>
                        <td>{{$idea->created_at->toDateString()}}</td>
                        <td>
                            <a type="submit" href="{{route('idea.show',$idea->id)}}">Show</a>
                            <a type="submit" href="{{route('idea.edit',$idea->id)}}">Edit</a>
                        </td>
                    </tr>
            @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{$ideas->withQueryString()->links()}}
            </div>
        </div>

    </div>
@endsection
