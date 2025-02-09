@extends('layout.layout')
@section('title', 'Admin Users')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>Users</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Is admin</th>
                    <th scope="col">Image</th>
                    <th scope="col">Joined At</th>
                    <th scope="col">Bio</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
            @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->is_admin?'true':'false'}}</td>
                        <td>{{$user->image}}</td>
                        <td>{{$user->created_at->toDateString()}}</td>
                        <td>{{Str::limit($user->bio, 15, '...')}}</td>
                        <td>
                            <a type="submit" href="{{route('user.show',$user->id)}}">Show</a>
                            <a type="submit" href="{{route('user.edit',$user->id)}}">Edit</a>
                        </td>
                    </tr>
            @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{$users->withQueryString()->links()}}
            </div>
        </div>

    </div>
@endsection
