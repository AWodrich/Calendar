@php
    isset($title) ?  $title : '';
@endphp

<div class="header">
    <img
        class="header__image"
        src="{{ asset('images/header.jpg') }}"
        alt="Headerbild"
    >
    <h1 class="heading--main heading header__title">
        {{ $title }}
    </h1>

</div>
