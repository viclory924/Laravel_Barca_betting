@extends('layouts.home')

@section('title', 'Bingo')
@section('html_class', 'home-page-html')
@section('body_class', 'casino-page bingo-page')

@section('content')
    <!--modal-->
    @include('partials.help-block')
    @include('partials.modal-window')
    <!--END-modal-->
    @if($device != 'mobile')
        <input type="hidden" id="user_agent" value="desktop" />
    @else
        <input type="hidden" id="user_agent" value="mobile" />
    @endif

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

    <header class="header-casino-page" style="background-image: url({{ asset('/img/bingo-women-header.jpg') }});">
        @include('parts.header')
    </header>

    <div class="main-casino-wrapper">
        <div class="main-filter-menu bingo-bonus">
            <div class="filter-menu-name">
                {{  __('Бинго')}}
            </div>
        </div>

        <section class="casino-page-content">
            <div id="bingo-wrapper" class="main-wrapper games">
                <input type="hidden" id="ajax_time" value="1"/>
                @if($games)
                    @foreach ($games as $game)
                        <div id="{{ $game['games']->source->id }}" class="game-link" name="emperor-of-sea">
                            <div class="bingo-value-wrapper">
                                <div class="bingo-value">
                                    @if($game['bingo']->gameinfo->currency->code == 'EUR')
                                        €
                                    @elseif($game['bingo']->gameinfo->currency->code == 'USD')
                                        $
                                    @else
                                        {{$game['bingo']->gameinfo->currency->code}}
                                    @endif
                                    <span class="b_jackpots">
                                    {{ $game['bingo']->gameinfo->jackpots }}
                                </span>
                                </div>
                            </div>
                            @if(!empty($player_info))
                                <a class="jq_ajax_bingo_game" href="/game_bingo/{{ $game['games']->source->id }}" data-id="{{ $game['games']->source->id }}">
                            @elseif($game['games']->realPlayOnly == 1 && empty($player_info))
                                <a class="account-trigger" href="#">
                            @else
                                <a class="jq_ajax_bingo_game" href="/game_bingo/{{ $game['games']->source->id }}" data-id="{{ $game['games']->source->id }}">
                            @endif
                                    <div class="game-link-icon" style="background-image: url({{$game['games']->iconUrl}})"></div>
                                    <span class="game-link-bg"></span>
                                    <span class="icon-play-wrapper">
                                        <i class="icon-play-button play-game" aria-hidden="true"></i>
                                    </span>
                                </a>
                            <div class="game-name bingo-info" >
                                <div class="bingo-left-col-info">
                                    <div class="bingo-left-col-info-row">
                                        <strong>{{$game['bingo']->name}}</strong>
                                    </div>
                                    <div class="bingo-left-col-info-row">
                                        <strong name="b_numsessionplayers">{{$game['bingo']->gameinfo->numsessionplayers}}</strong> {{ __('игрок')}}
                                    </div>
                                </div>
                                <div class="bingo-center-col-info">
                                    <div class="bingo-time jq_countdown" data-bingo_time="{{ $game['bingo']->gameinfo->timeleft }}">
                                        {{$game['time_left_format']}}
                                    </div>
                                </div>
                                <div class="bingo-right-col-info">
                                    <div class="bingo-right-col-info-row">
                                        {{ __('Приз')}}:
                                        <strong class="b_pot">
                                            @php $amount = number_format($game['pots']->jackpot, 2, '.', ' ') @endphp
                                            @if(isset($game['pots']->jackpot))
                                                {{$amount}}
                                            @endif
                                        </strong>
                                        <strong>
                                            @if(isset($game['bingo']->gameinfo->currency->code))
                                                @if($game['bingo']->gameinfo->currency->code == 'EUR')
                                                    €
                                                @elseif($game['bingo']->gameinfo->currency->code == 'USD')
                                                    $
                                                @else
                                                    {{$game['bingo']->gameinfo->currency->code}}
                                                @endif
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="bingo-right-col-info-row">
                                        {{ __('Билет')}}:
                                        <strong class="b_cardprice">
                                            @if(isset($game['bingo']->gameinfo->cardprice))
                                                {{$game['bingo']->gameinfo->cardprice}}
                                            @endif
                                        </strong>
                                        <strong>
                                            @if(isset($game['bingo']->gameinfo->currency->code))
                                                @if($game['bingo']->gameinfo->currency->code == 'EUR')
                                                    €
                                                @elseif($game['bingo']->gameinfo->currency->code == 'USD')
                                                    $
                                                @else
                                                    {{$game['bingo']->gameinfo->currency->code}}
                                                @endif
                                            @endif
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    </div>


    @include('parts.footer')

@endsection