@php
    /** @var \Illuminate\Database\Eloquent\Collection $sport_events */
@endphp

@extends('layouts.default', ['appJS' => mix('js/app.js')])

@section('content')

    <div class="full-height">
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="heading--main heading text--lightblue">Welcome to Administration Page</h1>
            </div>
        </div>
        <events-list
            alter-list="true"
            events="{{ json_encode($sport_events) }}"
        ></events-list>

    </div>

@endsection
