<div class="modal-login-wrapper">
    <form action="{{ URL::to('/player/login') }}" method="post" id="login-form">
        {{ csrf_field() }}
        <div class="login-input-wrapper">
            <div class="form-row left-icons">
                <span><i class="icon-account-fgcasino" aria-hidden="true"></i></span>
                <input class="modal-input" type="text" name="login_playerName" id="login_playerName" placeholder="{{ __('registration.login')}} / Email ">
            </div>
            <div class="form-row left-icons">
                <span><i class="icon-zamok" aria-hidden="true"></i></span>
                <input class="modal-input acc-pass" type="password" placeholder="{{ __('auth.your_password')}}" name="login_playerPassword" id="login_playerPassword">
                           </div>
        </div>

    </form>
	 <button class="button-modal" id="login-button">{{ __('auth.login')}}</button>
    <div class="loggin-h5-wrapper">
        <h5>{{ __('auth.forgot_your_password')}}? <a class="pass-recov-trigger">{{ __('auth.restore_data')}}</a></h5>
        <h5>{{ __('auth.are_you_not_registered')}} <a class="register-modal">{{ __('auth.create_account')}}</a></h5>
    </div>
</div>





