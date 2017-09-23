<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- API Token --}}
    <meta name="api-token" content="{{ Auth::check() ? "Bearer ".Auth::user()->api_token : ""}}">
    {{-- APP_URL --}}
    <meta name="root-url" content="{{ env("APP_URL") }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">--}}
    @yield('style')

</head>
<body>
<div id="app">
    <app-bar :login="{{ Auth::check() ? "true" : "false" }}"
             :isadmin="{{ App\User::isadmin() ? 'true':'false'}}"></app-bar>
    <drawer></drawer>
    @if(strpos(Request::url(), 'challenges'))
        <challenges :login="{{ Auth::check() ? "true" : "false" }}"></challenges>
    @endif

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
