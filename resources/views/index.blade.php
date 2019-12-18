@php
    /** @var \Illuminate\Database\Eloquent\Collection $sport_events */
@endphp

@extends('layouts.default', ['appJS' => mix('js/app.js')])
@include('partials.favicon')

@section('content')

    <div class="full-height">
        @include('partials/navigation')
        @include('partials/header')
        <events-list events="{{ json_encode($sport_events) }}"></events-list>
        @include('partials/footer')

    </div>

@endsection
