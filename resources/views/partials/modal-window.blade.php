<!--modal-window-->

<div class="modal-window">
    <div class="modal-bg"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            
			<div class="modal-notification">
				<h2 class="title">Success</h2>
				<p>Congratulations for successfully depositing money, Your updated balance would be reflected in balance section.</p>
				  <button class="button-modal" onclick="$('.modal-notification').hide();$('.modal-window').css('opacity','0');$('.modal-window').css('display','none')">DONE</button>
			</div> 
<?php if(isset($casino_type)){	?>
			<div class="modal-providers-popup">
			<div class="logo">
                    <a href="/"><img src="{{ asset('/img/main-logo.svg') }}" alt=""></a>
				</div>
				
			 <?php $vendors = \App\Helpers\Functions::getGameVendors($casino_type); ?>
				<div class="row" style="padding-top:20px;padding-bottom:20px;">
			
				@foreach ($vendors as $vendor)
                    <div class="col-12 col-sm-12 col-lg-6 col-md-6" style="text-align:center"><a class="provider-item" href="" data-vendor-id="{{ $vendor->id }}">@if($vendor->display_name != null) {{ $vendor->display_name}} @else {{$vendor->name}}@endif</a></div>
                @endforeach
					
				
			</div>
			</div> 	
		<?php	} ?>
			<div class="deposit-active-wrapper" style="z-index:99999 !important">
				<span class="close-modal">
                <i class="icon-cancel-music" aria-hidden="true"></i>
            </span>
                <div class="logo">
                    <a href="/"><img src="{{ asset('/img/main-logo.svg') }}" alt=""></a>
                </div>
                <form class="deposit-form" role="form" action="{{ URL::to('/deposit') }}" method="post">
                    @if(Auth::user())
                        <?php $balanceObj = App\StaygamingBO::getBalanceByPlayerId(Auth::user()->player_id); ?>
                        <?php $playerInfo = \App\Helpers\Functions::getPlayerInfo(); ?>
                        <?php $bonuses = \App\Helpers\Functions::getBonusesList(); ?>

                    {{csrf_field()}}
                    <input type="hidden" name="depo_url" value="{{ \App\Helpers\Functions::getDepositUrl() }}">
                    <input type="hidden" class="bo_url" value="{{ env('BO_URL') }}">

                    <input type="hidden" name="player_id" value="{{ $playerInfo->id }}"/>
                    {{--<input type="hidden" name="new_card" value="1" id="depositNewCard">--}}
                    <input type="hidden" name="cardtype" value="VISA">


	
                    <input type="hidden" name="account_type" value="live">
                    <input type="hidden" name="first_name" value="{{ $playerInfo->name }}">
                    <input type="hidden" name="last_name" value="{{ $playerInfo->name }}">
                    <input type="hidden" name="email" required="" value="{{ $playerInfo->email }}">
                    <input type="hidden" name="address" required="" value="{{ $playerInfo->address }}">
                    <input type="hidden" name="city" required="" value="{{ $playerInfo->city }}">
                    <input type="hidden" name="state" value="{{ $playerInfo->city }}">
                    <input type="hidden" name="country" value="{{ $playerInfo->country->iso_code_2 }}">
                    <input type="hidden" name="country_three" value="{{ $playerInfo->country->iso_code_3 }}"/>
                    <input type="hidden" name="zip" value="{{ $playerInfo->zip }}">
                    <input type="hidden" name="currency" value="{{ $playerInfo->currency->char_code }}">
                    <input type="hidden" name="merchant_id" value="{{env('MERCHANT_ID')}}">
                    <input type="hidden" name="mobile" value="{{ $playerInfo->phone }}">
                    <input type="hidden" name="payment_method" value="RAVEDIRECTFP">

                @endif

                    <div class="deposit-active">
                        <div class="deposit-title">{{ __('common.payment_method')}}:</div>
                        <div class="col-right-func-selects deposit-active-dropdown">
                            <div class="col-right-func-select col-right-func-number-select">
                                <span class="col-right-func-select-header" data-gateway_selected="RAVEDIRECTFP">Visa Card</span>
                                <div class="col-right-func-select-toggle">
                                    <i class="icon-svernut-dly-vsex-stranic"></i>
                                </div>
                                <div class="col-right-func-select-options-wrapper">
                                    <ul class="col-right-func-select-options">
                                        <li data-gateway_name="RAVEDIRECTFP" img="{{ asset('/img/payments/logo_creditcard.png') }}">Visa Card</li>
										<li data-gateway_name="RAVEDIRECTFP" img="{{ asset('/img/payments/logo_creditcard.png') }}">Master Card</li>
                                        <li data-gateway_name="JETON" img="{{ asset('/img/payments/jeton-logo.svg') }}">Jeton</li>
                                        <li data-gateway_name="PAYKASA" img="{{ asset('/img/payments/paykasa.png') }}">PayKasa</li>
										<li data-gateway_name="ECOPAYZ" img="{{ asset('/img/payments/ecopayz.png') }}">Ecopayz</li>
										<li data-gateway_name="SKRILL" img="{{ asset('/img/payments/skrill.png') }}">Skrill</li>
										<li data-gateway_name="NETELLER" img="/../../img/payment-systems/neteller.png">Neteller</li>
                                    </ul>
                                </div>
                                <div class="img-deposit">
                                    <img src="{{ asset('/img/payments/logo_creditcard.png') }}" alt="Cards">
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="deposit-title">{{ __('Введите промокод') }}</div>
                        <div class="deposit-price-wrapper">
                            <div class="input-wrapper">
                                <input type="text" class="jq_deposit_bonus" value="">
                            </div>
                        </div>
                        -->
						
                        <div class="deposit-title">{{ __('common.amount') }}</div>
                        <div class="deposit-price-wrapper">
                            <div class="input-wrapper">
                                <input type="text" class="jq_deposit_bonus" name="amount" value="">
                            </div>
                        </div>
						@if(Auth::user())
						@if(count($bonuses)>0)
                   
                         <div class="deposit-title">{{ __('common.bonus') }}</div>
						 <div class="deposit-price-wrapper">
                            <div class="input-wrapper">
							 <select class="form-control" class="jq_deposit_bonus" name="bonus_id">
                                <option value="0">{{ __('common.select_bonus') }}</option>

                                @foreach($bonuses as $bonus)
                                    <option value="{{ $bonus->id }}">{{ $bonus->title }}</option>
                                @endforeach
                            </select>
							</div>
							</div>
						
                   
                @else
                    <input type="hidden" name="bonus_id" value="0">
                @endif
				@endif

                        <button class="button-modal jq_add_deposit" type="submit">{{ __('registration.proceed')}}</button>
                        <p style="text-align:center;color:#cdf7ec;font-size:10px; margin-top:20px;">Suite 8042, 4 Fullarton Street, Ayr KA7 1UB, UK <br>+44 2392 16 2243<br>MACOUN COMMERCE LP.</p>
                    </div>
                </form>

            </div>
			
				
			
			<div class="modal-deposite-frame-wrapper" style="display: block;background:linear-gradient(to bottom, #215f4f, #1a473a);height:600px;width:100%;padding-left:0px;padding-right:0px;">
				  <div class="logo">
                    <a href="/"><img src="{{ asset('/img/main-logo.svg') }}" alt=""></a>
                </div>
				<iframe src='' style="position:relative;height:100%;width:100%;padding:0px;border:none;">
				
				</iframe>
			</div>      
			
            <div class="password-recovery-wrapper">
                <!-- <iframe class="recovery_pas_iframe" src="TAIN_MERCHANT_URL/embedded/user/forgotpassword?lang={{App::getLocale()}}" border="0"></iframe> -->
            <!--<div class="input-password-recovery">
                        <span><i class="icon-messages" aria-hidden="true"></i></span>
                        <input class="modal-input" type="text" placeholder="{{ __('Введите ваш E-mail')}}">
                </div>
                <button class="button-modal">{{ __('отправить')}}</button>-->
                <h5>{{ __('auth.not_registered')}}? <a class="register-modal">{{ __('auth.create_account')}}</a></h5>
            </div>
            @if (!isset($playerInfo) && empty($playerInfo))
                @include('partials.login-popup')
				
				
				
				<div id="createaccount-form-modal" style="overflow-x:hidden" class="createaccount createaccount-form">
                    <div class="boxes-holder choise-register">
                        <h1>{{ __('auth.select_reg_type')}}</h1>
                        <a class="button-modal quick-register-start">{{ __('auth.quick_registration')}}</a>
                        <a class="button-modal full-register-start">{{ __('auth.full_registration')}}</a>
                    </div>

                    <!-- full-register 1-->
                    <div class="boxes-holder full-register-block">
                        <form action="{{ URL::to('/player/register') }}"  method="post" id="full-register-form-1">
                            {{ csrf_field() }}
                            <input type="hidden" name="full_merchant_id" id="full_merchant_id" value="{{ env('MERCHANT_ID') }}">
                            <div class="box box-1 full-register-block-1">
                                <h1>{{ __('auth.create_free_account')}}<br>{{ __('auth.in_2_easy_steps')}}</h1>
                                <fieldset>
                                    <div class="form-row info">
                                        <label>{{ __('registration.login')}}</label>
                                        <input autocomplete="off" data-exist="empty"  name="full_playerName" id="full_playerName" class="tippeable no-space no-comma" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('registration.use_eng_letters')}}" data-err-1="{{ __('registration.user_name_too_short')}}" data-err-2="{{ __('registration.user_exists')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row firstName">
                                        <label>{{ __('registration.first_name')}}</label>
                                        <input name="firstName" id="full_firstName" nanme="full_firstName" class="tippeable no-comma" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('registration.use_eng_letters')}}" data-err-1="{{ __('registration.enter_a_name')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>

                               
                                <fieldset>
                                    <div class="form-row email">
                                        <label>E-mail</label>
                                        <input name="full_email" id="full_email" class="tippeable no-space no-comma" original-title="" type="email">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный E-mail')}}"  data-err-2="{{ __('registration.user_email_exists')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row register_currency_small">
                                        <label>{{ __('registration.currency')}}</label>
                                        <div class="col-right-func-select col-right-func-number-select currency-select">
                                            <?php $currencies = \App\Helpers\Functions::getCurrencies(); ?>
                                            <span class="col-right-func-select-header">{{ \reset($currencies)->char_code }}</span>
                                            <div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                            <div class="col-right-func-select-options-wrapper">
                                                <ul class="col-right-func-select-options">
                                                    @foreach ($currencies as $currency)
                                                        <li class="currency-select-js" data-currency="{{ $currency->id }}" title="{{ $currency->char_code }}">{{ $currency->char_code }}</li>
                                                    @endforeach
                                                </ul>
                                                <input type="hidden" value="{{ \reset($currencies)->id }}" id="full_currency" name="full_currency">
                                            </div>
                                        </div>
                                    </div>
                             
                                </fieldset>

                                <fieldset>
                                    <div class="form-row date-birthday">
                                        <label>{{ __('registration.birthdate')}}</label>
                                        <div class="birthday-day-input">
                                            <input type="text" class="tippeable jq_date" id="full_jq_date" name="full_jq_date" value="" min="1" max="31" maxlength="2" placeholder="01"/>
                                           
                                        </div>
                                        <div class="col-right-func-select col-right-func-number-select birthday-month">
                                            <span class="col-right-func-select-header">{{ __('common.january')}}</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                            <div class="col-right-func-select-options-wrapper">
                                                <ul class="col-right-func-select-options">
                                                    <li class="b-month-select" data-b-month="01">{{ __('common.january')}}</li>
                                                    <li class="b-month-select" data-b-month="02">{{ __('common.february')}}</li>
                                                    <li class="b-month-select" data-b-month="03">{{ __('common.march')}}</li>
                                                    <li class="b-month-select" data-b-month="04">{{ __('common.april')}}</li>
                                                    <li class="b-month-select" data-b-month="05">{{ __('common.may')}}</li>
                                                    <li class="b-month-select" data-b-month="06">{{ __('common.june')}}</li>
                                                    <li class="b-month-select" data-b-month="07">{{ __('common.july')}}</li>
                                                    <li class="b-month-select" data-b-month="08">{{ __('common.august')}}</li>
                                                    <li class="b-month-select" data-b-month="09">{{ __('common.september')}}</li>
                                                    <li class="b-month-select" data-b-month="10">{{ __('common.october')}}</li>
                                                    <li class="b-month-select" data-b-month="11">{{ __('common.november')}}</li>
                                                    <li class="b-month-select" data-b-month="12">{{ __('common.december')}}</li>
                                                </ul>
                                            </div>
                                            <input type="hidden" value="01" id="full_b_month" name="full_b_month">
                                        </div>
                                        <div class="birthday-year-input">
                                            <input type="text" class="tippeable jq_year" name="full_jq_year" id="full_jq_year" value="" min="1900" max="2017" maxlength="4" placeholder="1930"/>
                                           
                                        </div>
                                       
                                        <span class="regs_error" data-err-1="{{ __('Заполните дату рождения')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>

                                <button class="button-modal full-register-next-step-reg pull-left">
                                    {{ __('registration.proceed')}}
                                </button>
                               
                            </div>
                            </form>
                            <!-- full-register 2-->
                            <form action="{{ URL::to('/player/register') }}" method="post" id="full-register-form-2" data-step="full-registration-complete">
                             <div class="box box-2 full-register-block-2">
                             
                                <h2>{{ __('registration.last_step')}}</h2>
                                <fieldset>
                                    <div class="form-row">
                                        <label>{{ __('registration.country')}}</label>
                                        <div class="col-right-func-select col-right-func-number-select w100_992">
                                            <?php $countries = \App\Helpers\Functions::getCountries(); ?>
                                            <span class="col-right-func-select-header">{{ \reset($countries)->iso_code_3 }}</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                            <div class="col-right-func-select-options-wrapper">
                                                <ul class="col-right-func-select-options">
                                                    <?php $countries = \App\Helpers\Functions::getCountries(); ?>
                                                    @foreach($countries as $country)
                                                        <li class="country-select" data-country-code="{{ $country->id }}">{{ $country->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <input type="hidden" value="1" name="full_country" id="full_country">
                                    </div>
                                    <div class="form-row city">
                                        <label>{{ __('registration.city')}}</label>
                                        <input name="full_city" id="full_city" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Введите город')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>

                                </fieldset>
                                <fieldset>
                                    <div class="form-row address">
                                        <label>{{ __('registration.address')}}</label>
                                        <input autocomplete="off" name="full_address" id="full_address" class="tippeable no-comma" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Введите адрес')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row zip">
                                        <label>{{ __('registration.postcode')}}</label>
                                        <input name="full_zip" id="full_zip" class="tippeable no-comma" original-title="" type="number">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Индекс слишком короткий')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-row phone">
                                        <label>{{ __('registration.phone')}}</label>
                                        <input autocomplete="off" name="full_phone" placeholder="+xxxxxxxxxxxx" id="full_phone" class="tippeable no-comma" original-title="" type="number">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный номер')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row register_bonus_code">
                                        <label>{{ __('registration.promo_code')}}</label>
                                        <input  name="full_bonusCode"  id="full_bonusCode" class="tippeable" type="text">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-row pass">
                                        <label>{{ __('registration.password')}}</label>
                                        <input autocomplete="new-password" name="full_password" id="full_password" class="tippeable" original-title="" type="password">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Пароль слишком короткий')}}" data-err-2="{{ __('Нужны по крайней мере, один строчный символ, один символ верхнего регистра и одна цифра')}}" ></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row repeat_pass">
                                        <label>{{ __('registration.confirm_password')}}</label>
                                        <input autocomplete="new-password" id="full_retypePassword" name="full_retypePassword" class="tippeable" original-title="" type="password">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный пароль')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-row check-terms">
                                        <label class="cust_checkbox_label">
                                            <input type="checkbox"  id="full_check_terms" name="full_check_terms" class="cust_checkbox"/>
                                            <span>{{ __('registration.agreement')}}</span> <a href="/info#terms_of_use" style=" color: #fff;">{{ __('registration.terms_conditions_link')}}</a>
                                            <span class="regs_error" data-err-1="{{ __('Соглашение с правилами и условиями обязательно при регистрации в проекте BetTend')}}"></span>
                                        </label>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>
                                <button class="register-modal-back-choce-1 pull-left">
                                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                </button>
                                <button class="button-modal next-step-reg" id="full-register-button">
                                    {{ __('registration.register')}}
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- quick-register -->
                    <div class="boxes-holder quick-register-block" action="{{ URL::to('/player/register') }}">
                        <form action="{{ URL::to('/player/register') }}" method="post" id="quick-register-form" data-step="quick-registration-complete">
                            {{ csrf_field() }}
                            <input type="hidden" name="quick_merchant_id" id="quick_merchant_id" value="{{ env('MERCHANT_ID') }}">
                            <div class="box box-1 quick-register-block-1">
                                <h1>{{ __('registration.create_free_account')}} <br> {{ __('registration.quick_registration')}}</h1>
                                <fieldset>
                                    <div class="form-row info">
                                        <label>{{ __('registration.full_name')}}</label>
                                        <input autocomplete="off" data-exist="empty" name="quick_playerName" id="quick_playerName" class="tippeable no-space no-comma" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Имя пользователя слишком короткое')}}" data-err-2="{{ __('Пользователь с таким именем уже зарегистрирован')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row register_currency">
                                        <label>{{ __('registration.currency')}}</label>
                                        <div class="col-right-func-select col-right-func-number-select currency-select">
                                            <?php $currencies = \App\Helpers\Functions::getCurrencies() ?>
                                            <span class="col-right-func-select-header">{{ \reset($currencies)->char_code }}</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                            <div class="col-right-func-select-options-wrapper">
                                                <ul class="col-right-func-select-options">
                                                    @foreach ($currencies as $currency)
                                                        <li class="quick-currency-select-js" data-currency="{{ $currency->id }}" title="{{ $currency->char_code }}">{{ $currency->char_code }}</li>
                                                    @endforeach
                                                </ul>
                                                <input type="hidden" value="{{ \reset($currencies)->id }}" id="quick_currency" name="quick_currency">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-row pass">
                                        <label>{{ __('registration.password')}}</label>
                                        <input autocomplete="new-password" name="quick_password" id="quick_password" class="tippeable" original-title="" type="password">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Пароль слишком короткий')}}" data-err-2="{{ __('Нужны по крайней мере, один строчный символ, один символ верхнего регистра и одна цифра')}}" ></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row repeat_pass">
                                        <label>{{ __('registration.confirm_password')}}</label>
                                        <input autocomplete="new-password" id="quick_retypePassword" name="quick_retypePassword" class="tippeable" original-title="" type="password">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный пароль')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-row email">
                                        <label>E-mail</label>
                                        <input name="quick_email" id="quick_email" class="tippeable no-space no-comma" original-title="" type="email">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный E-mail')}}"  data-err-2="{{ __('Пользователь с таким E-mail уже зарегистрирован')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row quick_country_select">
                                        <label>{{ __('registration.country')}}</label>
                                        <div class="col-right-func-select col-right-func-number-select w100_992">
                                            <?php $countries = \App\Helpers\Functions::getCountries(); ?>
                                            <span class="col-right-func-select-header">{{ \reset($countries)->name }}</span>
                                            <div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                            <div class="col-right-func-select-options-wrapper">
                                                <ul class="col-right-func-select-options">
                                                    @foreach($countries as $country)
                                                        <li class="quick-country-select" data-country-code="{{ $country->id }}">{{ $country->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <input type="hidden" value="1" name="quick_country" id="quick_country">
                                    </div>
                               
                                </fieldset>

                                <fieldset>
                                    <div class="form-row register_bonus_code">
                                        <label>{{ __('registration.enter_promocode')}}</label>
                                        <input  id="quick_bonusCode" name="quick_bonusCode" class="tippeable" type="text">
                                    </div>
                                    <div class="form-row date-birthday-quick">
                                        <label>{{ __('registration.birthdate')}}</label>
                                        <div class="birthday-day-input">
                                            <input type="text" class="tippeable jq_quick_date" name="jq_quick_date" id="jq_quick_date" value="" min="1" max="31" maxlength="2" placeholder="01"/>
                                            <input type="hidden" value="01" id="quick_day">
                                        </div>
                                        <div class="col-right-func-select col-right-func-number-select birthday-month">
                                            <span class="col-right-func-select-header">{{ __('common.january')}}</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                            <div class="col-right-func-select-options-wrapper">
                                                <ul class="col-right-func-select-options">
                                                    <li class="quick-month-select" data-b-month="01">{{ __('common.january')}}</li>
                                                    <li class="quick-month-select" data-b-month="02">{{ __('common.february')}}</li>
                                                    <li class="quick-month-select" data-b-month="03">{{ __('common.march')}}</li>
                                                    <li class="quick-month-select" data-b-month="04">{{ __('common.april')}}</li>
                                                    <li class="quick-month-select" data-b-month="05">{{ __('common.may')}}</li>
                                                    <li class="quick-month-select" data-b-month="06">{{ __('common.june')}}</li>
                                                    <li class="quick-month-select" data-b-month="07">{{ __('common.july')}}</li>
                                                    <li class="quick-month-select" data-b-month="08">{{ __('common.august')}}</li>
                                                    <li class="quick-month-select" data-b-month="09">{{ __('common.september')}}</li>
                                                    <li class="quick-month-select" data-b-month="10">{{ __('common.october')}}</li>
                                                    <li class="quick-month-select" data-b-month="11">{{ __('common.november')}}</li>
                                                    <li class="quick-month-select" data-b-month="12">{{ __('common.december')}}</li>
                                                </ul>
                                            </div>
                                            <input type="hidden" value="01" name="quick_month" id="quick_month">
                                        </div>
                                        <div class="birthday-year-input">
                                            <input type="text" class="tippeable jq_year_quick" id="jq_quick_year" name="jq_quick_year" value="" min="1900" max="2017" maxlength="4" placeholder="1930"/>
                                            <input type="hidden" value="{{ date("Y") }}" id="quick_year">
                                        </div>
                                        <input type="hidden" value="" id="quick_birthDate" name="quick_birthDate">
                                        <span class="regs_error" data-err-1="{{ __('Заполните дату рождения')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>

                                <input name="quick_register" type="hidden" value="true">
                                <fieldset>
                                    <div class="form-row check-terms">
                                        <label class="cust_checkbox_label">
                                            <input type="checkbox"  id="quick_check_terms" name="quick_check_terms" class="cust_checkbox"/>
                                            <span>{{ __('registration.agreement')}}</span> <a href="/info#terms_of_use" style=" color: #fff;">{{ __('registration.terms_conditions_link')}}</a>
                                            <span class="regs_error" data-err-1="{{ __('Соглашение с правилами и условиями обязательно при регистрации в проекте BetTend')}}"></span>
                                        </label>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>
                                <button class="button-modal" id="quick-register-button">
                                    {{ __('registration.register')}}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="boxes-holder complite-register-block">
                        <form action="" method="post" id="complite-register-promo">
                            {{ csrf_field() }}
                            <div class="box box-1 confirm-register-block-1">
                                <h1>{{ __('registration.success_1')}} <br> {{ __('registration.success_2')}}</h1>
                                <div class="divider"></div>
                                <p>{{ __('registration.success_3')}}</p>

                                <div class="divider"></div>

                            </div>
                        </form>
                    </div>

                    <div class="bonus-holder">
                        <div class="logo-wrapper">
                            <img class="logo" src="{{ asset('/img/main-logo.svg') }}">
                        </div>
                        <div class="bonus-wrapper">
                            <img class="bonus" src="{{ asset('/img/modal-bg.jpg') }}">
                            <div class="bonus-wrapper-text">
                            <!--{{ __('Мы')}} <strong>{{ __('дарим 600$') }} </strong> {{ __('на первый депозит') }}-->
                            </div>
                        </div>
                        <div class="logo-wrapper hide_el"></div>
                        <div class="secure">
                           
                        </div>
                    </div>
                </div>
            @endif
			
			
			
			
            <span class="close-modal">
                <i class="icon-cancel-music" aria-hidden="true"></i>
            </span>
        </div>
    </div>
    @if (isset($playerInfo) && !empty($playerInfo))
		
        <div class="modal-account account">

            <div class="row">
                <label class="account-category-select-label">{{ __('common.select_category')}}</label>
                <div class="col-right-func-selects account-category-select">
                    <div class="col-right-func-select col-right-func-number-select">
                        <span class="col-right-func-select-header jq_mobile_header_selected">{{ __('common.profile')}}: {{ __('common.personal_information')}}</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                        <div class="col-right-func-select-options-wrapper">
                            <ul class="col-right-func-select-options">
                                <li category="profile" inner="profile">{{ __('common.profile')}}: {{ __('common.personal_information')}}</li>
                                <li category="profile" inner="change-password">{{ __('common.profile')}}: {{ __('common.change_password')}}</li>
                                <li category="balance" inner="balance">{{ __('common.deposite')}}: {{ __('common.balance')}}</li>
                                <li category="withdraw" inner="withdraw">{{ __('common.withdraw')}}: {{ __('common.withdraw')}}</li>
                                <li category="withdraw" inner="processed" data-id="withdraw-history" class="jq_get_history">{{ __('common.withdraw')}}: {{ __('common.transactions')}}</li>
                                <li category="bonus" inner="bonus">{{ __('common.bonus')}}: {{ __('common.bonus')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 menu-mobile" style="display:none;margin:0 auto;z-index:100">
                    <i class="fa icon-logo5"></i>
                    <div style="margin-top:-20px">
                        <div class="inner-addon right-addon mm-menu">
                            <div class="field-label">{{ __('common.account')}}:</div>
                            <div style="position:relative">
                                <select id="mobile-menu" style="width:100%;border:0;border-radius:7px;background-color:#04404b;color:#fff;padding:8px;font-size:18px" class="choose_state">
                                    <option value="profile">{{ __('common.profile')}}: {{ __('common.personal_information')}}</option>
                                   <!-- <option value="verification">{{ __('common.profile')}}: {{ __('Проверка')}}</option> -->
                                    <option value="change-password">{{ __('common.profile')}}: {{ __('common.change_password')}}</option>
                                    <option value="balance">{{ __('common.deposit')}}: {{ __('common.balance')}}</option>
                                   <!-- <option value="dep-history">{{ __('Депозит')}}: {{ __('История оплаты')}}</option> -->
                                    <option value="withdraw">{{ __('common.withdraw')}}: {{ __('common.withdraw')}}</option>
                                    <option value="processed">{{ __('common.withdraw')}}: {{ __('common.transactions')}}</option>
                                    <option value="bonus">{{ __('common.bonus')}}: {{ __('common.bonus')}}</option>
                                </select>
                                <select id="self-menu" style="display:none;width:100%;border:0;border-radius:7px;background-color:#04404b;color:#fff;padding:8px;font-size:18px" class="choose_state">
                                    <option value="limits">Safety: Limits</option>
                                </select>
                                <div class="dblarrow" style="z-index:9999;position:absolute;top:14px;right:10px;pointer-events:none"><b></b><i></i></div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div><i class="mobile-current">Profile: Overview</i></div>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="col-sm-2 menu-pc">
                    <div class="menu-item current" data-id="profile"><i class="icon-account-fgcasino"></i>{{ __('common.profile')}}</div>
                    <div class="menu-item" data-id="balance"><i class="icon-deposit-fgcasino"></i>{{ __('common.deposit')}}</div>
                    <div class="menu-item" data-id="withdraw"><i class="icon-vyvod-panel"></i>{{ __('common.withdraw')}}</div>
                    <div class="menu-item" data-id="bonus"><i class="icon-bonusy-panel"></i>{{ __('common.bonus')}}</div>
                    <div>
                        <a href="/logout" class="btn btn-block logoff">{{ __('common.logout')}}</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 mobile-no-padding menu-main" style="text-align: center; padding: 24px; min-height: 0px;">
                    <div style="margin:0 auto;">
                        <div class="row sub-items profile" parent-id="profile" style="display: block;">
                            <div data-id="profile" class="col-xs-6 padding-none sub-item current">{{ __('common.personal_information')}}</div>
                            <!--<div data-id="verification" class="col-xs-4 padding-none sub-item">{{ __('Проверка')}}</div>-->
                            <div data-id="change-password" class="col-xs-6 padding-none sub-item">{{ __('common.change_password')}}</div>
                        </div>
                        <div class="row sub-items balance" parent-id="balance" style="display: none;">
                            <div data-id="balance" class="col-xs-12 padding-none sub-item current">{{ __('common.balance')}}</div>
                        <!--    <div data-id="deposit-limits-block" class="col-xs-4 padding-none sub-item">{{ __('Лимит депозита')}}</div>-->
                        <!--<div data-id="game-history" class="col-xs-4 padding-none sub-item">{{ __('История')}}</div>-->
                        <!--    <div data-id="dep-history" class="col-xs-4 padding-none sub-item jq_get_history">{{ __('common.payment_history')}}</div> -->
                        </div>
                        <div class="row sub-items withdraw" parent-id="withdraw" style="display: none;">
                            <div data-id="withdraw" class="col-xs-4 padding-none sub-item current">{{ __('common.new_withdraw')}}</div>
                        <!--<div data-id="pending" class="col-xs-4 padding-none sub-item">{{ __('Ожидает')}}</div>-->
                            <div data-id="processed" class="col-xs-4 padding-none sub-item jq_get_history_withdrawal">{{ __('common.transactions')}}</div>
							<div data-id="bank_account" class="col-xs-4 padding-none sub-item jq_get_bank_details">{{ __('common.my_accounts')}}</div>
                        </div>
                        <div class="row sub-items bonus" parent-id="bonus" style="display: none;">
                            <div data-id="bonus" class="col-xs-12 padding-none sub-item current">{{ __('common.bonuses')}}</div>
                        </div>
                        <div class="mobile-no-padding account-content-tab profile-content-wrapper" style="padding-top:9px; display: block;">
                            <div class="profile-tab-content" style="display: block;">
                                <form name="account" id="edit_profile_form">
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>{{ __('registration.login')}}</label>
                                                <input disabled="" name="edit_username" id="edit_username" autocomplete="off" class=" readonly" tabindex="1" value="@if (isset($playerInfo) && !empty($playerInfo)){{$playerInfo->username}}@endif" type="text" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('registration.full_name')}}</label>
                                                <input name="edit_name" id="edit_name" autocomplete="off" class="" tabindex="3" value="<?php if($playerInfo->username != $playerInfo->name){ echo $playerInfo->name; }else{ echo ""; } ?>" type="text"></div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('registration.country')}}</label>
                                                <input name="edit_country" id="edit_country" autocomplete="off" class="" value="@if (isset($playerInfo) && !empty($playerInfo)){{$playerInfo->country->name}}@endif" disabled="" type="text" >
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('registration.city')}}</label>
                                                <input name="edit_city" id="edit_city" autocomplete="off" class="" value="@if (isset($playerInfo) && !empty($playerInfo)){{$playerInfo->city}}@endif" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('registration.address')}}</label>
                                                <input name="edit_address" id="edit_address" autocomplete="off" class="no-comma" tabindex="2" value="@if (isset($playerInfo) && !empty($playerInfo)){{$playerInfo->address}}@endif" type="text" >
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('registration.postcode')}}</label>
                                                <input name="edit_zip" id="edit_zip" autocomplete="off" class="" tabindex="4" value="@if (isset($playerInfo) && !empty($playerInfo)){{$playerInfo->zip}}@endif" type="text">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>E-mail</label>
                                                <input name="edit_email" id="edit_email" autocomplete="off" disabled class=" readonly" tabindex="1" value="@if (isset($playerInfo) && !empty($playerInfo)){{$playerInfo->email}}@endif" type="text" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('registration.phone')}}</label>
                                                <div>
                                                    <div>
                                                        <input autocomplete="off" class="" name="edit_phone" id="edit_phone" value="@if (isset($playerInfo) && !empty($playerInfo)){{$playerInfo->phone}}@endif" tabindex="9" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('registration.birthdate')}}</label>
                                                <input name="edit_dob" id="edit_dob" autocomplete="off" class="" tabindex="7" value="<?php echo date('Y-m-d',strtotime($playerInfo->dob)); ?>" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row jq_succes_edit_profile hide_el">
                                        <div class="divider"></div>
                                        <p class="jq_update_success">{{ __('registration.profile_updated.successfully') }}</p>
                                        <div class="divider"></div>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="btn btn-block jq_edit_profile">{{ __('common.save') }}</button>
                                    </div>
                                </form>
                            </div>
                             <!-- <div class="verification-tab-content" style="display: none;">
                                <div class="row mobile-no-margin" style="margin-top:16px">
                                    <div class="field-left text-left">
                                        <div id="kyc-div" style="">
                                            @if(isset($playerInfo) && !empty($player_balance))
                                                <iframe id="kyc_iframe" src="{{ env('TAIN_MERCHANT_URL') }}/embedded/account/playerimageupload?sid={{ \Illuminate\Support\Facades\Cookie::get('tainSessionId') }}&lang={{App::getLocale()}}"></iframe>
                                            @else
                                                {{ __('На данный момент мы не требуем дополнительной проверки от Вас.')}}
                                            @endif
                                        </div>
                                        <div id="loading-kyc-pc" style="display: none;"></div>
                                    </div>
                                </div>
                            </div> -->
                           <div class="change-password-tab-content" style="display: none;">
                                <form id="change-password-form" autocomplete="off">
                                    <input type="text" style="display:none">
                                    <input type="password" style="display:none">
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left jq_new_pass">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>{{ __('common.new_password') }}</label>
                                                <input name="edit_new_password" id="edit_new_password" autocomplete="off" class="" style="display:inline-block" tabindex="1" value="" type="password" maxlength="25">
                                                <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Пароль слишком короткий')}}" data-err-2="{{ __('Нужны по крайней мере, один строчный символ, один символ верхнего регистра и одна цифра')}}" ></span>
                                                <div class="game-control-span-wrapper err-left"><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left jq_old_pass">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('common.repeat_password') }}</label>
                                                <input name="edit_confirm_password" id="edit_confirm_password" autocomplete="off" class="" style="display:inline-block" tabindex="2" value="" type="password" maxlength="25">
                                                <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Введите правильный пароль')}}"></span>
                                                <div class="game-control-span-wrapper err-left"><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="passord-accept field-left">
                                            <div class="divider"></div>
                                            <div class="inner-addon right-addon">
                                                <p class="jq_change_pass_mess">{{ __('common.password_changed')}}</p>
                                                <button name="submit" role="submit" tabindex="3" class="btn btn-change-password btn-block jq_change_password" style="padding:5px" href="#">Change Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                        </div>
                       <div class="mobile-no-padding account-content-tab balance-content-wrapper" style="padding-top:9px; display: none;">
                            <div class="balance-tab-content" style="display: block;">
                                <div class="row">
                                    <div class="col-xs-12 field-left">
                                        <div class="inner-addon right-addon mobile-no-margin">
                                            <div class="title">{{ __('common.withdrawn_money')}}:</div>
                                            <div class="money">0.00 @if(isset($playerInfo) && !empty($player_balance)) {{$currency_symbol}} @endif</div>
                                            <div class="divider"></div>
                                            <div class="title">{{ __('common.bonus')}}:</div>
                                            <div class="money display-bonus">
                                               
                                            </div>
                                            <div class="divider"></div>
                                            <div class="title">{{ __('common.balance')}}:</div>
                                            <div class="money display-balance"></div>
                                        </div>
                                    </div>
									<div class="row" style="position:relative;padding-bottom:25px">
												<div class="form-row col-xs-12 col-sm-12 field-left">
												<button type="button" class="btn jq_withdraw_submit deposit_btn_invoker" style="float:left;position:relative">{{ __('common.deposit')}}</button>
												</div>
											</div>	
                                </div>
                            </div>

                           <!-- <div class="deposit-limits-block-tab-content" style="display: none;">
                                <div class="row sub_deposit_item" style="display: block;">
                                    <div data-id="deposit-limits" class="col-xs-4 padding-none sub-item sub_items_deposits current">{{ __('Лимит депозита')}}</div>
                                    <div data-id="cool-off" class="col-xs-4 padding-none sub_items_deposits sub-item">{{ __('Самоограничение')}}</div>
                                    <div data-id="self-exclusion" class="col-xs-4 padding-none sub_items_deposits sub-item">{{ __('Блокировка аккаунта')}}</div>
                                </div>
                                <div class="deposit-limits-tab-content" style="display: block;">
                                    <iframe class="tcp_iframes" src=""></iframe>
                                </div>
                                <div class="cool-off-tab-content" style="display: none;">
                                    <iframe class="tcp_iframes" src=""></iframe>
                                </div>
                                <div class="self-exclusion-tab-content" style="display: none;">
                                    <iframe class="tcp_iframes" src=""></iframe>
                                </div>
                            </div> -->

                            <div class="game-history-tab-content" style="display: none;">
                                <div class="row played">
                                    <div class="col-xs-12 field-left padding-none">
                                        <div class="inner-addon right-addon mobile-no-margin">
                                            <div style="text-align:left">
                                                {{ __('Сыгранные игры')}} <i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="row mobile-no-margin">
                                    <div class="col-xs-11 col-sm-12 text-left padding-none">
                                        <div id="data-div">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th>{{ __('Дата')}}</th>
                                                    <th>{{ __('Игра')}}</th>
                                                    <th>{{ __('Ставка')}}</th>
                                                    <th>{{ __('Выигрыш')}}</th>
                                                    <th>{{ __('Бонус')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data-table">

                                                </tbody>
                                            </table>
                                            <div class="divider" style="margin:9px 0px 16px 0px"></div>
                                            <div style="margin-top:2px">
                                                <div id="data-showing" style="float:left">{{ __('Показано')}} 0 {{ __('из')}} 0 {{ __('ставок')}}</div>
                                                <button href="#" class="btn next" style="float:right;padding:5px;margin-left:2px" disabled="disabled">{{ __('След')}}</button>
                                                <button href="#" class="btn previous" style="float:right;padding:5px" disabled="disabled">{{ __('Пред')}}</button>
                                            </div>
                                        </div>
                                        <div id="loading-data-pc" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="dep-history-tab-content jq_head_transactions" style="display: none;">
                               @include('parts.transaction-history')
                            </div>
                        </div> 
                        <div class="mobile-no-padding account-content-tab withdraw-content-wrapper" style="padding-top:9px; display: none;">
                            <div class="withdraw-tab-content" style="display: block;width:100%">
                           <div class="row">
                                  <div class="col-xs-12 field-left">
                                        <div class="inner-addon right-addon mobile-no-margin">
                                        <form id="withdrawForm" action="{{ URL::to('/withdraw') }}" method="post">
										{{csrf_field()}}
                                        <input type="hidden" name="depo_url" value="{{ \App\Helpers\Functions::getDepositUrl() }}">
                                        <input type="hidden" class="bo_url" value="{{ env('BO_URL') }}">
                                        <input type="hidden" name="player_id" value="{{ $playerInfo->id }}"/>
                                        <input type="hidden" name="payment_method" value="RAVEDIRECTFP"/>
											<div class="row">
											<div class="form-row col-xs-12 col-sm-12 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('common.choose_withdraw_method')}}</label>
                                                <select name="select_withdraw_method" id="select_withdraw_method" spellcheck="false">
												<option value="RAVEDIRECTFP">Bank Transfer</option>
												<option value="SKRILL">Skrill</option>
												<option value="NETELLER">Neteller</option>
												</select>
                                            </div>
											</div>
											</div>		
											<div class="row">
											<div class="form-row col-xs-12 col-sm-12 field-left">
                                            <div class="inner-addon right-addon">
                                                <label id="amountLabel">{{ __('common.amount')}}</label>
                                                <input name="amount" id="amount" autocomplete="off" required="" value="0" min="10" type="number">
												
											</div>
											</div>
											</div>	
											<div class="row" style="position:relative;padding-bottom:25px">
												<div class="form-row col-xs-12 col-sm-12 field-left">
												<button type="submit" class="btn jq_withdraw_submit withdraw_fund_btn" style="float:left;top:15px;margin-right:15px;position:relative">{{ __('common.withdraw')}}</button>
												<button class="btn jq_withdraw_submit add_bank_account_btn" style="float:left;top:15px;position:relative">{{ __('common.add_bank_account')}}</button>
											
												</div>
											</div>	
											<div class="divider"></div>
											</form>
											
											<div class="title">{{ __('common.balance')}}:</div>
                                            <div class="money display-balance"></div>
											<div class="divider"></div>
                                            <div class="title">{{ __('common.wager')}}:</div>
                                            <div class="money display-wager"></div>
											
										</div>
										
									</div>
									
									
                                
								</div> 
								
							
								
							</div>
                            <div class="processed-tab-content" style="display: none;">
                                <div class="row mobile-no-margin">
                                    <div class="col-xs-12 col-sm-12 text-left" style="position:relative;padding-top:15px;">
                                    
                                            <table style="font-size:13px;" class="table table-bordered table-responsive">
                                                <thead>
                                                <tr><th colspan="5">{{ __('common.pending_transaction')}}</th></tr>
                                                <tr><th>Index</th><th>Date</th><th>Amount</th><th>Method</th><th>Action</th></tr>
												</thead>
                                                <tbody id="pending_transaction_table">
											
                                                </tbody>
                                            </table>
                                  
                                </div>
                            </div>
								</div>
							
							<div class="bank_account-tab-content jq_head_withdrawals" style="display:none">
								 <div class="withdraw-step-form-holder">
								 <form id="withdrawl-step-form" >
                                    
									<div class="row">
                                        <div class="form-row col-xs-12 col-sm-12 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>SWIFT</label>
                                                <input required="" spellcheck="false" name="modal-swift" id="modal-swift" autocomplete="off" tabindex="1" type="text">
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="form-row col-xs-12 col-sm-12 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>BANK NAME</label>
                                                <input required="" spellcheck="false" name="modal-bank-name" id="modal-bank-name" autocomplete="off" tabindex="1" type="text">
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="form-row col-xs-12 col-sm-12 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>BANK ADDRESS</label>
                                                <input required="" spellcheck="false" name="modal-bank-address" id="modal-bank-address" autocomplete="off" tabindex="1" type="text">
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="form-row col-xs-12 col-sm-12 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>PERSON NAME</label>
                                                <input required="" value="<?php echo $playerInfo->name; ?>" spellcheck="false" name="modal-user-name" id="modal-user-name" autocomplete="off" tabindex="1" type="text">
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="form-row col-xs-12 col-sm-12 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>IBAN</label>
                                                <input required="" spellcheck="false" name="modal-iban" id="modal-iban" autocomplete="off" tabindex="1" type="text">
                                            </div>
                                        </div>
                                    </div>
									
							 <div class="row">
								 <div class="form-row col-xs-12 col-sm-12 field-left">
								<button type="submit" class="btn jq_withdraw_submit" id="submit-withdraw-step" style="float:left;top:15px;position:relative">{{ __('common.add_bank_account')}}</button>
								</div>
								</div>
									
									</form>
									</div>
									<div class="bank-account-details-holder">
									 <div class="row" style="position:relative;top:20px;">
									 
                                            <table class="table table-responsive table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('Bank Name')}}</th>
                                                    <th>{{ __('Account Name')}}</th>
                                                    <th>{{ __('SWIFT')}}</th>
													<th>{{ __('IBAN')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody id="bank-details-table">

                                                </tbody>
                                            </table>
                                            
                                     </div>
									</div>
							</div>

                           

                        </div>
                        <div class="mobile-no-padding account-content-tab bonus-content-wrapper" style="padding-top:9px; display: none;">
                            <div class="bonus-tab-content balance-tab-content" style="display: block;">
                                 <div class="row">
                                    <div class="col-xs-12 field-left">
                                        <div class="inner-addon right-addon mobile-no-margin">
                                            <div class="title">{{ __('common.withdrawn_money')}}:</div>
                                            <div class="money">0.00 @if(isset($playerInfo) && !empty($player_balance)) {{$currency_symbol}} @endif</div>
                                            <div class="divider"></div>
                                            <div class="title">{{ __('common.bonus')}}:</div>
                                            <div class="money display-bonus">
                                               
                                            </div>
                                            <div class="divider"></div>
                                            <div class="title">{{ __('common.wager')}}:</div>
                                            <div class="money display-wager"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <a href="/logout" class="exit-profile-mobile">{{ __('common.logout')}}</a>
            <span class="close-modal">
            <i class="icon-cancel-music" aria-hidden="true"></i>
        </span>
        </div>
    @endif
</div>
<script>
    (function ($) {
        $(document).ready(function () {
            setTimeout(function () {
                $('.bonuses_list .jq_date_convert').each(function () {
                    var time = $(this).data('time');
                    if (time != '') {
                        var m = moment(time).format("YY/MM/DD HH:mm");
                        $(this).text(m);
                    }
                });
            }, 300);
        });

        setInterval(refreshToken, 3600000); // 1 hour

        function refreshToken() {
            $.get('refresh-csrf').done(function (data) {
                $('[name="_token"]').val(data);
            });
        }

    })(jQuery);
</script>
<!--END-modal-window-->
