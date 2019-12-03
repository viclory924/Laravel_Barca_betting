<div id="profile-form-modal" style="overflow-x:hidden" class="createaccount createaccount-form">
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
                                        <input autocomplete="off" data-exist="empty"  name="full_playerName" id="full_playerName" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('registration.use_eng_letters')}}" data-err-1="{{ __('registration.user_name_too_short')}}" data-err-2="{{ __('registration.user_exists')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                    <div class="form-row firstName">
                                        <label>{{ __('registration.first_name')}}</label>
                                        <input name="firstName" id="full_firstName" nanme="full_firstName" class="tippeable" original-title="" type="text">
                                        <span class="regs_error" data-err-3="{{ __('registration.use_eng_letters')}}" data-err-1="{{ __('registration.enter_a_name')}}"></span>
                                        <div class="game-control-span-wrapper err-left"><span></span></div>
                                    </div>
                                </fieldset>

                               
                                <fieldset>
                                    <div class="form-row email">
                                        <label>E-mail</label>
                                        <input name="full_email" id="full_email" class="tippeable" original-title="" type="email">
                                        <span class="regs_error" data-err-1="{{ __('Введите правильный E-mail')}}"  data-err-2="{{ __('registration.user_email_exists')}}"></span>
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
                           
                        </div>
                    </div>
                </div>