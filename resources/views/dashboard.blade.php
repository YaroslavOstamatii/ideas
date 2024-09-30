@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
           @include('include.left-sidebar')
        </div>
        <div class="col-6">
            @include('include.success_message')
            @include('include.submit_idea')
            @foreach($ideas as $idea)
                <hr>
                <div class="mt-3">
                    @include('include.idea_card')
                </div>
            @endforeach
            <div class="mt-2">
                {{$ideas->links()}}
            </div>
        </div>
        <div class="col-3">
            @include('include.search-bar')
            @include('include.follow-box')
        </div>
    </div>
@endsection
