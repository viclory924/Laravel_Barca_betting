@extends('layouts.home')

@section('title', __('common.bonus-title'))
@section('html_class', 'home-page-html')
@section('body_class', 'casino-page')

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

    @include('parts.top-block', ['active_menu' => 'bonus'])

    <header class="header-casino-page" style="background-image: url({{ asset('img/bonus-women-header.jpg') }});">
        @include('parts.header', ['active_menu' => 'bonus', 'show_filter' => false, 'search_params' => array(), 'favorite_games' => array()])
    </header>

    <div class="main-casino-wrapper">

        <div class="main-filter-menu bingo-bonus">
            <div class="filter-menu-name">{{ __('Бонусы')}}</div>
        </div>

        <section class="casino-page-content">
            <div class="main-wrapper">

                <div class="bonus-info-block">
                    <div class="bonus-info-col-left">
                        <h2>{{ __('Приветственный бонус')}}</h2>

                        <p>{{ __('В качестве приветственного подарка мы даем новым игрокам бонус на первые 3 депозита.')}}</p>
                        <ul>
                            <li><span class="golden">{{ __('Депозит')}} 1</span>: <strong>100% {{ __('соответствует до')}} $ 200</strong></li>
                            <li><span class="golden">{{ __('Депозит')}} 2</span>: <strong>50% {{ __('соответствует до')}} $ 200</strong></li>
                            <li><span class="golden">{{ __('Депозит')}} 3</span>: <strong>50% {{ __('соответствует до')}} $ 200</strong></li>
                        </ul>

                        <p>{{ __('Например: если ваш первый депозит составляет 100 долларов США, вы получите 200 долларов, чтобы играть.')}}</p>
                    </div>
                    <div class="bonus-info-col-right">
                        <img src="{{ asset('img/bonus-banner.jpg') }}" alt="">
                    </div>
                </div>

                <div class="bonus-info-block">
                    <div class="bonus-info-col-full">
                        <p>{{ __('Промокоды')}}</p>
                        <ul>
                            <li><span class="golden">{{ __('1-й Депозит')}}</span> {{ __('использовать код бонуса')}} <strong class="golden">WELCOMEBETTEND</strong></li>
                            <li><span class="golden">{{ __('2-й Депозит')}}</span> {{ __('использовать код бонуса')}} <strong class="golden">WELCOMEBETTEND2</strong></li>
                            <li><span class="golden">{{ __('3-й Депозит')}}</span> {{ __('использовать код бонуса')}} <strong class="golden">WELCOMEBETTEND3</strong></li>
                        </ul>

                        <p>{{ __('Чтобы получить правильные бонусы, вы должны ввести правильный бонусный код, как указано выше, с каждым депозитом.')}}</p>
                    </div>
                </div>

                <div class="bonus-info-block">
                    <div class="bonus-info-col-full">
                        <h2>{{ __('Кэш-бэк')}}</h2>
                        <p>{{ __('BetTend возвращает деньги')}}</p>
                        <ul>
                            <li><span class="golden">{{ __('Каждую среду')}} </span> {{ __('при проигрыше 100 $ (или сумму эквивалентную, этому значению)  мы возвращаем 10%')}}</li>
                            <li><span class="golden">{{ __('Каждую субботу')}} </span> {{ __('при проигрыше 50 $ (или сумму эквивалентную, этому значению)  мы возвращаем 20%')}}</li>
                        </ul>

                        <a class="js_bonus pull-right" data-hash="back-money">{{ __('Условия и правила')}}</a>
                    </div>
                </div>

                <div class="bonus-info-block">
                    <div class="bonus-info-col-full">
                        <h2>{{ __('Фри спины')}}</h2>
                        <ul>
                            <li><span class="golden">{{ __('Каждый вторник')}}</span> {{ __('при внесении депозита в размере 40 $ (или сумму эквивалентную этому значению) вы получаете 75 бесплатных вращений в игре')}} StarBurst</li>
                            <li><span class="golden">{{ __('Каждую пятницу')}}</span> {{ __('при внесении депозита в размере 40 $ (или сумму эквивалентную этому значению) вы получаете 75 бесплатных вращений в игре')}} Gonzos Quest</li>
                        </ul>
                        <a class="js_bonus pull-right" data-hash="free-spins">{{ __('Условия и правила')}}</a>
                    </div>
                </div>

                <div class="bonus-info-block">
                    <div class="bonus-info-col-full">
                        <h2 style="margin-bottom: 0;">{{ __('Приведи друга и получи 20$ на счет или 35 фри-спинов в игре')}} Gonzos Quest</h2>
                    </div>
                </div>

                @include('info_parts.'.App::getLocale().'.bonus_rules')

            </div>
        </section>
    </div>

    @include('parts.footer')

@endsection