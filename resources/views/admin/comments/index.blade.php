@extends('layout.layout')
@section('title', 'Admin Comments')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            @include('include.success_message')
            <h1>Comments</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User</th>
                    <th scope="col">Idea</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Comment at</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
            @foreach($comments as $comment)
                    <tr>
                        <th scope="row">{{$comment->id}}</th>
                        <td>
                            <a href="{{route('user.show',$comment->user->id)}}">{{$comment->user->name}}</a>
                        </td>
                        <td>
                            <a href="{{route('idea.show',$comment->idea->id)}}">{{Str::limit($comment->idea->idea_content, 15, '...')}}</a>
                        </td>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->created_at->toDateString()}}</td>
                        <td>
                            <form action="{{route('admin.comments.destroy',$comment->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
            @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{$comments->withQueryString()->links()}}
            </div>
        </div>

    </div>
@endsection
