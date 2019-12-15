<!DOCTYPE html>
<html
    lang="de"
    class="no-js h-full"
>
<head>

    <meta charset="utf-8">
    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style>
        .no-js [requires-js] {
            display: none !important;
        }


        .has-js [no-js] {
            display: none !important;
        }
    </style>

</head>
<body class="flex flex-col h-full">


<main
    class="flex-1 h-full"
    id="app"
>
    @yield('content')
</main>


@yield('vue-template-includes')

<link
    href="{{ mix('css/app.css') }}"
    rel="stylesheet"
>
<link
    rel="stylesheet"
    href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
>

@section('scripts')
    {{--save the root url of the page for further usage--}}
    <script>
    var root_url = '{{  Request::root() }}/';

    </script>

    @if(isset($appJS))
        <script
            rel="preload"
            src="{{ $appJS }}"
        ></script>
    @else
        <script
            rel="preload"
            src="{{ mix('js/app.js') }}"
        ></script>
    @endif
@show

</body>
</html>
