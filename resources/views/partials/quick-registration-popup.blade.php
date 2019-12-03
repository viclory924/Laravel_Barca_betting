<div class="boxes-holder quick-register-block">
    <form id="quick-registartion-form" action="{{ URL::to('/player/register') }}" method="post">
        <input type="hidden" name="quickMerchantId" id="quickMerchantId" value="{{ env('MERCHANT_ID') }}">
        <div class="box box-1 quick-register-block-1">
            <h1>Создайте бесплатный аккаунт <br> Быстрая регистрация</h1>
            <fieldset>
                <div class="form-row">
                    <label>Email</label>
                    <input autocomplete="off" name="quickEmail" id="quickEmail" class="tippeable" original-title="" type="email">
                 </div>
				  <div class="form-row">
                    <label>Логин</label>
                    <input autocomplete="off" name="quickUsername" id="quickUsername" class="tippeable" original-title="" type="text">
                 </div>
			</fieldset>
            
			
			
            <fieldset>
                <div class="form-row">
                    <label>Пароль</label>
                    <input autocomplete="off" name="quickPassword" id="quickPassword" class="tippeable" original-title="" type="password">
                </div>
            </fieldset>
            <fieldset>
                <div class="form-row">
                    <label>Повторите пароль</label>
                    <input id="quickRetypePassword" name="quickRetypePassword" class="tippeable" original-title="" type="password">
                </div>
            </fieldset>
            <div class="form-fields-tip">
                <ul>
                    <li>Не менее 8 символов</li>
                    <li>Не хватает цифры или прописной буквы</li>
                </ul>
            </div>
            <button class="button-modal quick-reg">
                Регистрация
            </button>
        </div>
    </form>
</div>