<div class="main-casino-wrapper">
    @if(!isset($player_info) && empty($player_balance) && (Request::path() == 'poker' || Request::path() == 'casino' || Request::path() == 'bingo' || Request::path() == 'casino-live'))
    <div class="casino_promo_header">
        <p class="casino_promo_text_line1">{{ __('Мы дарим до') }} <span class="promo_money">{{ __(' 600$') }}</span></p>
        <p class="casino_promo_text_line2">{{ __('на первый депозит') }}</p>
        <a href="#" class="casino_promo_btn account-trigger" >{{ __('Открыть аккаунт') }}</a>
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
<div class="sport-header-container" style="padding-top:40px;padding-bottom:5px;width:100%;background:linear-gradient(to bottom,#7e7e7e,#3a3a3a,#282828);border-top:2px solid #7e7e7e">
<div class="main-casino-wrapper sport-header">
	
    <div class="logo" style="margin">
        <a href="/"><img src="{{ asset('img/main-logo.svg') }}" alt=""></a>
    </div>


    <div class="menu-line">

        <div class="main-menu">
            <nav>
                <ul style="float:left">
                    <li class="@if ($active_menu == 'casino') active @endif"><a href="/casino">{{ __('common.casino') }}</a></li>
                    <li class="@if ($active_menu == 'casino-live') active @endif"><a href="/casino-live">{{ __('common.casino_live') }}</a></li>
                    <li class="@if ($active_menu == 'sport') active @endif"><a href="/sport">{{ __('common.sport') }}</a></li>
                    <li class="@if ($active_menu == 'poker') active @endif"><a href="/poker">{{ __('common.poker') }}</a></li>
                    <li class="@if ($active_menu == 'bingo') active @endif"><a href="/bingo">{{ __('e-sport') }}</a></li>
					
					<li class="li-logo">
					<div class="logo">
					<a href="/"><img src="{{ asset('img/main-logo.svg') }}" alt=""></a>
					</div>
					</li>
			   </ul>
					<ul style="float:right">
                    <li class="nav-top-button"><a><span class="span-1 deposit_btn_invoker"></span><span class="span-2"></span></a></li>
					<li class="sports-book-profile account-window-trigger" style="display:none;top:5px;position:relative"><a href="">MY {{ __('common.profile') }}</a></li>
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

       
    </div>
   

</div>
</div>

<script>
$(document).ready(function(){
	if(mobile)
	{
		$('.main-casino-wrapper.sport-header .logo').show();
		$('.main-casino-wrapper.sport-header li.li-logo .logo').hide();
		$('.sport-header-container').css('padding-top','20px');
	}
	else
	{
		$('.main-casino-wrapper.sport-header .logo').hide();
		$('.main-casino-wrapper.sport-header li.li-logo .logo').show();
	}
	
	if(!logged)
	{
		$('.nav-top-button .span-1').html('Register');
		$('.nav-top-button .span-2').html('Login');
		$('.nav-top-button .span-1').addClass('span-2-login');
		$('.nav-top-button .span-2').addClass('span-2-login');
		$('.sports-book-profile').hide();
	}
	else
	{
		$('.nav-top-button .span-1').html('deposit');
		$('.nav-top-button .span-2').addClass('display-balance');
		$('.sports-book-profile').show();
	}
	
	$(document).on('click','.span-2-login',function(e){
		e.preventDefault();
		modalWindowOpen();
		loginEnter();
	});
	
	
	$('.menu_line_fixed').css('display','none');
	
});
</script>