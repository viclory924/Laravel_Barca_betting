<footer class="casino-page-footer">
    <div class="main-casino-wrapper">
        <div class="footer-menu-wrapper">
            <ul>
                <li><a href="{{ URL::to('/about#contacts') }}">{{ __('common.contacts') }}</a></li>
                <li><a href="{{ URL::to('/about#terms-and-conditions') }}">{{ __('common.terms_and_rules') }}</a></li>
                <li><a href="{{ URL::to('/about#partners') }}">{{ __('common.for_partners') }}</a></li>
            </ul>
            <ul>
                <li><a href="{{ URL::to('/about#betting-rules') }}">{{ __('common.betting_rules') }}</a></li>
                <li><a href="{{ URL::to('/about#about-us') }}">{{ __('common.about') }}</a></li>
                <li><a href="{{ URL::to('/about#privacy-policy') }}">{{ __('common.privacy_policy') }}</a></li>
            </ul>
            <div class="social-button">
                <ul class="social-button-ul">
                    <li><a href="https://vk.com/" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="logo-footer">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="{{ asset('img/main-logo.svg') }}" alt=""></a>
                </div>
            </div>
        </div>



        <div class="col-right-func-select col-right-func-number-select footer-lang">
            <span class="col-right-func-select-header">Русский Ru</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
            <div class="col-right-func-select-options-wrapper">
                <ul class="col-right-func-select-options-lang">
                    <li data-lang="ru">Русский Ru</li>
                    <li data-lang="en">Английский En</li>
                    <!--<li data-lang="tr">Турецкий Tr</li>-->
                </ul>
            </div>
        </div>


        <div class="footer-menu-wrapper footer-menu-wrapper-lang">
            <div class="col-right-func-select col-right-func-number-select footer-lang">
                <span class="col-right-func-select-header">{{ App::getLocale() }}</span>
                <div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                <div class="col-right-func-select-options-wrapper">
                    <ul class="col-right-func-select-options-lang">
                        @foreach(Config::get('languages') as $lang => $language)
                            @if($lang == \App::getLocale())
                                @continue
                            @endif
                            <li data-lang="{{ $lang }}">{{ $language  }}</li>
                            {{--<a href="{{ route('lang.switch', $lang) }}" title="{{ $language }}">--}}
                            {{--<img src="{{ asset('/img/' . $lang . '-lang.png') }}" alt="">--}}
                            {{--<span>{{ $language }}</span>--}}
                            {{--</a>--}}
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="payment-systems-wrapper">
            <span>{{ __('common.payment_systems') }}</span>
            <div class="payment-systems">
                <img src="{{ asset('img/payment-systems/visa.png') }}" alt="">
                <img src="{{ asset('img/payment-systems/mastercard.png') }}" alt="">
                <img src="{{ asset('img/payment-systems/skrill.png') }}" alt="">
                <img src="{{ asset('img/payment-systems/neteller.png') }}" alt="">
                <img src="{{ asset('img/payment-systems/trustly.png') }}" alt="">
                <img src="{{ asset('img/payment-systems/sofort.png') }}" alt="">
                <img src="{{ asset('img/payment-systems/zimpler.png') }}" alt="">
            </div>
        </div>


        <div class="footer-big-text-wrapper">
				<span>
					BetTend casino is registered in Curacao, and also hold the gambling license number 365/JAZ Sub-License GLH-OCCHKTW0703032017, which was issued on March 3, 2017. All business and financial operations are carried out in accordance with the law of Curacao. BetTend has representation offices in Latvia, Great Britain, Russia, and Belarus.
				</span>
        </div>

        <div class="all-right-reserved-wrapper">
            <span>{{ __('common.all_rights_reserved') }} {{ date('Y') }}</span>
        </div>
    </div>
</footer>

{{--<div id="temp-container"></div>--}}
{{--<footer id="footer">--}}
    {{--<div class="container">--}}
        {{--<div class="top-box">--}}
            {{--<div class="sub-nav">--}}
                {{--<div class="col">--}}
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<a href="{{ URL::to('/about#about-us') }}" class="js-anchor">{{ __('common.about') }}</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ URL::to('/about#contacts') }}" class="js-anchor">{{ __('common.contacts') }}</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ URL::to('/about#terms-and-conditions') }}" class="js-anchor">{{ __('common.terms_and_rules') }}</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ URL::to('/about#responsible-gambling') }}" class="js-anchor">{{ __('common.responsible_gambling') }}</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col">--}}
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<a href="{{ URL::to('/about#betting-rules') }}" class="js-anchor">{{ __('common.betting_rules') }}</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ URL::to('/about#privacy-policy') }}" class="js-anchor">{{ __('common.privacy_policy') }}</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{ URL::to('/about#partners') }}" class="js-anchor">{{ __('common.for_partners') }}</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="social-links">--}}
                {{--<a href="https://vk.com/" class="vkontakte" target="_blank" title="Vkontakte">vk</a>--}}
                {{--<a href="https://twitter.com/" class="twitter" target="_blank" title="Twitter"></a>--}}
                {{--<a href="https://facebook.com/" class="facebook" target="_blank" title="Facebook">f</a>--}}
            {{--</div>--}}
            {{--<img src="{{ asset('img/footer-logo.png') }}" id="footer-logo" alt="">--}}
        {{--</div>--}}
        {{--<div id="logos-box">--}}
            {{--<img src="{{ asset('img/uploads/footer-logo1.jpg') }}" alt="">--}}
            {{--<img src="{{ asset('img/uploads/footer-logo2.jpg') }}" alt="">--}}
            {{--<img src="{{ asset('img/uploads/footer-logo3.jpg') }}" alt="">--}}
            {{--<img src="{{ asset('img/uploads/footer-logo4.jpg') }}" alt="">--}}
            {{--<img src="{{ asset('img/uploads/footer-logo5.jpg') }}" alt="">--}}
            {{--<img src="{{ asset('img/uploads/footer-logo6.jpg') }}" alt="">--}}
        {{--</div>--}}
        {{--<div class="middle-box">--}}
            {{--<div class="text">--}}
                {{--<p>Lepreconcasino is part of the DragonGame KFT. This website is operated by DragonGame, a company registered under the laws of Hungry with registration number: 01-09-335891, registered address: 1113 Budapest, Kenese utca 3. The Lepreconcasino website is operating under license of DragonGame N.V. part of the DragonGame KFT, a company licensed and regulated by the laws of Curacao and has its sublicense issued by Gaming Services Provider N.V. #365/JAZ</p>--}}
            {{--</div>--}}
            {{--<div class="img">--}}
                {{--<img src="{{ asset('img/uploads/footer-img1.jpg') }}" alt="">--}}
                {{--<img src="{{ asset('img/uploads/footer-img2.jpg') }}" alt="">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div id="copy">--}}
            {{--<div id="copy-logo">--}}
                {{--<img src="{{ asset('img/copy-logo.jpg') }}" alt="">--}}
            {{--</div>--}}
            {{--<p>{{ __('common.all_rights_reserved') }} 2018</p>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}