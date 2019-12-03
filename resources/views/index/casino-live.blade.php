@extends('layouts.casino-live')

@section('content')
    <div class="main-casino-wrapper">

        <div class="main-filter-menu">
            <div class="checkbox-wrapper">
                <ul class="checkbox-btn-wrapper">
                    <li class="checkbox-style"><input type="checkbox" id="al1" name="game-type"><label for="al1">{{ __('common.order_all') }}</label></li>
                    <li class="checkbox-style"><input type="checkbox" id="popular" name="game-type"><label for="popular">{{ __('common.order_popular') }}</label></li>
                    <li class="checkbox-style"><input type="checkbox" id="new" name="game-type"><label for="new">{{ __('common.order_new') }}</label></li>
                    <li class="checkbox-style"><input type="checkbox" id="jackpot" name="game-type"><label for="jackpot">{{ __('common.order_jackpot') }}</label></li>
                </ul>
            </div>
            <div class="provide-search">
                <div class="provide">
                    <span class="az-filter">a-z</span>
                    <span class="btn-provide">{{ __('common.provider_filter') }}</span>
                </div>
                <div class="search search-line-toggle">
                    <input type="text" placeholder="{{ __('games.search_games') }}">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <section class="casino-page-content">
            <div class="main-wrapper games">

                <div class="games-filter-wrapper">

                    <div class="games-filter">
                        <h2>провайдер</h2>
                        <div class="game-filter-checkbox">
                            <ul>
                                <li class="checkbox-style" ><input type="checkbox" name="" id="provide1"><label for="provide1">Betsoft</label></li>
                                <li class="checkbox-style" ><input type="checkbox" id="provide2"><label for="provide2">Green Tube</label></li>
                                <li class="checkbox-style" ><input type="checkbox" id="provide3"><label for="provide3">IGT</label></li>
                                <li class="checkbox-style"><input type="checkbox"  id="provide4"><label for="provide4">Microgaming</label></li>
                                <li class="checkbox-style" ><input type="checkbox" id="provide5"><label for="provide5">Net Entettaiment</label></li>
                            </ul>
                            <ul>
                                <li class="checkbox-style" ><input type="checkbox" name="" id="provide6"><label for="provide6">Betsoft</label></li>
                                <li class="checkbox-style"  ><input type="checkbox" id="provide7"><label for="provide7">Green Tube</label></li>
                                <li class="checkbox-style" ><input type="checkbox" id="provide8"><label for="provide8">IGT</label></li>
                                <li class="checkbox-style"><input type="checkbox"  id="provide9"><label for="provide9">Microgaming</label></li>
                                <li class="checkbox-style" ><input type="checkbox" id="provide10"><label for="provide10">Net Entettaiment</label></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="casino-page-content">
            <div class="main-wrapper games">
                <div class="games-list games-items">
                    <header class="games-section"></header>
                </div>
            </div>
        </section>
    </div>
@endsection