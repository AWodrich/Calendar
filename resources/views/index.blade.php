@php
    /** @var \Illuminate\Database\Eloquent\Collection $sport_events */
@endphp

@extends('layouts.default', ['appJS' => mix('js/app.js')])
@include('partials.favicon')

@section('content')

    <div class="full-height">
        @include('partials/navigation', ['url' => 'admin', 'link_text' => 'Go to Admin Page'])

        @include('partials/header', ['title' => 'Sports Events Calendar'])
        <events-list events="{{ json_encode($sport_events) }}"></events-list>
    </div>

@endsection
