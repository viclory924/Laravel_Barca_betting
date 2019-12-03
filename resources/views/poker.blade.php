@extends('layouts.home')

@section('title', 'Poker')
@section('html_class', 'home-page-html')
@section('body_class', 'casino-page')


@section('content')

    <!--modal-->
    @include('partials.help-block')
    @include('partials.modal-window')
    <!--END-modal-->

    @include('parts.top-block')

    <header class="header-casino-page" style="background-image: url(img/casino-live-women-header.jpg);">
        @include('parts.header')
    </header>

    <div class="main-casino-wrapper">
        <h2 class="text-center" style="color: #debc6f; margin: 10px auto 40px;">{{ __('Скоро открытие')}}</h2>
    </div>
    @include('parts.footer')

@endsection