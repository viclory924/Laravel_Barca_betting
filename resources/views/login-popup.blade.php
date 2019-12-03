<div class="modal-login-wrapper">
    <form action="{{ URL::to('/player/login') }}" method="POST" id="login-form">
        {{ csrf_field() }}
        <div class="login-input-wrapper">
            <div class="form-row left-icons">
                <span><i class="icon-account-fgcasino" aria-hidden="true"></i></span>
                <input class="modal-input" type="text" name="login_playerName" id="login_playerName" placeholder="{{ __('Username')}}">
            </div>
            <div class="form-row left-icons">
                <span><i class="icon-zamok" aria-hidden="true"></i></span>
                <input class="modal-input acc-pass" type="password" placeholder="{{ __('Password')}}" name="login_playerPassword" id="login_playerPassword">
                
            </div>
        </div>
       
    </form>
	 <button class="button-modal" id="login-button">{{ __('Login')}}</button>
    <div class="loggin-h5-wrapper">
        <h5>{{ __('Забыли данные?')}} <a class="pass-recov-trigger">{{ __('Восстановите их')}}</a></h5>
        <h5>{{ __('Вы еще не зарегестрированны?')}} <a class="register-modal">{{ __('Создать аккаунт')}}</a></h5>
    </div>
</div>