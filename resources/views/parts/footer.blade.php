<div class="body-container game-body-container" style="display:none;">
<div style="position:fixed;heigh:100vh;width:100%;top:0px;left:0px;background-image: url(img/game/bg-1.jpg);z-index:999;overflow-y:none;" class="game-wrapper">
	<div class="menu-game-wrapper">
			<div class="menu-game-content-wrapper">
				<div class="menu-home-wrapper">
					<a class="menu-home" href="/"><i class="icon-home" aria-hidden="true"></i></a>
					<span class="time"><span class="hours" id="hours">00</span><span class="time-divider">:</span><span class="minutes" id="min">00</span></span>
				</div>
				<div class="sport-table-top-account-money">
					<span class="display-balance"></span>
					<a href="#" class="deposit in-game-deposit">{{ __('common.deposit')}}</a>
				</div>
				<div class="game-menu-help help-toggle">
					<i class="icon-vopros2" aria-hidden="true"></i>
				</div>
			</div>
		</div>

	
    <a href="index.html" class="modal-closer">
        <span>{{ __('common.close_game')}}</span>
		<i class="icon-close2" aria-hidden="true"></i>
	</a>
	<a class="hide-menus mobile-hide-menus"><i class="icon-menu" aria-hidden="true"></i></a>

    <div class="game-window-wrapper">
			<div class="game-controls">
				<div class="game-control-wrapper">
					<ul>
						<li><a class="fullscreen"><i class="icon-razvernut" aria-hidden="true"></i>
						<div class="game-control-span-wrapper">
							<span>{{ __('common.fullscreen_mode')}}</span>
						</div></a></li>
						<li><a class="hide-menus"><i class="icon-menu" aria-hidden="true"></i>
						<div class="game-control-span-wrapper">
							<span>{{ __('common.hide_menu')}}</span>
						</div></a></li>
						<li><a class="game-like"><i class="fa fa-heart-o" aria-hidden="true"></i>
						<div class="game-control-span-wrapper">
							<span>Добавить закладки</span>
						</div></a></li>
					</ul>
				</div>
			</div>
	<div class="game" id="game-box-holder" style=""></div>
	</div>

	</div>
	</div>
	
	
<footer class="casino-page-footer" <?php if($active_menu == 'sport'){ ?> style="background:#3c3c3c" <?php } ?> >
    <div class="main-casino-wrapper">
        <div class="footer-menu-wrapper footer-menu-wrapper-main">
            <ul>
                <li><a data-hash="about_us" href="/info#about_us">{{ __('common.about')}}</a></li>
                <li><a data-hash="customer_support" href="/info#customer_support">{{ __('common.contacts')}}</a></li>
                <li><a data-hash="terms_of_use" href="/info#terms_of_use">{{ __('common.terms_and_rules')}}</a></li>
                <li><a data-hash="responsible_gambling" href="/info#responsible_gambling">{{ __('common.responsible_gambling')}}</a></li>
            </ul>
            <ul>
                <li><a data-hash="betting_rules" href="/info#betting_rules">{{ __('common.betting_rules')}}</a></li>
                <li><a data-hash="confidentiality" href="/info#confidentiality">{{ __('common.privacy_policy')}}</a></li>
                <li><a data-hash="affiliates" href="/info#affiliates">{{ __('common.for_partners')}}</a></li>
            </ul>
            <div class="social-button">
                <ul class="social-button-ul">
                    <li><a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            @if(Route::getFacadeRoot()->current()->uri() != 'sport')
            <div class="logo-footer">
                <div class="logo pull-right">
                    <a href="/"><img src="{{ asset('/img/main-logo.svg') }}" alt=""></a>
                </div>
            </div>
            @endif
        </div>

        <div class="footer-menu-wrapper footer-menu-wrapper-lang">
            <div class="col-right-func-select col-right-func-number-select footer-lang">
                <span class="col-right-func-select-header">{{ Config::get('languages')[App::getLocale()] }}</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                <div class="col-right-func-select-options-wrapper">
                    <ul class="col-right-func-select-options-lang">
                        @foreach(Config::get('languages') as $lang => $language)
                            @if($lang == \App::getLocale())
                                @continue
                            @endif
                            <li data-lang="{{ $lang }}"><a href="{{ route('lang.switch', $lang) }}">{{ $language }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="payment-systems-wrapper d-none on-desktop">
            
			<div class="payment-systems">
            <img style="position:relative;" src="{{ asset('img/uploads/footer-logo1.jpg') }}" alt="">
			<img style="position:relative;" src="{{ asset('img/uploads/footer-logo2.jpg') }}" alt="">
            <img style="position:relative;" height="35" src="{{ asset('img/uploads/astropay-logo-white-background.png?v=1.1') }}" alt="">
			<img style="position:relative;" height="35" src="{{ asset('img/uploads/jeton-logo-white-background.png?v=1.1') }}" alt="">
			<img style="position:relative;" height="60" src="{{ asset('img/uploads/paykasa.png?v=1.1') }}" alt="">
			</div>
			
			<div class="payment-systems">
            <img style="position:relative;" height="35" src="{{ asset('img/uploads/paysec-logo-white-background.png?v=1.1') }}" alt="">
            <img style="position:relative;" src="{{ asset('img/uploads/footer-logo3.jpg') }}" alt="">
			<img style="position:relative;" src="{{ asset('img/uploads/footer-logo4.jpg') }}" alt="">
            <img style="position:relative;" src="{{ asset('img/uploads/qiwi-logo-white-background.png?v=1.1') }}" alt="">
            <img style="position:relative;" height="45" src="{{ asset('img/uploads/yandex-1.png') }}" alt="">
			<img  src="{{ asset('img/uploads/footer-logo6.jpg') }}" alt="">
			
            </div>
			
			
        </div>
		
		  <div class="payment-systems-wrapper d-none on-mobile">
            
			<div class="payment-systems">
            <img style="position:relative;" src="{{ asset('img/uploads/footer-logo1.jpg') }}" alt="">
			<img style="position:relative;" src="{{ asset('img/uploads/footer-logo2.jpg') }}" alt="">
            <img style="position:relative;" height="35" src="{{ asset('img/uploads/astropay-logo-white-background.png?v=1.1') }}" alt="">
			<img style="position:relative;" height="35" src="{{ asset('img/uploads/jeton-logo-white-background.png?v=1.1') }}" alt="">
			<img style="position:relative;" height="60" src="{{ asset('img/uploads/paykasa.png?v=1.1') }}" alt="">
			</div>
			
			<div class="payment-systems">
            <img style="position:relative;" height="35" src="{{ asset('img/uploads/paysec-logo-white-background.png?v=1.1') }}" alt="">
            <img style="position:relative;" src="{{ asset('img/uploads/footer-logo3.jpg') }}" alt="">
			<img style="position:relative;" src="{{ asset('img/uploads/footer-logo4.jpg') }}" alt="">
            <img style="position:relative;" src="{{ asset('img/uploads/qiwi-logo-white-background.png?v=1.1') }}" alt="">
            <img style="position:relative;" height="45" src="{{ asset('img/uploads/yandex-1.png') }}" alt="">
			<img  src="{{ asset('img/uploads/footer-logo6.jpg') }}" alt="">
			
            </div>
			
			
        </div>


        <div class="payment-systems-wrapper provider-systems-wrapper">
            <div class="payment-systems">
                <img src="{{ asset('/img/providers/netent.png') }}" alt="">
                <img src="{{ asset('/img/providers/betsoft.png') }}" alt="">
                <img src="{{ asset('/img/providers/evolution.png') }}" alt="">
                <img src="{{ asset('/img/providers/microgaming.png') }}" alt="">
                <img src="{{ asset('/img/providers/RNG_Certified.png') }}" alt="">
            </div>
			
			<div class="payment-systems">
                <img width="150" src="{{ asset('/img/providers/ezugi.png') }}" alt="">
                <img width="150" src="{{ asset('/img/providers/habanero.png') }}" alt="">
                <img width="150" src="{{ asset('/img/providers/isoftbet.png') }}" alt="">
                <img width="150" src="{{ asset('/img/providers/quickspin.png') }}" alt="">
            </div>
			
        </div>


        <div class="footer-big-text-wrapper">
	    <span class="">
		BetTend – Play Casino, Live Casino, Slots, Poker, Bingo and Sportsbook online
		<br/>BetTend has one of the largest selections of casino games. Play casino games like Roulette, Slots, Blackjack and lots more. For new players here at BeTend our welcome package gives you a 100% on the first deposit.
		<br/>www.bettend.com is part of the Lancelin Colec KFT. This website is operated by Lancelin Colec KFT, a company registered under the laws of Hungry with registration number: 01-09-334496, registered address: 1113 Budapest, Kenese utca 3. The www.bettend.com website is operating under license of FairGame G.P. N.V. with registration number: 141938, and registered address: Curacao, PO Box 3421, Abraham de Veerstraat 9 part of the Lancelin Colec KFT, a company licensed and regulated by the laws of Curacao and has its sublicense issued by Gaming Services Provider N.V. #365/JAZ, license number GLH-OCCHKTW0703032017. </span>
            <div class="logo-footer logo-footer-add">
                <div class="year_limit pull-left">
                    <span>18+</span>
                </div>
            </div>
        </div>

        <div class="all-right-reserved-wrapper">
            <div class="text-center" style="position:relative;padding-top:25px;">
                <IFRAME SRC="https://licensing.gaming-curacao.com/validator/?lh=21c0bec8198be1c2d52fe40bb0af4961&template=tseal" WIDTH=150 HEIGHT=50 STYLE="border:none;"></IFRAME> 

				<!--<a href="https://licensing.gaming-curacao.com/getcode/?lh=21c0bec8198be1c2d52fe40bb0af4961" target="_blank">
				<img width="150" height="50" src="{{ asset('/img/gc-logo.png') }}">
				</a> -->
			</div>
            <span>{{ __('about.welcome')}} {{ env('APP_NAME') }}</span>
        </div>

    </div>
</footer>
