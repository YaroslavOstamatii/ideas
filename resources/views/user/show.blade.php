@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('include.left-sidebar')
        </div>
        <div class="col-6">
            @include('include.success_message')
            <div>
                @include('user.shared.user-card')
            </div>
            <hr>
            @forelse($ideas as $idea)
                <div class="mt-3">
                    @include('idea.shared.idea_card')
                </div>
            @empty
                <p class="text-center my-3">Nothing found</p>
            @endforelse

            <div class="mt-2">
                {{$ideas->withQueryString()->links()}}
            </div>
        </div>
        <div class="col-3">
            @include('include.search-bar')
            @include('include.follow-box')
        </div>
    </div>
@endsection
