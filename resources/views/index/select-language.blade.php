<!DOCTYPE html>
<html lang="ru" class="home-page-html">

<head>
    <meta charset="utf-8">

    <title>Casino</title>
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

    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simplePagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bt_custom.css') }}">
    @stack('styles')
</head>

<body class="home-page language-bg language-select-page">

<div class="main-wrapper home-page-wrapper language-wrapper">
    <div class="language-select-window">

        <div class="language-select-header">
            <div class="language-header-logo logo">
                <a href="{{route('home')}}"><img src="{{ asset('img/main-logo.svg') }}" alt=""></a>
            </div>
        </div>

        <div class="language-select-content">
            <div class="baron baron__root baron__clipper _macosx">
                <div class="baron__scroller">
                    <div class="language-select-wrapper">
                        <ul>
                            @foreach(Config::get('languages') as $lang => $language)
                                <li>
                                    <a href="#" data-text="{{ $lang }}">{{ $language }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="baron__track">
                    <div class="baron__control baron__up">▲</div>
                    <div class="baron__free">
                        <div class="baron__bar"></div>
                    </div>
                    <div class="baron__control baron__down">▼</div>
                </div>
            </div>
        </div>

        <div class="language-select-footer">
            <button>подтвердить</button>
        </div>

    </div>
</div>

@include('partials.included_scripts')
<script>
    (function ($) {
        $('.language-select-footer button').on('click', function(e){
            e.preventDefault();
            if (!$(this).hasClass('disabled')) {
                var selected_lang = $('.language-select-wrapper').find('ul li.selected a').attr('data-text');
                $.cookie('locale', selected_lang);
                top.location.href = '/lang/' + selected_lang;
            }
        });
    })(jQuery);
</script>
</body>
</html>
