@extends('layout.layout')
@section('title', 'Idea show')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('include.left-sidebar')
        </div>
        <div class="col-6">
            @include('include.success_message')
            <div>
                @include('idea.shared.idea_card')
            </div>
        </div>
        <div class="col-3">
            @include('include.search-bar')
            @include('include.follow-box')
        </div>
    </div>
@endsection
