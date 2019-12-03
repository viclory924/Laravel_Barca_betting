@extends('layouts.home')


@section('title', 'Welcome')
@section('html_class', 'home-page-html overflow-hidden')
@section('body_class', 'home-page home-page-bg')

@section('content')

    @include('partials.help-block')
    @include('partials.modal-window')

    <div class="main-wrapper home-page-wrapper">

        @include('partials.enter-button')

        <header>
            <div>
                <div class="sport-table-main-wrapper">
                    <div class="sport-table-header-top-line">
                        <div class="main-table-header-logo">
                            <a href="#">
                                <a href="{{route('home')}}"><img src="{{ asset('img/main-logo.svg') }}" alt=""></a>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="home-page-scroll-wrapper">
            <div class="home-page-menu-wrapper">
                <div class="home-page-menu">
                    <div class="left-side-menu">
                        <nav>
                            <ul>
                                <li><a href="{{route('casino')}}">{{ __('common.casino') }}</a></li>
                                <li><a href="{{route('casino-live')}}">{{ __('common.casino_live') }}</a></li>
                                <li><a href="{{ route('bonus') }}">{{ __('common.bonus') }}</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="right-side-menu">
                        <nav>
                            <ul>
                                <li><a href="/sport">{{ __('common.sport') }}</a></li>
                                <li><a href="#">{{ __('common.poker') }}</a></li>
                                <li><a href="{{route('bingo')}}">{{ __('E-sports') }}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection