<?php /*<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="sport-page">
<head>
    <title>Casino | Sport</title>
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
</head>
<body>


<div id="all">

    @include('partials.sport-header', ['active' => 'sport'])

    <div id="page-bg">
        {{--<iframe class="sport-iframe">--}}
            @if($agent->isMobile())
                <script type="text/javascript" src="https://msports-itainment.biahosted.com/staticResources/betinactionApi.js"></script>
            @else
                <script type="text/javascript" src="https://sports-itainment.biahosted.com/staticResources/betinactionApi.js"></script>
            @endif
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div id="SetPageButtons">
                            {{--<button onClick="betinactionAPI.setPagePrelive()">Prelive</button>--}}
			    @if(!$agent->isMobile())
				<!--<button onClick="betinactionAPI.setPageLive()">Live</button>-->
				{{--<a class="btn sportsbook-button" href="http://sports-itainment.biahosted.com/Generic/live.aspx?skinid=leprecon">Live</a>--}}
				
                            @endif
                            {{--<button onClick="betinactionAPI.setPageVfl()">Vfl</button>--}}
                        </div>

                        <div class="content__games1 clearfix1" style="height:auto !important;">
                            <div id="BIA_client_container"></div>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                function getSelectionsList() {
                    var eventIds = String(document.getElementById("InputeventId").value).split(',');
                    betinactionAPI.getMarkets(eventIds);
                }

                function onSelectionButtonClick(btn) {
                    betinactionAPI.setSelection(btn.dataset.selectionid);
                }

                var parseQuery = function (queryString) {
                    if (((typeof queryString) !== 'string') || (queryString.length === 0)) {
                        return {}
                    }
                    var leadingSymbols = ['?', '#']
                    if (leadingSymbols.indexOf(queryString[0]) > -1) {
                        queryString = queryString.substr(1)
                    } else {
                        return {}
                    }
                    queryString = queryString.replace(/[\]]/g, '\\$&')
                    var params = {}
                    var queryParts = decodeURI(encodeURI(queryString)).split(/&/g)
                    for (var a = queryParts, i = 0, ii = a.length; i < ii; i++) {
                        var val = a[i]
                        var parts = val.split('=')
                        if ((parts.length >= 1) && (parts[0] !== '')) {
                            var key = null
                            if (parts.length === 2) {
                                key = parts[1]
                            }
                            params[parts[0]] = key
                        }
                    }
                    return params
                }


                var biaOptions = parseQuery(window.location.hash);
                biaOptions.walletcode  = "{{ env('APP_SPORTSBOOK_WALLET_CODE') }}";
                biaOptions.token  = "{{ $player_token }}";
                biaOptions.skinid = 'leprecon';
                biaOptions.page = 'prelive';
                biaOptions.getMarketsCallback = function (result) {
                    if(result.length !== 0){
                        var resultString = JSON.stringify(result);
                        var htmlString = '';
                        for (var eventIdx = 0; eventIdx < result.length; eventIdx++) {
                            var event = result[eventIdx];
                            htmlString += '<br><h3>'+event['EventName'] + '</h3>';
                            var markets = event['Markets'];
                            for (var marketIdx = 0; marketIdx < markets.length; marketIdx++) {
                                var market = markets[marketIdx];
                                htmlString += '<h4>' + market['Name'] + '</h4><table>';
                                var selectionList = market['SelectionList'];
                                for (var selectionIdx = 0; selectionIdx < selectionList.length; selectionIdx++) {
                                    var selection = selectionList[selectionIdx];
                                    htmlString += '<tr><td style="padding-right: 7px;">' + selection['SelectionName'] + ':</td> <td style="text-align: right;"><b>' + selection['Price'] + '</b></td> <td><button id="addSelectionIdBtn" onclick = "onSelectionButtonClick(this)" data-selectionId = "' + selection['SelectionId'] + '">Set</button></td></tr>';
                                }
                            }
                            htmlString += '</table>';
                        }

                        document.getElementById('SelectionsList').innerHTML =  htmlString;
                    }

                };

                biaOptions.setSelectionCallback = function () {
                    document.getElementById('SelectionResult').innerHTML = 'Added to betslip';
                };
                biaOptions.loadCallback = function () {
                    if (betinactionAPI.initParams.full) {
                        document.getElementById("SetPageButtons").style.display = "block";
                        //document.getElementById("SelectionIdForm").style.display = "none";
                    }
                    else {
                        document.getElementById("SetPageButtons").style.display = "none";
                    }
                };
                biaOptions.insufficientBalanceCallback = function () {
                    alert('Insufficient Balance')
                };
                biaOptions.intervalDelay = 100;
                biaOptions.hashchangeCallback = function (hash) {
                    history.pushState(undefined, undefined, hash || '#');
                };
                biaOptions.logoffCallback = function(logoffData){
                    console.log(logoffData);
                };

                var betinactionAPI = new BetinactionAPI("#BIA_client_container", biaOptions);


            </script>
        {{--</iframe>--}}
    </div>


    @include('partials.footer')
</div>

<div id="page-overlay"></div>


<div id="popup">
    <div class="container">

        @include('partials.notification')

        @include('partials.provider-popup')

        @if(\Auth::user())
            @include('partials.profile-popup')
        @else
            @include('partials.registration-popup')
            @include('partials.recover-password-popup')
            @include('partials.login-popup')
        @endif

        @include('partials.deposit-popup')
        @include('partials.assistance-popup')
    </div>
</div>

@include('partials.included_scripts')

<script type="text/javascript">

$(document).ready(function(){
	
	var intervalBalance = setInterval(getBalance, 5000);
	
});

var getBalance = function(){
		
		
		$.post('/player/get-balance',function(result){
			
			var result = JSON.parse(result);
			//console.log(result);
			if( result["status"] == 1 )
			{	
				
				$('.sum').html(result["result"]["balance"]+' <span class="currency">'+result["result"]["currency"]+'</span>');	
				//console.log(result["result"]["balance"]);
			}
			else{
					//console.log("cant update");
			}
			
			
		});
	
		}
	
</script>

</body>
</html>
*/ ?>

@extends('layouts.home')

@section('title', 'Casino')
@section('html_class', 'home-page-html')
@section('body_class', 'casino-page')


@section('content')

    <!--modal-->
    @include('partials.help-block')
    @include('partials.modal-window')
    <!--END-modal-->

    @include('parts.top-block')


    <div class="fixed_game_window hide_el">
        @if(!isset($player_info) && empty($player_balance))
            <script type="text/javascript">
                (function ($) {
                    $( document ).ready(function() {
                        setTimeout(function () {
                            $('.jq_notification-Bettend_register').animate({
                                left: 0
                            }, 400, function() {
                                $(this).css("display", "block");
                            });
                        }, 40000);
                    });
                })(jQuery);
            </script>
        @endif
    </div>

	<?php if($active_menu == 'sport'){ ?>
        @include('parts.sports-header')
    <?php } else { ?>
	<header class="header-casino-page" style="background-image: url(/../img/casino-women-header.jpg);">
        @include('parts.header')
    </header>
	<?php } ?>
    <input type="hidden" id="page_url" value="?tag=video_slots,popular"/>
	<div id="page-bg" style="margin-top:15px;">
        {{--<iframe class="sport-iframe">--}}
            <script type="text/javascript" src="https://sb1client-altenar.biahosted.com/static/AltenarSportsbook.js"></script>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div id="SetPageButtons">
                            {{--<button onClick="betinactionAPI.setPagePrelive()">Prelive</button>--}}
			    @if(!$agent->isMobile())
				<!--<button onClick="betinactionAPI.setPageLive()">Live</button>-->
				{{--<a class="btn sportsbook-button" href="http://sports-itainment.biahosted.com/Generic/live.aspx?skinid=bettend">Live</a>--}}
				
                            @endif
                            {{--<button onClick="betinactionAPI.setPageVfl()">Vfl</button>--}}
                        </div>

                        <div class="content__games1 clearfix1" style="height:auto !important;">
                            <div id="BIA_client_container"></div>
                        </div>
                    </div>
                </div>
            </section>

            <script>
$(document).ready(function(){               
			   function getSelectionsList() {
                    var eventIds = String(document.getElementById("InputeventId").value).split(',');
                    betinactionAPI.getMarkets(eventIds);
                }

                function onSelectionButtonClick(btn) {
                    betinactionAPI.setSelection(btn.dataset.selectionid);
                }

                var parseQuery = function (queryString) {
                    if (((typeof queryString) !== 'string') || (queryString.length === 0)) {
                        return {}
                    }
                    var leadingSymbols = ['?', '#']
                    if (leadingSymbols.indexOf(queryString[0]) > -1) {
                        queryString = queryString.substr(1)
                    } else {
                        return {}
                    }
                    queryString = queryString.replace(/[\]]/g, '\\$&')
                    var params = {}
                    var queryParts = decodeURI(encodeURI(queryString)).split(/&/g)
                    for (var a = queryParts, i = 0, ii = a.length; i < ii; i++) {
                        var val = a[i]
                        var parts = val.split('=')
                        if ((parts.length >= 1) && (parts[0] !== '')) {
                            var key = null
                            if (parts.length === 2) {
                                key = parts[1]
                            }
                            params[parts[0]] = key
                        }
                    }
                    return params
                };

                var urlFromHash = function (hash) {
                    if (hash == '' || hash == '/' || hash == '#/')
                        return '';
                    return hash.substring(2);
                };


                var biaOptions = parseQuery(window.location.hash);
                biaOptions.walletcode  = "{{ env('APP_SPORTSBOOK_WALLET_CODE') }}";
                biaOptions.token  = "{{ $player_token }}";
                biaOptions.skinid = 'bettend';
                biaOptions.lang = "en-GB";
                var page = urlFromHash(window.location.hash);
                if (page == '')
                    page = 'prelive';
                biaOptions.page = page;
                @if($agent->isMobile())
                biaOptions.mobile = true;
                @else
                biaOptions.mobile = false;
                @endif
                biaOptions.getMarketsCallback = function (result) {
                    if(result.length !== 0){
                        var resultString = JSON.stringify(result);
                        var htmlString = '';
                        for (var eventIdx = 0; eventIdx < result.length; eventIdx++) {
                            var event = result[eventIdx];
                            htmlString += '<br><h3>'+event['EventName'] + '</h3>';
                            var markets = event['Markets'];
                            for (var marketIdx = 0; marketIdx < markets.length; marketIdx++) {
                                var market = markets[marketIdx];
                                htmlString += '<h4>' + market['Name'] + '</h4><table>';
                                var selectionList = market['SelectionList'];
                                for (var selectionIdx = 0; selectionIdx < selectionList.length; selectionIdx++) {
                                    var selection = selectionList[selectionIdx];
                                    htmlString += '<tr><td style="padding-right: 7px;">' + selection['SelectionName'] + ':</td> <td style="text-align: right;"><b>' + selection['Price'] + '</b></td> <td><button id="addSelectionIdBtn" onclick = "onSelectionButtonClick(this)" data-selectionId = "' + selection['SelectionId'] + '">Set</button></td></tr>';
                                }
                            }
                            htmlString += '</table>';
                        }

                        document.getElementById('SelectionsList').innerHTML =  htmlString;
                    }

                };

                biaOptions.setSelectionCallback = function () {
                    document.getElementById('SelectionResult').innerHTML = 'Added to betslip';
                };
                biaOptions.loadCallback = function () {
                    // if (betinactionAPI.initParams.full) {
                    //     document.getElementById("SetPageButtons").style.display = "block";
                        //document.getElementById("SelectionIdForm").style.display = "none";
                    // }
                    // else {
                    //     document.getElementById("SetPageButtons").style.display = "none";
                    // }
                };
                biaOptions.insufficientBalanceCallback = function () {
                    alert('Insufficient Balance')
                };
                biaOptions.intervalDelay = 100;
                biaOptions.hashchangeCallback = function (hash) {
                    history.pushState(undefined, undefined, '#' + hash || '#');
                };
                biaOptions.logoffCallback = function(logoffData){
                    console.log(logoffData);
                };

                var betinactionAPI = new AltenarSportsbook("#BIA_client_container", biaOptions);

	});
            </script>
        {{--</iframe>--}}
    </div> 
    <!--<div class="main-casino-wrapper jq_casino_content">
       
        <iframe src="https://sb1client-altenar.biahosted.com/?skinid=bettend#/" style="width:100%;height:auto"> </iframe>
	
        </section>

    </div> -->
   <!-- {{{-- @include('casino_parts.modal-play-mode') --}}} -->

    @include('parts.footer')

@endsection

