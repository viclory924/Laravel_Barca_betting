<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="@yield('html_class')">
<head>
    <meta charset="utf-8">

    <title>Bettend - @yield('title')</title>
    @include('partials.favicon')
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-touch-icon-114x114.png') }}">

    <!-- Prevent cache -->
    <meta http-equiv="pragma" content="no-cache">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simplePagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.min.css?v=3.5') }}">
    <link rel="stylesheet" href="{{ asset('css/bt_custom.css') }}">
    @stack('styles')

    <script>
        var merchant_id = {{ env('MERCHANT_ID') }};
        var logged = {{ \Auth::user() ? "true" : "false" }};
		var casino_page = '<?php if(isset($active_menu)){ echo $active_menu; }else{ echo "null"; } ?>';
		var casino_type = '<?php if(!isset($casino_type)){ echo "casino"; }else{ echo $casino_type; } ?>';
		
		//alert(casino_page);
    </script>
	<style>
	@media screen and (max-width: 401px) {
  .category-tile .title {
    font-size: 15px !important;
  }

 .on-desktop{
	 display:none !important;
 }
}

.on-mobile{
	display:none !important;
}

	.main-casino-wrapper.sport-header{
		
		position:relative;
		margin-right:0px;
		margin-left:0px;
		max-width:100%;
		width:100%;
	}
	
	.main-casino-wrapper.sport-header .logo{
			padding-top:0px;
			margin-bottom:0px;
	}
	.main-casino-wrapper.sport-header li.li-logo{
		left:45%;
	}
	.main-casino-wrapper.sport-header li{
		position: relative;
	
	}
	.main-casino-wrapper.sport-header li.nav-top-button a{
		background-color: #2f2f2f;
		padding-right:10px;
		border-radius : 25px;
		font-size:13px;
		position : relative;
		top:5px;
		border : 2px inset #2f2f2f;
		padding-top: 6px;
		padding-bottom : 6px;
		padding-left : 0px;
	}
	.main-casino-wrapper.sport-header li.nav-top-button a .span-1{
		background:linear-gradient(to bottom,#7e7e7e,#3a3a3a);
		padding-right : 10px;
		border-radius : 25px;
		padding-left:10px;
		padding-top : 5px;
		padding-bottom : 5px;
		font-size: 12px;
		cursor:pointer;
	}
	.main-casino-wrapper.sport-header li.nav-top-button a .span-2{
		padding-left : 10px;
		padding-right : 5px;
		color : #1cff00;
		cursor:pointer;
	}
	.main-casino-wrapper.sport-header li{
	margin-right: 10px !important;	
	}
	.main-casino-wrapper.sport-header li a{
		font-size: 14px;
		color: white;
		padding-left: 5px;
		padding-right: 5px;
		padding-top:5px;
		padding-bottom:5px;
	}
	
	.main-casino-wrapper.sport-header li.active a{
	border-bottom : none;
	color : #fffc00;
	background-color: #2f2f2f;
	border : 1px inset #2f2f2f;
	border-radius : 2px;
	}
	
	.main-casino-wrapper.sport-header li a:hover{
		color : #fffc00;
		border-bottom : none;
	}
	
	@media  screen and (max-width: 1024px) {
		html, body{
		overflow-y : scroll !important;
		-webkit-overflow-scrolling: touch !important;
	}
}
	
	<?php if(isset($active_menu)){ if($active_menu == 'sport'){ ?>
	.social-button-ul li a{
		background-color : black !important;
		color : #f27a4f;
		
	}
	.social-button-ul li a i{
		color : #f27a4f !important;
	}
	.menu_line_fixed{
		display : none !important;
	}
	<?php }} ?>
	
	@media screen and (max-width:1024px)
	{
	.deposit-button-wrapper.deposit-button-wrapper-casino.signin-wrapper.account-trigger{
			right:0px;
			position:fixed;
	}
	.deposit-button-wrapper-casino.deposit-button-wrapper{
		position:fixed;
		right:0px;
		top:100px;
	}
	}
	
	</style>
	
</head>
<body class="@yield('body_class')" <?php if(isset($active_menu)){ if( $active_menu == 'sport' ){ ?> style="background-color:#101010" <?php }} ?> >

    @yield('content')

    @include('partials.included_scripts')
</body>
</html>