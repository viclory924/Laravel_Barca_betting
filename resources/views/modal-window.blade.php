<!--modal-window-->
<div class="modal-window">
    <div class="modal-bg"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="deposit-active-wrapper">
                <div class="logo">
                    <a href="/"><img src="{{ asset('/img/main-logo.svg') }}" alt=""></a>
                </div>
                <div class="deposit-active">
                    <div class="deposit-title">{{ __('Выбрать метод пополнения')}}:</div>
                    <div class="col-right-func-selects deposit-active-dropdown">
                        <div class="col-right-func-select col-right-func-number-select">
                            <span class="col-right-func-select-header" data-gateway_selected="Neteller">Neteller</span>
                            <div class="col-right-func-select-toggle">
                                <i class="icon-svernut-dly-vsex-stranic"></i>
                            </div>
                            <div class="col-right-func-select-options-wrapper">
                                <ul class="col-right-func-select-options">
                                    <li data-gateway_name="ecoPayz" img="/img/payment-systems/ecopayz logo.png">ecoPayz</li>
                                    <li data-gateway_name="Neteller" img="/../../img/payment-systems/neteller.png">Neteller</li>
                                    <li data-gateway_name="Moneybookers" img="/../../img/payment-systems/skrill_img.png">Skrill</li>
                                </ul>
                            </div>
                            <div class="img-deposit">
                                <img src="{{ asset('/img/payment-systems/neteller.png') }}" alt="Neteller">
                            </div>
                        </div>
                    </div>
                    <div class="deposit-title">{{ __('Введите промокод') }}</div>
                    <div class="deposit-price-wrapper">
                        <div class="input-wrapper">
                            <input type="text" class="jq_deposit_bonus" value="">
                        </div>
                    </div>
                    <button class="button-modal jq_add_deposit">{{ __('Выбрать')}}</button>
                    <p style="text-align:center;color:#cdf7ec;font-size:10px; margin-top:20px;">Suite 8042, 4 Fullarton Street, Ayr KA7 1UB, UK <br>+44 2392 16 2243<br>MACOUN COMMERCE LP.</p>
                </div>
            </div>

            <div class="password-recovery-wrapper">
                <!-- <iframe class="recovery_pas_iframe" src="TAIN_MERCHANT_URL/embedded/user/forgotpassword?lang={{App::getLocale()}}" border="0"></iframe> -->
            <!--<div class="input-password-recovery">
                        <span><i class="icon-messages" aria-hidden="true"></i></span>
                        <input class="modal-input" type="text" placeholder="{{ __('Введите ваш E-mail')}}">
                </div>
                <button class="button-modal">{{ __('отправить')}}</button>-->
                <h5>{{ __('Вы еще не зарегестрированны?')}} <a class="register-modal">{{ __('Создать аккаунт')}}</a></h5>
            </div>
            @if (!isset($player_info) && empty($player_info))
                @include('partials.login-popup')

                <div id="createaccount-form-modal" class="createaccount createaccount-form">
                    <div class="boxes-holder choise-register">
                        <h1>{{ __('Выберите вариант регистрации')}}</h1>
                        <a class="button-modal quick-register-start">{{ __('Быстрая регистрация')}}</a>
                        <a class="button-modal full-register-start">{{ __('Полная регистрация')}}</a>
                    </div>

                    <!-- full-register 1-->
                    <div class="boxes-holder full-register-block">
                        <form action="{{ URL::to('/player/register') }}"  method="post" id="full-register-form-1">
                            {{ csrf_field() }}
                            <input type="hidden" name="full_merchant_id" id="full_merchant_id" value="{{ env('MERCHANT_ID') }}">
                            <div class="box box-1 full-register-block-1">
                                <h1>{{ __('Создайте бесплатный аккаунт')}}<br>{{ __('в два простых шага')}}</h1>
                                <fieldset>
                                    <div class="form-row info">
                                        <label>{{ __('Логин')}}</label>
                                        <input autocomplete="off" data-exist="empty"  name="full_playerName" id="full_playerName" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Имя пользователя слишком короткое')}}" data-err-2="{{ __('Пользователь с таким именем уже зарегистрирован')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row firstName">
                                        <label>{{ __('Ваше имя')}}</label>
                                        <input name="firstName" id="full_firstName" nanme="full_firstName" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Введите имя')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>

                                <!--<fieldset>
                                    <div class="form-row lastName">
                                        <label>{{ __('Ваша фамилия')}}</label>
                                        <input name="lastName" id="input-lastName" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Введите фамилию')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row gender">
                                        <label>{{ __('Пол')}}</label>
                                        <div class="col-right-func-select col-right-func-number-select gender-select">
                                            <span class="col-right-func-select-header">{{ __('Муж')}}</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                            <div class="col-right-func-select-options-wrapper">
                                                <ul class="col-right-func-select-options">
                                                    <li class="gender-select-js" data-gender="M">{{ __('Муж')}}</li>
                                                    <li class="gender-select-js" data-gender="F">{{ __('Жен')}}</li>
                                                </ul>
                                                <input type="hidden" value="M" id="input-gender" name="gender">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>-->

                                <fieldset>
                                    <div class="form-row email">
                                        <label>E-mail</label>
                                        <input name="full_email" id="full_email" class="tippeable" original-title="" type="email">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный E-mail')}}"  data-err-2="{{ __('Пользователь с таким E-mail уже зарегистрирован')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row register_currency_small">
                                        <label>{{ __('Валюта')}}</label>
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
                                <!--<div class="form-row repeat_email">
                                            <label>{{ __('Повторите')}} E-mail</label>
                                            <input  data-exist="empty"  id="input-retype-email" class="tippeable" original-title="" type="email">
                                            <span class="regs_error" data-err-1="{{ __('E-mail не совпал')}}"></span>
                                            <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>-->
                                </fieldset>

                                <fieldset>
                                    <div class="form-row date-birthday">
                                        <label>{{ __('Дата рождения')}}</label>
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
                                    {{ __('Далее')}}
                                </button>
                               
                            </div>
                            </form>
                            <!-- full-register 2-->
                            <form action="{{ URL::to('/player/register') }}" method="post" id="full-register-form-2" data-step="full-registration-complete">
                             <div class="box box-2 full-register-block-2">
                             
                                <h2>{{ __('Регистрация почти завершена - последний шаг')}}</h2>
                                <fieldset>
                                    <div class="form-row">
                                        <label>{{ __('Страна')}}</label>
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
                                        <label>{{ __('Город')}}</label>
                                        <input name="full_city" id="full_city" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Введите город')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>

                                </fieldset>
                                <fieldset>
                                    <div class="form-row address">
                                        <label>{{ __('Адрес')}}</label>
                                        <input autocomplete="off" name="full_address" id="full_address" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Введите адрес')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row zip">
                                        <label>{{ __('Почтовый индекс')}}</label>
                                        <input name="full_zip" id="full_zip" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Индекс слишком короткий')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-row phone">
                                        <label>{{ __('Телефон')}}</label>
                                        <input autocomplete="off" name="full_phone" placeholder="+xxxxxxxxxxxx" id="full_phone" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный номер')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row register_bonus_code">
                                        <label>{{ __('Введите промокод')}}</label>
                                        <input  name="full_bonusCode"  id="full_bonusCode" class="tippeable" type="text">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-row pass">
                                        <label>{{ __('Пароль')}}</label>
                                        <input autocomplete="new-password" name="full_password" id="full_password" class="tippeable" original-title="" type="password">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Пароль слишком короткий')}}" data-err-2="{{ __('Нужны по крайней мере, один строчный символ, один символ верхнего регистра и одна цифра')}}" ></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row repeat_pass">
                                        <label>{{ __('Повторите пароль')}}</label>
                                        <input autocomplete="new-password" id="full_retypePassword" name="full_retypePassword" class="tippeable" original-title="" type="password">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный пароль')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-row check-terms">
                                        <label class="cust_checkbox_label">
                                            <input type="checkbox"  id="full_check_terms" name="full_check_terms" class="cust_checkbox"/>
                                            <span>{{ __('Я прочитал(а) и принял(а)')}}</span> <a href="/info#terms_of_use" style=" color: #fff;">{{ __('Правила и условия')}}</a>
                                            <span class="regs_error" data-err-1="{{ __('Соглашение с правилами и условиями обязательно при регистрации в проекте BetTend')}}"></span>
                                        </label>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>
                                <button class="register-modal-back-choce-1 pull-left">
                                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                </button>
                                <button class="button-modal next-step-reg" id="full-register-button">
                                    {{ __('Регистрация')}}
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
                                <h1>{{ __('Создайте бесплатный аккаунт')}} <br> {{ __('Быстрая регистрация')}}</h1>
                                <fieldset>
                                    <div class="form-row info">
                                        <label>{{ __('Логин')}}</label>
                                        <input autocomplete="off" data-exist="empty" name="quick_playerName" id="quick_playerName" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Имя пользователя слишком короткое')}}" data-err-2="{{ __('Пользователь с таким именем уже зарегистрирован')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row register_currency">
                                        <label>{{ __('Валюта')}}</label>
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
                                        <label>{{ __('Пароль')}}</label>
                                        <input autocomplete="new-password" name="quick_password" id="quick_password" class="tippeable" original-title="" type="password">
                                        <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Пароль слишком короткий')}}" data-err-2="{{ __('Нужны по крайней мере, один строчный символ, один символ верхнего регистра и одна цифра')}}" ></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row repeat_pass">
                                        <label>{{ __('Повторите пароль')}}</label>
                                        <input autocomplete="new-password" id="quick_retypePassword" name="quick_retypePassword" class="tippeable" original-title="" type="password">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный пароль')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-row email">
                                        <label>E-mail</label>
                                        <input name="quick_email" id="quick_email" class="tippeable" original-title="" type="email">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный E-mail')}}"  data-err-2="{{ __('Пользователь с таким E-mail уже зарегистрирован')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row quick_country_select">
                                        <label>{{ __('Страна')}}</label>
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
                                <!--<div class="form-row repeat_email">
                                        <label>{{ __('Повторите')}} E-mail</label>
                                        <input  data-exist="empty"  id="quick-input-retype-email" class="tippeable" original-title="" type="email">
                                        <span class="regs_error" data-err-1="{{ __('E-mail не совпал')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                </div>-->
                                </fieldset>

                                <fieldset>
                                    <div class="form-row register_bonus_code">
                                        <label>{{ __('Введите промокод')}}</label>
                                        <input  id="quick_bonusCode" name="quick_bonusCode" class="tippeable" type="text">
                                    </div>
                                    <div class="form-row date-birthday-quick">
                                        <label>{{ __('Дата рождения')}}</label>
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
                                            <span>{{ __('Я прочитал(а) и принял(а)')}}</span> <a href="/info#terms_of_use" style=" color: #fff;">{{ __('Правила и условия')}}</a>
                                            <span class="regs_error" data-err-1="{{ __('Соглашение с правилами и условиями обязательно при регистрации в проекте BetTend')}}"></span>
                                        </label>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>
                                <button class="button-modal" id="quick-register-button">
                                    {{ __('Регистрация')}}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="boxes-holder complite-register-block">
                        <form action="" method="post" id="complite-register-promo">
                            {{ csrf_field() }}
                            <div class="box box-1 confirm-register-block-1">
                                <h1>{{ __('Регистрация завершена.')}} <br> {{ __('Подтвердите ваш E-mail.')}}</h1>
                                <div class="divider"></div>
                                <p>{{ __('Чтобы подтвердить E-mail, перейдите в Вашу электронную почту, откройте наше письмо и перейдите по ссылке. ')}}</p>

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
                            <!--<a href="http://www.gaming-curacao.com/validation/fairgame-g-p-n-v/" target="_blank"><img class="img-responsive" src="/../../img/curacao-logo.png" alt="">
                                    <div class="curacao_text">
                                            <p>Curacao</p>
                                            <p>eGaming</p>
                                            <p>License</p>
                                    </div>
                            </a>-->
                        </div>
                    </div>
                </div>
            @endif
            <span class="close-modal">
                <i class="icon-cancel-music" aria-hidden="true"></i>
            </span>
        </div>
    </div>
    @if (isset($player_info) && !empty($player_info))
        <div class="modal-account account">

            <div class="row">
                <label class="account-category-select-label">{{ __('Выберите категорию')}}</label>
                <div class="col-right-func-selects account-category-select">
                    <div class="col-right-func-select col-right-func-number-select">
                        <span class="col-right-func-select-header jq_mobile_header_selected">{{ __('Профиль')}}: {{ __('Персональные данные')}}</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                        <div class="col-right-func-select-options-wrapper">
                            <ul class="col-right-func-select-options">
                                <li category="profile" inner="profile">{{ __('Профиль')}}: {{ __('Персональные данные')}}</li>
                                <li category="profile" inner="verification">{{ __('Профиль')}}: {{ __('Проверка')}}</li>
                                <li category="profile" inner="change-password">{{ __('Профиль')}}: {{ __('Изменить пароль')}}</li>
                                <li category="balance" inner="balance">{{ __('Депозит')}}: {{ __('Баланс')}}</li>
                                <li category="balance" data-id="deposit-limits-block">{{ __('Депозит')}}: {{ __('Лимит депозита')}}</li>
                                <li category="balance" inner="dep-history" data-id="dep-history" class="jq_get_history">{{ __('Депозит')}}: {{ __('История оплаты')}}</li>
                                <li category="withdraw" inner="withdraw">{{ __('Вывод')}}: {{ __('Новый')}}</li>
                                <li category="withdraw" inner="processed" data-id="withdraw-history" class="jq_get_history">{{ __('Вывод')}}: {{ __('Выполнен')}}</li>
                                <li category="bonus" inner="bonus">{{ __('Бонусы')}}: {{ __('Обзор Бонусов')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 menu-mobile" style="display:none;margin:0 auto;z-index:100">
                    <i class="fa icon-logo5"></i>
                    <div style="margin-top:-20px">
                        <div class="inner-addon right-addon mm-menu">
                            <div class="field-label">{{ __('Перейти к аккуаунту')}}:</div>
                            <div style="position:relative">
                                <select id="mobile-menu" style="width:100%;border:0;border-radius:7px;background-color:#04404b;color:#fff;padding:8px;font-size:18px" class="choose_state">
                                    <option value="profile">{{ __('Профиль')}}: {{ __('Персональные данные')}}</option>
                                    <option value="verification">{{ __('Профиль')}}: {{ __('Проверка')}}</option>
                                    <option value="change-password">{{ __('Профиль')}}: {{ __('Изменить пароль')}}</option>
                                    <option value="balance">{{ __('Депозит')}}: {{ __('Баланс')}}</option>
                                    <option value="dep-history">{{ __('Депозит')}}: {{ __('История оплаты')}}</option>
                                    <option value="withdraw">{{ __('Вывод')}}: {{ __('Новый')}}</option>
                                    <option value="processed">{{ __('Вывод')}}: {{ __('Выполнен')}}</option>
                                    <option value="bonus">{{ __('Бонусы')}}: {{ __('Обзор Бонусов')}}</option>
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
                    <div class="menu-item current" data-id="profile"><i class="icon-account-fgcasino"></i>{{ __('Профиль')}}</div>
                    <div class="menu-item" data-id="balance"><i class="icon-deposit-fgcasino"></i>{{ __('Депозит')}}</div>
                    <div class="menu-item" data-id="withdraw"><i class="icon-vyvod-panel"></i>{{ __('Вывод')}}</div>
                    <div class="menu-item" data-id="bonus"><i class="icon-bonusy-panel"></i>{{ __('Бонусы')}}</div>
                    <div>
                        <a href="/user-logout" class="btn btn-block logoff">{{ __('Выход')}}</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 mobile-no-padding menu-main" style="text-align: center; padding: 24px; min-height: 0px;">
                    <div style="margin:0 auto;">
                        <div class="row sub-items profile" parent-id="profile" style="display: block;">
                            <div data-id="profile" class="col-xs-4 padding-none sub-item current">{{ __('Персональные данные')}}</div>
                            <div data-id="verification" class="col-xs-4 padding-none sub-item">{{ __('Проверка')}}</div>
                            <div data-id="change-password" class="col-xs-4 padding-none sub-item">{{ __('Изменить пароль')}}</div>
                        </div>
                        <div class="row sub-items balance" parent-id="balance" style="display: none;">
                            <div data-id="balance" class="col-xs-4 padding-none sub-item current">{{ __('Баланс')}}</div>
                            <div data-id="deposit-limits-block" class="col-xs-4 padding-none sub-item">{{ __('Лимит депозита')}}</div>
                        <!--<div data-id="game-history" class="col-xs-4 padding-none sub-item">{{ __('История')}}</div>-->
                            <div data-id="dep-history" class="col-xs-4 padding-none sub-item jq_get_history">{{ __('История оплаты')}}</div>
                        </div>
                        <div class="row sub-items withdraw" parent-id="withdraw" style="display: none;">
                            <div data-id="withdraw" class="col-xs-6 padding-none sub-item current">{{ __('Новый')}}</div>
                        <!--<div data-id="pending" class="col-xs-4 padding-none sub-item">{{ __('Ожидает')}}</div>-->
                            <div data-id="processed" class="col-xs-6 padding-none sub-item jq_get_history_withdrawal">{{ __('Выполнен')}}</div>
                        </div>
                        <div class="row sub-items bonus" parent-id="bonus" style="display: none;">
                            <div data-id="bonus" class="col-xs-12 padding-none sub-item current">{{ __('Обзор Бонусов')}}</div>
                        </div>
                        <div class="mobile-no-padding account-content-tab profile-content-wrapper" style="padding-top:9px; display: block;">
                            <div class="profile-tab-content" style="display: block;">
                                <form name="account" id="edit_profile_form">
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>{{ __('Ваш никнейм')}}</label>
                                                <input name="Username" autocomplete="off" class=" readonly" tabindex="1" value="@if (isset($player_info) && !empty($player_info)){{$player_info->playerName}}@endif" type="text" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Имя')}}</label>
                                                <input name="Name" autocomplete="off" class="" tabindex="3" value="@if (isset($player_info) && !empty($player_info)){{$player_info->firstName}}@endif" type="text"></div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Фамилия')}}</label>
                                                <input name="LastName" autocomplete="off" class="" tabindex="3" value="@if (isset($player_info) && !empty($player_info)){{$player_info->lastName}}@endif" type="text"></div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Пол')}}</label>
                                                <input name="Gender" autocomplete="off" class=" readonly" tabindex="5" value="@if (isset($player_info) && !empty($player_info)){{$player_info->gender}}@endif" type="hidden">
                                                <div class="col-right-func-select col-right-func-number-select gender-select" style="width: 100%;">
                                                    <span class="col-right-func-select-header">@if (isset($player_info) && !empty($player_info) && $player_info->gender == 'M') {{ __('Муж')}} @else {{ __('Жен')}} @endif</span><div class="col-right-func-select-toggle"><i class="icon-svernut-dly-vsex-stranic"></i></div>
                                                    <div class="col-right-func-select-options-wrapper">
                                                        <ul class="col-right-func-select-options">
                                                            <li class="gender-select-js" data-gender="M">{{ __('Муж')}}</li>
                                                            <li class="gender-select-js" data-gender="F">{{ __('Жен')}}</li>
                                                        </ul>
                                                        <input type="hidden" value="M" id="input-gender" name="gender">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Страна')}}</label>
                                                <input name="Country" autocomplete="off" class=" readonly" tabindex="5" value="@if (isset($player_info) && !empty($player_info)){{$countries[$player_info->countryCode]}}@else{{$countries['RU']}}@endif" type="text" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Город')}}</label>
                                                <input name="City" autocomplete="off" class="" value="@if (isset($player_info) && !empty($player_info)){{$player_info->city}}@endif" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Адрес')}}</label>
                                                <input name="Address1" autocomplete="off" class="" tabindex="2" value="@if (isset($player_info) && !empty($player_info)){{$player_info->address}}@endif" type="text" >
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Индекс')}}</label>
                                                <input name="PostalCode" autocomplete="off" class="" tabindex="4" value="@if (isset($player_info) && !empty($player_info)){{$player_info->zip}}@endif" type="text">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>E-mail</label>
                                                <input name="Email" autocomplete="off" class=" readonly" tabindex="1" value="@if (isset($player_info) && !empty($player_info)){{$player_info->email}}@endif" type="text" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-row col-xs-12 col-sm-6 field-right">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Телефон')}}</label>
                                                <div>
                                                    <div>
                                                        <input autocomplete="off" class="" name="Mobile" value="@if (isset($player_info) && !empty($player_info)){{$player_info->phone}}@endif" tabindex="9" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Дата рождения')}}</label>
                                                <input name="BirthDate" autocomplete="off" class="" tabindex="7" value="@if (isset($player_info) && !empty($player_info)){{$player_info->birthDate}}@endif" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row jq_succes_edit_profile hide_el">
                                        <div class="divider"></div>
                                        <p class="jq_update_success">{{ __('Профиль успешно обновлен') }}</p>
                                        <div class="divider"></div>
                                    </div>
                                    <div class="row">
                                        <a href="#" class="btn btn-block jq_edit_profile">{{ __('Сохранить') }}</a>
                                    </div>
                                </form>
                            </div>
                            <div class="verification-tab-content" style="display: none;">
                                <div class="row mobile-no-margin" style="margin-top:16px">
                                    <div class="field-left text-left">
                                        <div id="kyc-div" style="">
                                            @if(isset($player_info) && !empty($player_balance))
                                                <iframe id="kyc_iframe" src="{{ env('TAIN_MERCHANT_URL') }}/embedded/account/playerimageupload?sid={{ \Illuminate\Support\Facades\Cookie::get('tainSessionId') }}&lang={{App::getLocale()}}"></iframe>
                                            @else
                                                {{ __('На данный момент мы не требуем дополнительной проверки от Вас.')}}
                                            @endif
                                        </div>
                                        <div id="loading-kyc-pc" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="change-password-tab-content" style="display: none;">
                                <form name="change-password" autocomplete="off">
                                    <input type="text" style="display:none">
                                    <input type="password" style="display:none">
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left jq_new_pass">
                                            <div class="inner-addon right-addon mobile-no-margin">
                                                <label>{{ __('Новый пароль')}}</label>
                                                <input name="NewPassword" id="jq_new_pass" autocomplete="off" class="" style="display:inline-block" tabindex="1" value="" type="password" maxlength="25">
                                                <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Пароль слишком короткий')}}" data-err-2="{{ __('Нужны по крайней мере, один строчный символ, один символ верхнего регистра и одна цифра')}}" ></span>
                                                <div class="game-control-span-wrapper err-left"><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-row col-xs-12 col-sm-6 field-left jq_old_pass">
                                            <div class="inner-addon right-addon">
                                                <label>{{ __('Повторите пароль')}}</label>
                                                <input name="OldPassword" id="jq_old_pass" autocomplete="off" class="" style="display:inline-block" tabindex="2" value="" type="password" maxlength="25">
                                                <span class="regs_error" data-err-3="{{ __('Используйте латинские буквы (A-Z)')}}" data-err-1="{{ __('Введите правильный пароль')}}"></span>
                                                <div class="game-control-span-wrapper err-left"><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="passord-accept field-left">
                                            <div class="divider"></div>
                                            <div class="inner-addon right-addon">
                                                <p class="jq_change_pass_mess">{{ __('Пароль успешно изменен.')}}</p>
                                                <button name="submit" role="submit" tabindex="3" class="btn btn-change-password btn-block jq_change_password" style="padding:5px" href="#">{{ __('Изменить пароль')}}</button>
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
                                            <div class="title">{{ __('Вы сняли денег')}}:</div>
                                            <div class="money">0.00 @if(isset($player_info) && !empty($player_balance)) {{$currency_symbol}} @endif</div>
                                            <div class="divider"></div>
                                            <div class="title">{{ __('Ваши бонусы')}}:</div>
                                            <div class="money">
                                                @if(isset($player_info) && !empty($player_balance))
                                                    @if(!empty($player_bonuses))
                                                        @if($player_bonuses->totalCount != 0)
                                                            @php $amount_bonus = 0 @endphp
                                                            @foreach($player_bonuses->result as $bonus)
                                                                @if($bonus->status == 'STARTED')
                                                                    @php $amount_bonus += $bonus->amount->amount; @endphp
                                                                @endif
                                                            @endforeach
                                                            {{ $amount_bonus }} {{$currency_symbol}}
                                                        @endif
                                                    @else
                                                        0.00 {{ $currency_symbol }}
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="divider"></div>
                                            <div class="title">{{ __('Ваш баланс')}}:</div>
                                            <div class="money">@if(isset($player_info) && !empty($player_balance)) <label class="jq_update_balance">{{$player_balance->totalBalance->amount}}</label> {{$currency_symbol}} @endif</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="deposit-limits-block-tab-content" style="display: none;">
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
                            </div>

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
                            <div class="withdraw-tab-content" style="display: block;">
                                <div class="row">
                                    <div class="field-left">
                                        <div class="inner-addon right-addon mobile-no-margin" style="z-index:9999;text-align:left">
                                            {{ __('Ваш баланс')}}: <span class="wdbalance" style="color:#35a876;font-weight:400">@if(!empty($player_balance)) <label class="jq_update_balance">{{$player_balance->totalBalance->amount}}</label> {{$currency_symbol}} @endif</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="field-left deposite-choise form-row">
                                        <div class="inner-addon right-addon" style="z-index:9999">
                                            <label>{{ __('Выберите способ вывода средств')}}</label>
                                            <div class="col-right-func-selects deposit-active-dropdown">
                                                <div class="col-right-func-select col-right-func-number-select withdraw_system">
                                                    <span class="col-right-func-select-header" data-gateway_selected="Neteller">Neteller</span>
                                                    <div class="col-right-func-select-toggle">
                                                        <i class="icon-svernut-dly-vsex-stranic"></i>
                                                    </div>
                                                    <div class="col-right-func-select-options-wrapper">
                                                        <ul class="col-right-func-select-options">
                                                            <li data-gateway_name="ecoPayz" img="/../../img/payment-systems/ecopayz logo.png">ecoPayz</li>
                                                            <li data-gateway_name="Neteller" img="/../../img/payment-systems/neteller.png">Neteller</li>
                                                            <li data-gateway_name="Moneybookers" img="/../../img/payment-systems/skrill_img.png">Skrill</li>
                                                        </ul>
                                                    </div>
                                                    <div class="img-deposit">
                                                        <img src="/../../img/payment-systems/neteller.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="#" class="btn btn-block jq_withdraw">{{ __('Вывод')}}</a>
                                </div>
                                <div class="deposit-frame">
                                    <div class="row">
                                        <div class="col-xs-12 field-left text-left">
                                            <div class="divider"></div>
                                            <div id="loading-withdraw-pc" style="display: none;"></div>
                                        </div>
                                    </div>
                                </div>
                                <p style="text-align:left;color: #6f7989;font-size:10px; margin-top:10px;">Suite 8042, 4 Fullarton Street, Ayr KA7 1UB, UK <br>+44 2392 16 2243<br>MACOUN COMMERCE LP.</p>
                            </div>
                            <div class="pending-tab-content" style="display: none;">
                                <div class="row mobile-no-margin">
                                    <div class="col-xs-11 col-sm-12 text-left padding-none">
                                        <div id="data-div">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th>{{ __('Дата')}}</th>
                                                    <th>{{ __('Кол-во')}}</th>
                                                    <th>{{ __('Описание')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody id="data-table">

                                                </tbody>
                                            </table>
                                            <div class="divider" style="margin:9px 0px 16px 0px"></div>
                                            <div style="margin-top:2px">
                                                <div id="data-showing" style="float:left">{{ __('Показано')}} 0 {{ __('из')}} 0 {{ __('операций')}}</div>
                                                <button href="#" class="btn next" style="float:right;padding:5px;margin-left:2px" disabled="disabled">{{ __('След')}}</button>
                                                <button href="#" class="btn previous" style="float:right;padding:5px" disabled="disabled">{{ __('Пред')}}</button>
                                            </div>
                                        </div>
                                        <div id="loading-data-pc" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="processed-tab-content jq_head_withdrawals" style="display: none;">
                                @include('parts.transaction-history-withdrawal')
                            </div>

                        </div>
                        <div class="mobile-no-padding account-content-tab bonus-content-wrapper" style="padding-top:9px; display: none;">
                            <div class="bonus-tab-content" style="display: block;">
                                <div class="row">
                                    <div class="col-xs-12 field-left text-left">
                                        <div class="inner-addon right-addon mobile-no-margin">
                                            <div id="loading-bonus-pc" style="display: none;"></div>
                                            <div id="bonus-div" style="">
                                                @if(!empty($player_bonuses))
                                                    @if($player_bonuses->totalCount == 0)
                                                        {{ __('На данный момент у вас нет действующих бонусов')}}
                                                    @else
                                                        <ul class="head_bonuses_list">
                                                            <li class="head_single_bonus_line">
                                                                <span class="bonus_amount">{{ __('Сумма бонуса:') }}</span>
                                                                <span class="bonus_startdate">{{ __('Дата активации:') }}</span>
                                                                <span class="bonus_expiredate">{{ __('Дата окончания:') }}</span>
                                                            </li>
                                                        </ul>
                                                        <ul class="bonuses_list">
                                                            @foreach($player_bonuses->result as $bonus)
                                                                <li class="single_bonus_line">
                                                                    <span class="bonus_amount"><label>{{ $bonus->amount->amount }} {{ $currency_symbol }}</label></span>
                                                                    <span class="bonus_startdate"> <label class="jq_date_convert" data-time="{{$bonus->startTime}}">{{ Carbon\Carbon::parse($bonus->startTime)->format('Y/m/d H:i') }}</label></span>
                                                                    @if(isset($bonus->expirationTime) && $bonus->expirationTime != '')
                                                                        <span class="bonus_expiredate"><label class="jq_date_convert" data-time="{{$bonus->expirationTime}}">{{ Carbon\Carbon::parse($bonus->expirationTime)->format('Y/m/d H:i') }}</label></span>
                                                                    @endif

                                                                    {{--
                                                                    @if(isset($bonus->targetPoints) && $bonus->targetPoints != '')
                                                                    @php $count_points = $bonus->targetPoints - $bonus->currentPoints @endphp
                                                                    <label class="bonus_points">{{ __('До вывода бонусов Вам осталось собрать:') }} <b class="bonus_point">{{ $count_points }}</b> {{ __(' поинтов') }}</label>
                                                                    @endif
                                                                    --}}

                                                                </li>
                                                                <div class="divider"></div>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/user-logout" class="exit-profile-mobile">{{ __('Выход')}}</a>
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
