@php
    /** @var \Illuminate\Database\Eloquent\Collection $sport_events */
@endphp

@extends('layouts.default', ['appJS' => mix('js/app.js')])

@section('content')

    <div class="full-height">
        <events-list events="{{ json_encode($sport_events) }}"></events-list>
    </div>

@endsection
