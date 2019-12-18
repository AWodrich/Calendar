@php
    /** @var \Illuminate\Database\Eloquent\Collection $sport_events */
@endphp

@extends('layouts.default', ['appJS' => mix('js/app.js')])

@section('content')

    <div class="full-height">
        @include('partials/navigation', ['url' => '/', 'link_text' => 'Go to Home'])

        @include('partials/header', ['title' => 'Welcome to Administration Page'])
        <events-list
            admin-mode="true"
            events="{{ json_encode($sport_events) }}"
        ></events-list>

    </div>

@endsection
