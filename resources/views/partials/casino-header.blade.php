<header class="header-casino-page" style="background-image: url({{asset('img/casino-women-header.jpg')}});">

    <div class="main-casino-wrapper">

        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('img/main-logo.svg')}}" alt=""></a>
        </div>


        <div class="menu-line">

            <div class="main-menu">
                <nav>
                    <ul>
                        <li @if($active == 'casino') class="active"@endif>
                            <a href="{{ route('casino') }}">Casino</a>
                        </li>
                        <li @if($active == 'casino-live') class="active"@endif>
                            <a href="{{ route('casino-live') }}">Casino live</a>
                        </li>
                        <li @if($active == 'sport') class="active"@endif>
                            <a href="{{ route('sport') }}">Sport</a>
                        </li>
                        <li @if($active == 'poker') class="active"@endif>
                            <a href="#">poker</a>
                        </li>
                        <li><a href="#">bingo</a></li>
                    </ul>
                </nav>
                <div class="mobile-menu">
                    <i class="icon-Menu mobile-menu-toggle"></i>
                    <div class="logo">
                        <a href="{{route('home')}}"><img src="{{asset('img/main-logo.svg')}}" alt=""></a>
                    </div>
                    <div class="search-line-toggle">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
            </div>

            <div class="last-winners">
                <div class="current-winner">
                    <div class="win-currency">
                        <div class="euro"></div>
                    </div>
                    <div class="prev-winner"></div><div class="winner"><span class="winners-name">Jonh G</span><span class="other-text"> just won </span><span class="winners-value">2.8</span> <span class="winners-currency">EURO</span><span class="other-text"> in </span><span class="winners-game">Vikings</span></div>
                </div>

                <div class="last-winners-dropdown">
                    <div class="winners-inner">
                        <div class="latest-winners-header">
                            <span>Последние выигрыши:</span>
                        </div>
                        <ul class="lasest-winners">
                            <li class="winner-item-prev"></li>
                            <li class="winner-item">
                                <span class="winners-name">Jonh G</span><span class="other-text"> just won </span><span class="winners-value">2.8</span> <span class="winners-currency">EURO</span><span class="other-text"> in </span><span class="winners-game">Vikings</span>
                            </li>
                            <li class="winner-item"></li>
                            <li class="winner-item"></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="main-filter">

            <div class="filter-games-scroll-wrapper-hidden">
                <div class="filter-games-scroll-wrapper scrollong-item">
                    <div class="go-to-left"></div>
                    <div class="filtergames games-filter">

                            <div class="bigtab">
                                <a href="#" class="btn-block js-filter-games" data-game-type="favorites">
                                    <i class="icon-izbrannye"></i>
                                    <br>{{ __('common.favorites') }}</a>
                            </div>
                        @if($active == 'casino')
                            <div class="bigtab active-filter">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="slots">
                                    <i class="icon-vishenki-sloty" aria-hidden="true"></i>
                                    <br>{{ __('common.slots') }}</a>
                            </div>

                            <div class="bigtab">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="roulette">
                                    <i class="icon-ruletka2" aria-hidden="true"></i>
                                    <br>{{ __('common.roulette') }}</a>
                            </div>

                            <div class="bigtab">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="table">
                                    <i class="icon-table-games"></i>
                                    <br>{{ __('common.table_games') }}</a>
                            </div>

                            <div class="bigtab">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="video-poker">
                                    <i class="icon-video-poker" aria-hidden="true"></i>
                                    <br>{{ __('common.video_poker') }}</a>
                            </div>

                            <div class="bigtab">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="blackjack">
                                    <i class="icon-blackjack"></i>
                                    <br>{{ __('common.blackjack') }}</a>
                            </div>

                        @elseif($active == 'casino-live')

                            <div class="bigtab active-filter">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="blackjack">
                                    <i class="icon-blackjack"></i>
                                    <br>{{ __('common.blackjack') }}</a>
                            </div>

                            <div class="bigtab">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="baccarat">
                                    <i class="icon-bakkara" aria-hidden="true"></i>
                                    <br>{{ __('common.baccarat') }}</a>
                            </div>

                            <div class="bigtab">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="roulette">
                                    <i class="icon-ruletka2" aria-hidden="true"></i>
                                    <br>{{ __('common.roulette') }}</a>
                            </div>

                            <div class="bigtab">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="poker">
                                    <i class="icon-poker-casino" aria-hidden="true"></i>
                                    <br>{{ __('common.poker') }}</a>
                            </div>

                            <div class="bigtab">
                                <a href="#" class="btn btn-block filter js-filter-games" data-game-type="tables">
                                    <i class="icon-table-games"></i>
                                    <br>{{ __('common.all_tables') }}</a>
                            </div>

                        @endif
                        <div class="bigtab">
                            <a href="#" class="btn btn-block filter js-filter-games" data-game-type="last">
                                <i class="icon-proshlye-igri2" aria-hidden="true"></i>
                                <br>{{ __('common.last_games') }}</a>
                        </div>
                    </div>
                    <div class="go-to-right"></div>
                </div>
            </div>

        </div>
    </div>
</header>