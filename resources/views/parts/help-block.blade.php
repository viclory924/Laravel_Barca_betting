<!--help-block-->
<div class="help-block">
	<div class="help-nav">
		<span class="help-back"><i class="fa fa-chevron-left" aria-hidden="true"></i> {{ __('about.back')}}</span><span class="help-close jq_close_help_block">{{ __('about.close')}} <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	</div>
	<div class="help-content">
		<div class="first-screen">
			<div class="how-help">
				<h2>{{ __('about.how_can_we')}}<br> {{ __('about.help_you')}}</h2>
				<p>{{ __('about.subtitle')}}</p>
				<p>{{ __('about.online_chat_open')}}</p>
			</div>
			<ul class="help-menu">
				<li class="func-help">
					<div class="option live-chat">
						<div class="help-menu-icon">
							<i class="icon-chat-help" aria-hidden="true"></i>
						</div>
						<div class="description">
							<h4>{{ __('about.online_chat')}}</h4>
							<p>{{ __('about.online_chat_p')}}</p>
						</div>
					</div>
				</li>
				<li class="func-help support-message">
					<div class="option">
						<div class="help-menu-icon">
							<i class="icon-messages-help" aria-hidden="true"></i>
						</div>
						<div class="description">
							<h4>{{ __('about.support')}}</h4>
							<p>{{ __('about.support_p')}}</p>
						</div>
					</div>
				</li>
				<li class="func-help find-answers">
					<div class="option">
						<div class="help-menu-icon">
							<i class="icon-vopros2" aria-hidden="true"></i>
						</div>
						<div class="description">
							<h4>{{ __('about.faq')}}</h4>
							<p>{{ __('about.faq_p')}}</p>
						</div>
					</div>
				</li>
				<div class="social-button-help">
					<ul class="">
						<li><a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</ul>
			<div class="contacts">
				<h3>{{ __('about.contact')}}:</h3>
				<a href="#">support@bettend.com</a>
				<h4 class="contact_phone_text">{{ __('about.contact_p')}}</h4>
				<span class="contact_phone">+44 2392 16 2243</span>
                                <span>{{ __('Suite 8042, 4 Fullarton Street, Ayr KA7 1UB, UK')}}</span>
			</div>
		</div>
		<div class="chat-screen other-screen">
			<form action="">
				<h5>{{ __('about.email_address')}}: *</h5>
				<input type="text" id="chat-email" name="email" placeholder="Email">
				<h5>{{ __('Ваш вопрос, связанный с')}}: *</h5>
				<input type="radio" name="chat-radio" value="bonuses" id="bonuses"><label for="bonuses">{{ __('Бонусы и бесплатные спины')}}</label><br>
				<input type="radio" name="chat-radio" value="bonus-codes" id="bonus-codes"><label for="bonus-codes">{{ __('Оплата')}}</label><br>
				<input type="radio" name="chat-radio" value="payments" id="payments"><label for="payments">{{ __('Аккаунт')}}</label><br>
				<input type="radio" name="chat-radio" value="account" id="account"><label for="account">{{ __('Другое')}}</label><br>

				<input type="submit" class="jq_chat_start" value="{{ __('начать чат')}}">
			</form>
		</div>
		<div class="message-to-support other-screen">
			<h2>{{ __('about.send_message')}}</h2>
			<p>{{ __('about.12_hour')}}</p>
			<h5>{{ __('about.email_address')}}: *</h5>
			<form method="POST" id="message-to-support-form">
				{{ csrf_field() }}
				<input type="text" name="email" placeholder="Email">
				<input type="text" name="theme" placeholder="{{ __('about.subject')}}">
				<textarea name="message" cols="30" rows="10" placeholder="{{ __('about.message')}}"></textarea>
				<div class="error"></div>
				<input type="submit" value="{{ __('about.send')}}">
			</form>
		</div>
		<div class="faq other-screen">
			<div class="header-faq">
				<h2>{{ __('about.faq')}}</h2>
				<p>{{ __('about.faq_subtitle')}}?</p>

			</div>
			<div class="question-wrapper">
				@include('info_parts.'.App::getLocale().'.help-block')
			</div>
		</div>
	</div>
</div>
<!--END-help-block-->
