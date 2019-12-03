@extends('layouts.home')

@section('title', 'Info')
@section('html_class', 'home-page-html')
@section('body_class', 'casino-page')

@section('content')

    <!--modal-->
    @include('partials.help-block')
    @include('partials.modal-window')
    <!--END-modal-->

    @include('parts.top-block')

    <header class="header-info-page">
        @include('parts.header')
    </header>

    <div class="main-casino-wrapper info-page">

        @include('info_parts.'.App::getLocale().'.about_us')
        {{--@include('info_parts.'.App::getLocale().'.customer_support')--}}
        @include('info_parts.'.App::getLocale().'.terms_of_use')
        @include('info_parts.'.App::getLocale().'.responsible_gambling')
        @include('info_parts.'.App::getLocale().'.betting_rules')
        @include('info_parts.'.App::getLocale().'.confidentiality')
        @include('info_parts.'.App::getLocale().'.affiliates')

    </div>

    @include('parts.footer')

@endsection