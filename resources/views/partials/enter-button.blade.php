<?php if(isset($active_menu)){ if($active_menu != 'sport'){  ?>
@if(\Auth::user() != null)
    <div class="deposit-button-wrapper deposit-button-wrapper-casino">
        <div class="depos-btn-up">
            @if(!empty($player_balance))<span>{{$player_balance->totalBalance->amount}}</span><span class="symbol_currency"> {{$currency_symbol}} @endif</span>
        </div>
        <div class="depos-btn-down">
            <div class="depos-wrap">
                <i class="icon-deposit-fgcasino" aria-hidden="true"></i><br>
                <span>{{ __('common.deposit')}}</span>
            </div>
        </div>
    </div>
@else
    <div class="deposit-button-wrapper deposit-button-wrapper-casino signin-wrapper account-trigger">
        <div class="depos-btn-down">
            <div class="depos-wrap">
                <i class="icon-vxod" aria-hidden="true"></i><br>
                <span>{{ __('common.enter')}}</span>
            </div>
        </div>
    </div>
@endif
<?php }}else{?>
	
	@if(\Auth::user() != null)
    <div class="deposit-button-wrapper deposit-button-wrapper-casino">
        <div class="depos-btn-up">
            @if(!empty($player_balance))<span>{{$player_balance->totalBalance->amount}}</span><span class="symbol_currency"> {{$currency_symbol}} @endif</span>
        </div>
        <div class="depos-btn-down">
            <div class="depos-wrap">
                <i class="icon-deposit-fgcasino" aria-hidden="true"></i><br>
                <span>{{ __('common.deposit')}}</span>
            </div>
        </div>
    </div>
@else
    <div class="deposit-button-wrapper deposit-button-wrapper-casino signin-wrapper account-trigger">
        <div class="depos-btn-down">
            <div class="depos-wrap">
                <i class="icon-vxod" aria-hidden="true"></i><br>
                <span>{{ __('common.enter')}}</span>
            </div>
        </div>
    </div>
@endif
<?php	
} ?>