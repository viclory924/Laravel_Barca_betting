	<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="has-top-character casino-page">
<head>
    <meta charset="utf-8">

    <title>Casino | Казино</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-touch-icon-114x114.png') }}">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

    <script src="{{ asset('js/loader.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/loader.css?v=1') }}">

    <script>
		var casino_page = <?php echo $active_menu; ?>;
		var casino_type = "{{ $casino_type }}";
        var merchant_id = "{{ env('MERCHANT_ID') }}";
        var overlay_text = "{{ __('games.play_for_free') }}";
        var logged = {{ \Auth::user() ? "true" : "false" }};
		
    </script>
	<style>
	@media  screen and (max-width: 1024px) {
		html, body{
		overflow-y : scroll !important;
		-webkit-overflow-scrolling: touch !important;
	}
	.deposit-button-wrapper-casino{
		position:fixed;
		right:0px;
		top:100px !important;
	}
}
</style>
</head>
<body class="casino-page">

    @include('partials.enter-button')

<div class="bottom-menu-wrapper">
    <div class="bottom-menu">
        <ul>
            <li><a><i class="icon-home2" aria-hidden="true"></i><br>Игры</a></li>
            <li><a href="bonus.html"><i class="icon-bonusy-panel" aria-hidden="true"></i><br>Бонусы</a></li>
            <li class="help-toggle"><a><i class="icon-help " aria-hidden="true"></i><br>Помощь</a></li>
            <li class="account-window-trigger"><a><i class="icon-withdraw-fgcasino" aria-hidden="true"></i><br>Вывод</a></li>
            <li class="account-trigger"><a><i class="icon-account-fgcasino" aria-hidden="true"></i><br>Аккаунт</a></li>
        </ul>
    </div>
</div>

<div class="mobile-search-wrapper">
    <input type="text" placeholder="Поиск по играм"><button><i class="fa fa-search" aria-hidden="true"></i></button>
</div>

<div id="all">

    @include('partials.casino-header', ['active' => 'casino'])

    @yield('content')

</div>

@include('partials.footer')

@include('partials.included_scripts')

</body>
</html>