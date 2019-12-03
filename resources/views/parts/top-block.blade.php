@include('partials.enter-button')
<?php if($active_menu != 'sport'){ ?>
<div class="bottom-menu-wrapper">
	<div class="bottom-menu">
		<ul>
			<li><a href="#" class="jq_scroll_to_top"><i class="icon-home2" aria-hidden="true"></i><br>{{ __('common.home')}}</a></li>
			<li><a href="/bonus"><i class="icon-bonusy-panel" aria-hidden="true"></i><br>{{ __('common.bonuses')}}</a></li>
			<li class="help-toggle"><a><i class="icon-help " aria-hidden="true"></i><br>{{ __('common.help')}}</a></li>
			<li class="withdrawl-window-trigger"><a><i class="icon-withdraw-fgcasino" aria-hidden="true"></i><br>{{ __('common.withdraw')}}</a></li>
			<li class="account-window-trigger"><a><i class="icon-account-fgcasino" aria-hidden="true"></i><br>{{ __('common.account')}}</a></li>
		</ul>
	</div>
</div>
<?php } ?>
<div class="mobile-search-wrapper">
	<input type="text" class="jq_search_input" value="" placeholder="{{ __('Поиск по играм')}}">
	<button><i class="fa fa-search" aria-hidden="true"></i></button>
</div>

<div class="hidden-mobile-menu">
	<nav>
		<ul>
			<li class="@if ($active_menu == 'casino') active @endif"><a href="/casino">{{ __('common.casino') }}</a></li>
			<li class="@if ($active_menu == 'casino-live') active @endif"><a href="/casino-live">{{ __('common.casino_live') }}</a></li>
			<li class="@if ($active_menu == 'sport') active @endif"><a href="/sport">{{ __('common.sport') }}</a></li>
			<li class="@if ($active_menu == 'poker') active @endif"><a href="/poker">{{ __('common.poker') }}</a></li>
			<li class="@if ($active_menu == 'bingo') active @endif"><a href="/bingo">{{ __('common.e_sports') }}</a></li>
		</ul>
		<i class="icon-close2"></i>
	</nav>
</div>

<div class="mobile-menu-toggle icon-Menu header-mobile-toggle"></div>
