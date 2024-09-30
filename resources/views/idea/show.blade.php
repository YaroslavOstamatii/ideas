@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('include.left-sidebar')
        </div>
        <div class="col-6">
            @include('include.success_message')
                <div>
                    @include('include.idea_card')
                </div>
        </div>
        <div class="col-3">
            @include('include.search-bar')
            @include('include.follow-box')
        </div>
    </div>
@endsection
