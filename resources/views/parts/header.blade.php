<div class="main-casino-wrapper">
    @if(!isset($player_info) && empty($player_balance) && (Request::path() == 'poker' || Request::path() == 'casino' || Request::path() == 'bingo' || Request::path() == 'casino-live'))
    <div class="casino_promo_header">
        <p class="casino_promo_text_line1">{{ __('common.we_give_upto') }} <span class="promo_money">{{ __(' 600$') }}</span></p>
        <p class="casino_promo_text_line2">{{ __('common.on_first_deposit') }}</p>
        <a href="#" class="casino_promo_btn account-trigger" >{{ __('common.open_account') }}</a>
    </div>
    @elseif(isset($player_info) && !empty($player_balance) && (Request::path() == 'poker' || Request::path() == 'casino' || Request::path() == 'bingo' || Request::path() == 'casino-live'))
    <div class="promo_list_block">
        <div class="casino_promo_header jq_promo_item">
            <p class="winners-name promo_money">{{ __('Фри спины') }}</p>
            <p class="other-text casino_promo_text_line2">{{ __('каждый вторник и пятница') }}</p>
            <a href="/bonus#free-spins" class="casino_promo_btn" >{{ __('Читать далее') }}</a>
        </div>
        <div class="casino_promo_header jq_promo_item">
            <p class="winners-name promo_money">{{ __('Приведи друга') }}</p>
            <p class="other-text casino_promo_text_line2">{{ __('и получи сумму на счет') }}</p>
            <a href="/bonus" class="casino_promo_btn" >{{ __('Читать далее') }}</a>
        </div>
        <div class="casino_promo_header jq_promo_item">
            <p class="winners-name promo_money">{{ __('Кэш-бэк') }}</p>
            <p class="other-text casino_promo_text_line2">{{ __('каждую среду и субботу') }}</p>
            <a href="/bonus#back-money" class="casino_promo_btn" >{{ __('Читать далее') }}</a>
        </div>
    </div>

    @endif
</div>
<div class="main-casino-wrapper">

    <div class="logo">
        <a href="/"><img src="{{ asset('img/main-logo.svg') }}" alt=""></a>
    </div>


    <div class="menu-line">

        <div class="main-menu">
            <nav>
                <ul>
                    <li class="@if ($active_menu == 'casino') active @endif"><a href="/casino">{{ __('common.casino') }}</a></li>
                    <li class="@if ($active_menu == 'casino-live') active @endif"><a href="/casino-live">{{ __('common.casino_live') }}</a></li>
                    <li class="@if ($active_menu == 'sport') active @endif"><a href="/sport">{{ __('common.sport') }}</a></li>
                    <li class="@if ($active_menu == 'poker') active @endif"><a href="/poker">{{ __('common.poker') }}</a></li>
                    <li class="@if ($active_menu == 'bingo') active @endif"><a href="/bingo">{{ __('common.e_sports') }}</a></li>
                </ul>
            </nav>
            <div class="mobile-menu">
                <i class="icon-Menu mobile-menu-toggle"></i>
                <div class="logo">
                    <a href="/"><img src="{{ asset('/img/main-logo.svg') }}" alt=""></a>
                </div>
                <div class="search-line-toggle">
                    <i class="fa fa-search"></i>
                </div>
            </div>
        </div>

        @if(!empty($top_wins))
        <div class="last-winners">
            <div class="current-winner">
                <div class="win-currency">
                    <div class="euro"></div>
                </div>
                <div class="prev-winner"></div>
                <div class="winner">
                    <span class="winners-name">{{ $top_wins[0]->player->name }}</span>
                    <span class="other-text"> just won </span>
                    <span class="winners-value">{{ $top_wins[0]->winAmount->amount }}</span>
                    <span class="winners-currency {{ $top_wins[0]->winAmount->currency }}"></span>
                    <!--<span class="other-text"> in </span>
                    <span class="winners-game">Vikings</span>-->
                </div>
            </div>

            <div class="last-winners-dropdown">
                <div class="winners-inner">
                    <div class="latest-winners-header">
                        <span>{{ __('Последние выигрыши')}}:</span>
                    </div>
                    <ul class="lasest-winners">
                        <li class="winner-item-prev"></li>
                        @foreach($top_wins as $winner)
                        <li class="winner-item">
                            <span class="winners-name">{{ $winner->player->name }}</span>
                            <span class="other-text"> just won </span>
                            <span class="winners-value">{{ $winner->winAmount->amount }}</span>
                            <span class="winners-currency {{ $winner->winAmount->currency }}"></span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        @else
            @include('partials.last-winners')
        @endif
    </div>
    @if($show_filter)
    <div class="main-filter">

        <div class="filter-games-scroll-wrapper-hidden">
            <div class="filter-games-scroll-wrapper scrollong-item">
                <div class="go-to-left"></div>
                <div class="filtergames">
                    <div class="bigtab">
                        <a href="?favorite_games=yes" class="btn-block jq_filter_main jq_search" data-gametype="Favs">
                            <i class="icon-izbrannye"></i>
                            <br>{{ __('common.favorites')}}
                        </a>
                    </div>

                    <div class="bigtab">
                        <a href="?tag=video_slots" class="btn btn-block filter jq_filter_main jq_search" data-gametype="slot">
                            <i class="icon-vishenki-sloty" aria-hidden="true"></i>
                            <br>{{ __('common.slots')}}
                        </a>
                    </div>
                    @if(isset($device) && $device !== 'mobile')
                        <div class="bigtab">
                            <a href="?tag=roulette" class="btn btn-block filter jq_filter_main jq_search" data-gametype="roulette">
                                <i class="icon-ruletka2" aria-hidden="true"></i>
                                <br>{{ __('common.roulette')}}
                            </a>
                        </div>
                    @endif
                    <div class="bigtab">
                        <a href="?tag=table_games" class="btn btn-block filter jq_filter_main jq_search" data-gametype="table">
                            <i class="icon-table-games"></i>
                            <br>{{ __('common.table_games')}}
                        </a>
                    </div>
                    <div class="bigtab">
                        <a href="?tag=video_poker" class="btn btn-block filter jq_filter_main jq_search" data-gametype="video-poker">
                            <i class="icon-video-poker" aria-hidden="true"></i>
                            <br>{{ __('common.video_poker')}}
                        </a>
                    </div>
                    <div class="bigtab">
                        <a href="?tag=blackjack" class="btn btn-block filter jq_filter_main jq_search" data-gametype="blackjack">
                            <i class="icon-blackjack"></i>
                            <br>{{ __('common.blackjack')}}
                        </a>
                    </div>
                    <div class="bigtab">
                        <a class="btn btn-block filter jq_filter_main jq_search" data-gametype="last-games">
                            <i class="icon-proshlye-igri2" aria-hidden="true"></i>
                            <br>{{ __('common.last_games')}}
                        </a>
                    </div>
                </div>
                <div class="go-to-right"></div>
            </div>
        </div>

    </div>
    @endif

    @if(isset($show_live_filter))
    @if($show_live_filter)
    <div class="main-filter">

        <div class="filter-games-scroll-wrapper-hidden">
            <div class="filter-games-scroll-wrapper scrollong-item">
                <div class="go-to-left"></div>
                <div class="filtergames">
                    <div class="bigtab @if ($search_params['favorite_games']['val'] && $search_params['favorite_games']['val'] == 'yes') active-filter @endif ">
                        <a href="?favorite_games=yes" class="btn-block jq_filter_main jq_search" data-gametype="Favs">
                            <i class="icon-izbrannye"></i>
                            <br>{{ __('common.favorites')}}
                        </a>
                    </div>
                    <div class="bigtab active-filter">
                        <a href="?tag=table_games" class="btn btn-block filter jq_filter_main jq_search" data-gametype="table_games">
                            <i class="icon-table-games"></i>
                            <br>{{ __('common.all_table')}}
                        </a>
                    </div>
                    <div class="bigtab @if ($search_params['tag']['val'] && in_array('blackjack', $search_params['tag']['val'])) active-filter @endif ">
                        <a href="?tag=blackjack" class="btn btn-block filter jq_filter_main jq_search" data-gametype="blackjack">
                            <i class="icon-table-games"></i>
                            <br>{{ __('common.blackjack')}}
                        </a>
                    </div>
                    @if(isset($device) && $device !== 'mobile')
                    <div class="bigtab @if ($search_params['tag']['val'] && in_array('roulette', $search_params['tag']['val'])) active-filter @endif ">
                        <a href="?tag=roulette" class="btn btn-block filter jq_filter_main jq_search" data-gametype="roulette">
                            <i class="icon-ruletka2"></i>
                            <br>{{ __('common.roulette')}}
                        </a>
                    </div>
                    @endif
                    <div class="bigtab @if ($search_params['tag']['val'] && in_array('baccarat', $search_params['tag']['val'])) active-filter @endif ">
                        <a href="?tag=baccarat" class="btn btn-block filter jq_filter_main jq_search" data-gametype="baccarat">
                            <i class="icon-bakkara" aria-hidden="true"></i>
                            <br>{{ __('common.baccarat')}}
                        </a>
                    </div>
                    <div class="bigtab @if ($search_params['tag']['val'] && in_array('feature_poker', $search_params['tag']['val'])) active-filter @endif ">
                        <a href="?tag=feature_poker" class="btn btn-block filter jq_filter_main jq_search" data-gametype="feature_poker">
                            <i class="icon-poker-casino" aria-hidden="true"></i>
                            <br>{{ __('common.poker')}}
                        </a>
                    </div>
                    <div class="bigtab @if ($search_params['recent_games']['val'] && $search_params['recent_games']['val'] == 'yes') active-filter @endif ">
                        <a href="?recent_games=yes" class="btn btn-block filter jq_filter_main jq_search" data-gametype="last-games">
                            <i class="icon-proshlye-igri2" aria-hidden="true"></i>
                            <br>{{ __('common.last_games')}}
                        </a>
                    </div>
                </div>
                <div class="go-to-right"></div>
            </div>
        </div>

    </div>
    @endif
    @endif

</div>
