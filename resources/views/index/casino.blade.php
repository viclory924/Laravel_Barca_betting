@extends('layouts.home')

@section('title', 'Casino')
@section('html_class', 'home-page-html')
@section('body_class', 'casino-page')


@section('content')

    <!--modal-->
    @include('partials.help-block')
    @include('partials.modal-window')
    <!--END-modal-->

    @include('parts.top-block')


    <div class="fixed_game_window hide_el">
        @if(!isset($player_info) && empty($player_balance))
            <script type="text/javascript">
                (function ($) {
                    $( document ).ready(function() {
                        setTimeout(function () {
                            $('.jq_notification-Bettend_register').animate({
                                left: 0
                            }, 400, function() {
                                $(this).css("display", "block");
                            });
                        }, 40000);
                    });
                })(jQuery);
            </script>
        @endif
    </div>


    <header class="header-casino-page" style="background-image: url(/../img/casino-women-header.jpg);">
        @include('parts.header')
    </header>
    <input type="hidden" id="page_url" value="?tag=video_slots,popular"/>

    <div class="main-casino-wrapper jq_casino_content">
        <div class="main-filter-menu">
            <div class="checkbox-wrapper">
                <ul class="checkbox-btn-wrapper">
                    <li class="checkbox-style">
                            <input type="checkbox" class="checkbox-input" data-value="1" id="checkbox-all" value="all" checked="checked" name="game-type"><label class="checkbox-label" data-target="#checkbox-all" for="all">{{ __('common.order_all')}}</label>
                        </li>
                    <li class="checkbox-style">
                            <input type="checkbox" class="checkbox-input" data-value="1" id="checkbox-popular" value="popular" name="game-type" checked="checked"><label class="checkbox-label" data-target="#checkbox-popular" for="popular">{{ __('common.order_popular')}}</label>
                        </li>
                    <li class="checkbox-style">
                            <input type="checkbox" class="checkbox-input" data-value="1" id="checkbox-new" value="new" checked="checked" name="game-type"><label class="checkbox-label" data-target="#checkbox-new" for="new">{{ __('common.order_new') }}</label>
                    </li>
                    
                </ul>
            </div>
            <div class="provide-search">
                <div class="provide">
                    <a class="jq_search jq_sort_by_btn" href="?sort_by=name">
                        <span class="az-filter">a-z</span>
                    </a>
                    <a class="jq_search jq_search_provider_btn">
                        <span class="btn-provide">{{ __('common.provider_filter')}}</span>
                    </a>
                </div>
                <div class="search search-line-toggle">
                    <input type="text" class="jq_search_input" placeholder="{{ __('common.search')}}" value="">
                    <i class="fa fa-search jq_search_text" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <section class="casino-page-content">

        </section>

    </div>
   <!-- {{{-- @include('casino_parts.modal-play-mode') --}}} -->

    @include('parts.footer')

@endsection
