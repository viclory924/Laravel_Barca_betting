//========== Resize ==========//
var gameProportion;
function gamesResize() {
		if ($('div').is('.game-link')) {
			var wrapperWidth = $('.main-wrapper').width();
			var gameWidth;
			if ($(window).width() < 450) {
				gameWidth = (wrapperWidth - 24)/2;
			}else if ($(window).width() < 600) {
				gameWidth = (wrapperWidth - 36)/2;
			}else if($(window).width() < 900) {
				gameWidth = (wrapperWidth - 48)/3;
			}
			else if($(window).width() < 1366){
				gameWidth = (wrapperWidth - 60)/4;
			}
			else{
				gameWidth = (wrapperWidth - 60)/5;
			}
			$('.game-link').width(gameWidth);
			$('.games-filter-wrapper').width((gameWidth*2)-2);
			$('.category-tile').width(gameWidth);
			var mainWidth = (wrapperWidth-12);
			$('.main-filter-menu').width(mainWidth);
			$('.main-filter .filtergames').width(mainWidth);
		}
		if ($('div').is('.filtergames')) {
			if (($(window).width() < 992)) {
				var filterWidth = ($('.filter-games-scroll-wrapper-hidden').width() - 10)/3;
				filterWidth = filterWidth * $('.filtergames .bigtab').length;
				$('.filtergames').width(filterWidth);
				
			}
			var btWidth = $('.filtergames').width()/($('.filtergames .bigtab').length)
			$('.filtergames .bigtab').width(btWidth);
		}

	}

//========== modal ==========//

function modalWindowOpen(){
	$('body, html').css('overflow', 'hidden');
	$('.modal-account.account').css('display', 'none');
	$('.modal-deposite-frame-wrapper').css('display', 'none');
	$('.modal-notification').css('display','none');
	$('.modal-providers-popup').css('display','none');
	$('.modal-dialog').removeAttr('style');
	$('.modal-content').removeAttr('style');
	$('.modal-content > div').css('display', 'none');
	$('.modal-window').css('display', 'block');
	$('.modal-window').animate({opacity: 1}, 300);
	//$('.body-container').attr('style', 'filter: blur(5px);');
	// $('.modal-dialog').css('width', '535px');
}

 window.invokeNotification = function(flag,title,text){
	
	$('.modal-notification h2').html(title);
	if(flag == 1)
	{
			$('.modal-notification h2').css('color','#debc6f');
	}	
	else
	{
		$('.modal-notification h2').css('color','#dc4141');
	}
	$('.modal-notification p').html(text);
	modalWindowOpen();
	$('.modal-notification').css('display','block');
}

function activeDepositOpen(argument) {
	$('.deposit-active-wrapper').css('display', 'block');
}

function passwordRecovery(argument) {
	$('.password-recovery-wrapper').css('display', 'block');
}

function loginEnter(argument) {
	//alert('yes');
	$('.modal-login-wrapper').css('display', 'block');
}

function accountEnter(argument)
{	//alert('yes');
	$('.modal-account.account').css('display', 'block');
	$('div[data-id="profile"]').click();
}


function registerChoice(argument) {
	$('.createaccount').css('display', 'flex');
	// $('.modal-dialog').css('max-width', '950px');
	$('.modal-dialog').css({
		'max-width': '950px',
		'min-width': '950px'
	});

	$('.boxes-holder').css('display', 'none');
	$('.choise-register').css('display', 'block');
}
$(document).ready(function() {

if ($('div').is('.scrollong-item')) {
	$('.scrollong-item').each(function(index, el) {
	//	scrollItemScroll($(this));
	});
}

$('.notification-btn').click(function(event) {
 $(this).parent().animate({
  left: 400},
  400, function() {
  $(this).css('display', 'none');
 });
});





function fullScreenCancel() {
  if(document.exitFullscreen) {
   document.exitFullscreen();
  } else if(document.mozCancelFullScreen) {
   document.mozCancelFullScreen();
  } else if(document.webkitExitFullscreen) {
   document.webkitExitFullscreen();
  
  }
  setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-frame,#game-box-holder,.game-window-wrapper').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 600);		
}
function fullScreenOpen() {

 var element = document.body;
  var req = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen;
  if(req){
   req.call(element);
  }else{
   var wscript = new ActiveXObject("Wscript.shell");
   wscript.SendKeys("{F11}");
  }
  setTimeout(function () {
            windowGameHeight = $(window).height() - 160;
            $('#game-frame,#game-box-holder,.game-window-wrapper').css({width: windowGameHeight * gameProportion, height: windowGameHeight});
        }, 600);	
  return false;
}

$('.fullscreen').click(function(event) {
 $(this).toggleClass('fsa');
 if ($(this).hasClass('fsa')) {
  fullScreenOpen();
 }else{
  fullScreenCancel();
 }
});

$('.hearts-like, .game-like').click(function(event) {
  $(this).toggleClass('like-active');
 });






$('.quick-register-start').click(function(event) {
	$('.boxes-holder').css('display', 'none');
	$('.quick-register-block').css('display', 'block');
	if ($(window).width() < 992) {
		$('.modal-content').css('min-height', '800px');
	}
});

$('.full-register-start').click(function(event) {
	$('.boxes-holder').css('display', 'none');
	$('.full-register-block').css('display', 'block');
	if ($(window).width() < 992) {
		$('.modal-content').css('min-height', '1140px');
	}
});

$('.account-trigger').click(function(event) {
	modalWindowOpen();
	loginEnter();
});

$('.pass-recov-trigger').click(function(event) {
	modalWindowOpen();
	$('.modal-login-wrapper').css('display', 'none');
	passwordRecovery();
});

$('.full-register-next-step-reg').click(function(event) {
	$('.full-register-block-1').css('display', 'none');
	$('.full-register-block-2').css('display', 'block');
});

$('.depos-btn-down,.deposit_btn_invoker').click(function(event) {
	modalWindowOpen();
	activeDepositOpen();
});

$('.in-game-deposit').click(function(event){

	event.preventDefault();
	$('body, html').css('overflow', 'hidden');
	$('.modal-account.account').css('display', 'none');
	$('.modal-deposite-frame-wrapper').css('display', 'none');
	$('.modal-notification').css('display','none');
	$('.modal-providers-popup').css('display','none');
	$('.modal-dialog').removeAttr('style');
	$('.modal-content').removeAttr('style');
	//$('.modal-content > div').css('display', 'none');
	$('.modal-window').css('display', 'block');
	$('.modal-window').animate({opacity: 1}, 300);
	
	if(localStorage) {
    // Store data
	
    localStorage.setItem("saveCurrentGame",$('.in-game-deposit').attr('data-game-id'));
    
    // Retrieve data
    } 
	activeDepositOpen();	
});

$('.register-modal').click(function(event) {
	modalWindowOpen();
	registerChoice();
});

//========== modal ==========//



$('.menu-pc .menu-item').click(function(event) {
	$('.menu-pc .menu-item').removeClass('current');
	$(this).addClass('current');
	var id = $(this).attr('data-id');
	var parent = $(this).closest('.modal-account');
	$('.sub-items', parent).css('display', 'none');
	$('.'+id+'', parent).css('display', 'block');
	$('.account-content-tab', parent).css('display', 'none');
	$('.'+id+'-content-wrapper', parent).css('display', 'block');
});


$('.sub-item').click(function(event) {
	var parentMenu = $(this).parent();
	var parentCategory = parentMenu.attr('parent-id');
	var target = $(this).attr('data-id');
	target = target + '-tab-content';
	$('.sub-item', parentMenu).removeClass('current');
	$(this).addClass('current');
	parentCategory = parentCategory + '-content-wrapper';
	$('.'+parentCategory+' >div').css('display', 'none');
	$('.'+parentCategory+' .'+target+'').css('display', 'block');
});


	//gamesResize();

function helpBlockClose(){
	$('.help-block').removeClass('opened');
	$('.help-block').animate({
		right: '-400px'
	},
		500, function() {
		$('.help-block').css('display', 'none');

	});
	$('.active-help').removeClass('active-help');
}

function helpBlockOpen(){
	$('.help-block').css('display', 'block');
		$('.help-block').animate({
			right: '-17px'
		},
			500, function() {
			$('.help-block').addClass('opened');
		});
}

function closeFirstScreenHelp() {
	$('.help-back').css('display', 'inline-block');
	$('.first-screen').animate({
		top: '-'+($(".first-screen").height()+100)+'px'},
		1000, function() {
			$(".first-screen").css('display', 'none');
	});
}
function openFirstScreenHelp() {
	$('.help-back').css('display', 'none');
	$(".first-screen").css('display', 'block');
		$(".other-screen").each(function(index, el) {
			$(this).animate({
				top: ''+($(".other-screen").height()+100)+'px'
			},1000, function() {
				$(this).css('display', 'none');
			});
		});

	$('.first-screen').animate({top: 0}, 1000);
}





	// определяем массивы имен для месяцев и дней недели
	var monthNames = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря" ]; 
	var dayNames= ["воскресенье","понедельник","вторник","среда","четверг","пятница","суббота"]

	// создаем новый объект для хранения даты
	var newDate = new Date();
	 
	// извлекаем текущую дату в новый объект
	newDate.setDate(newDate.getDate());
	 
	// выводим день число месяц и год
	$('#Date').html(newDate.getDate() + ' ' + monthNames[newDate.getMonth()]);

	setInterval( function() {
		// создаем новый объект для хранения секунд
		var seconds = new Date().getSeconds();
		// добавляем отсутствующий ноль
		$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);

	setInterval( function() {
		// создаем новый объект для хранения минут
		var minutes = new Date().getMinutes();
		// добавляем отсутствующий ноль
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	},1000);

	setInterval( function() {
		// создаем новый объект для хранения часов
		var hours = new Date().getHours();
		// добавляем отсутствующий ноль
		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	}, 1000);





	function colCenterResize(){
		if ((navigator.userAgent.match(/IEMobile/i))||(navigator.userAgent.match(/Opera Mini/i))||(navigator.userAgent.match(/iPhone|iPad|iPod/i))||(navigator.userAgent.match(/BlackBerry/i))||(navigator.userAgent.match(/Android/i))) {
			$('.col-center .page-container').addClass('mobile');
		} else {
			$('.col-center .page-container').removeClass('mobile');
		}
		var sideColsWidth = $('.col-left').width() + $('.col-right').width();
		var mainWidth = $('body').width();
		var newWidth = mainWidth - sideColsWidth;


		$('.col-center').width(newWidth);
		$('.col-center .page-container').width(newWidth + 40);

		liveMatchResize();
		loadProgressBar();
		if ($('div').is('.home-page-menu-wrapper')) {

			if ($(window).height() < 500){
				$('.home-page-menu-wrapper').height($(window).height() - 73);
			} else {
				$('.home-page-menu').height($(window).height() - 73);
			}
		}
		if ($('div').is('.home-page-menu')) {
			var leftMargin = $('.home-page-menu').offset().left + 10;
			$('.sport-table-header-top-line').css({
				'padding-left': leftMargin,
				'padding-right': leftMargin
			});
		}
	}
	function containersHeight(){
		var hHeight = $('header').height();
		var wHeight = $(window).height();
		var newHeight = wHeight - hHeight;
		$('.page-container').css('height', ''+newHeight+'px');
		$('.baron__scroller').css('max-height', ''+newHeight+'px');
	}
	function liveMatchResize(){
		if ($('div').is('.live-match-current')) {
			$('.live-match-current').each(function(index, el) {
				var infoWidth = $('.live-match-info', this).width() + 40;
				var wrapperWidth = $(this).parent().width();
				$('.live-match-bets', this).width(wrapperWidth-infoWidth);
			});
		}
	}
	function loadProgressBar(){

		if ($('div').is('.col-right-match-info-progressbar')) {
			var progressMatch = $('.col-right-match-info-progressbar').attr('progress');
			var width = $('.col-right-match-info-progressbar').width();
			$('.col-right-match-info-progressbar .bar').css('width', ''+(progressMatch*width)+'px');
			if ($('div').is('.col-right-match-info-progressbar .event')) {
				$('.col-right-match-info-progressbar .event').each(function(index, el) {
					var timing = $(this).attr('timing');
					$(this).css('left', ''+((width*timing)-3)+'px');
				});
			}
		}
	}


	function initCircle(target){

		var value_team_1 = Number($(''+target+'').attr('team_1'));
		var value_team_2 = Number($(''+target+'').attr('team_2'));
		var total = value_team_1 + value_team_2;
		var value = value_team_2 / total;
		if (!value_team_2) {
			value = 0.5;
		}
		$(''+target+'').circleProgress({
			startAngle: -Math.PI * value,
			value: value,
			size: 35,
			animation: false,
			fill: {gradient: ['#ff0202', '#ff0202']},
			emptyFill: "#f2e513"
		})
	}


	function initLineStat(target){

		var bar = $(''+target+' .line-bar');
		var value_team_1 = Number($(''+target+'').attr('team_1'));
		var value_team_2 = Number($(''+target+'').attr('team_2'));
		var total = value_team_1 + value_team_2;
		var width = $(''+target+'').width();
		var barWidth = width * (value_team_1 / total);

		bar.width(barWidth);
	}

	containersHeight();
	colCenterResize();
	$(window).resize(function(event) {
		colCenterResize();
		containersHeight();
		gamesResize();
	});




	$('.to-favorite').click(function(event) {
		$(this).toggleClass('active');
	});


	$('.help-close, .active-help').click(function(event) {
		helpBlockClose();
	});
	/*$('.help-toggle').click(function(event) {
		if (!$(this).hasClass('active-help')) {
			helpBlockOpen();
			$(this).addClass('active-help');
		} else {
			helpBlockClose();
		}
		

	});
*/
	$('.help-back').click(function(event) {
		openFirstScreenHelp()
	});
	$('.live-chat').click(function(event) {
	$('.chat-screen').css('display', 'block');
	closeFirstScreenHelp();
	$('.chat-screen').animate({
		top: 0},
		1000, function() {
		// stuff to do after animation is complete 
	});
});
$('.support-message').click(function(event) {
	$('.message-to-support').css('display', 'block');
	closeFirstScreenHelp();
	$('.message-to-support').animate({
		top: 0},
		1000, function() {
		// stuff to do after animation is complete 
	});
});
$('.find-answers').click(function(event) {
	$('.faq').css('display', 'block');
	closeFirstScreenHelp();
	$('.faq').animate({
		top: 0},
		1000, function() {
		// stuff to do after animation is complete 
	});
});


	$('.col-left-toggle').click(function(event) {
		$(this).toggleClass('active');
		if ($(this).hasClass('active')) {
			$('.col-left-live-now').css('display', 'none');
			$('.col-left-main-categories > li span').css('display', 'none');
			$('.col-left-main-categories > li i').css('margin', '0');
			$('.col-left').css({
				width: '55px',
			});
			colCenterResize();
			$('.col-left-main-categories').css('width', '44px');
			$('.col-left-search').addClass('no-placeholder');
			$('.col-left-search input').css('display', 'none');
			$('.col-left-search button').css('display', 'none');
			$('.col-left-toggle').css({
				left: '3px',
				'margin-bottom': '5px'
			});
			$('.col-left-content').addClass('toggled');
		}else{
			$('.col-left').css({
				width: '290px',
				padding: '0'
			});
			colCenterResize();
			$('.col-left-search input').css('display', 'block');
			$('.col-left-search button').css('display', 'inline-block');
			$('.col-left-toggle').removeAttr('style');
			$('.col-left-main-categories').css('width', '100%');
			$('.col-left-main-categories > li span').css('display', 'inline-block');
			$('.col-left-main-categories > li i').css('margin-right', '15px');
			$('.col-left-content').removeClass('toggled');
			$('.col-left-live-now').css('display', 'block');
		}
	});
	$('.left-col-categories-level-2-trigger').click(function(event) {
		var parent = $(this).parent();
		$(this).toggleClass('active');
		$('.left-col-category-level-3', parent).slideToggle(400);
		$('.col-left-live-match-info', parent).slideToggle(400);
	});
	$('.left-col-categories-level-1-trigger').click(function(event) {
		var parent = $(this).parent();
		$(this).toggleClass('active');
		$('.left-col-category-level-2', parent).slideToggle(400);
	});
	$('.left-col-category-name').click(function(event) {
		$('.left-col-category-name').removeClass('active');
		$(this).addClass('active');
	});
	$('.live-match-bet, .additional-bets-bet').click(function(event) {
		if (!$(this).hasClass('bet-closed')) {
			$(this).toggleClass('active-bet');
		}
	});
	$('.col-left-live-match').click(function(event) {
		$('.col-left-live-match-wrapper').removeClass('active');
		$(this).parent().addClass('active');
	});
	$('.col-center-block-name').click(function(event) {
		$(this).toggleClass('closed');
		var parent = $(this).parent();
		if ($(this).hasClass('closed')) {
			$('.col-center-block-container', parent).attr('height', ''+$('.col-center-block-container', parent).height()+'');
			$('.col-center-block-container', parent).animate({
				height: 0},
				400, function() {
					$('.col-center-block-name', parent).css({
						'border-bottom-left-radius': '5px',
						'border-bottom-right-radius': '5px'
					});
			});
		}else{
			$('.col-center-block-name', parent).css({
				'border-bottom-left-radius': '0px',
				'border-bottom-right-radius': '0px'
			});
			$('.col-center-block-container', parent).animate({
				height: $('.col-center-block-container', parent).attr('height')},
				400, function() {
					$('.col-center-block-container', parent).removeAttr('style');
			});
		}
		
	});
	$('.col-right-func-audio').click(function(event) {
		$(this).toggleClass('toggled');
	});
	$('.col-center-live-soon-category-name').click(function(event) {
		var parent = $(this).parent();
		$(this).toggleClass('active');
		$('.col-center-live-soon-category-inner', parent).slideToggle(400);
	});
	$('.col-right-func-stream').click(function(event) {
		$('.col-right-func-stream').removeClass('active');
		$(this).addClass('active');
	});
	$('.col-right-func-resize').click(function(event) {
		$(this).toggleClass('toggled');
		$('.col-right').toggleClass('big-right-menu');
		colCenterResize();
	});
	$('.col-right-func-toggle').click(function(event) {
		$('.col-right-match-info').slideToggle(400);
		$(this).toggleClass('active');
	});
	$('.match-lock-toggle').click(function(event) {
		$(this).toggleClass('locked');
	});

	$('.col-right-match-info-stat-trigger').click(function(event) {
		$(this).toggleClass('active');
		$('.col-right-additional-stat').slideToggle(400);
	});
	$('.col-right-match-bet-coupon-header').click(function(event) {
		$('.col-right-match-bet-coupon-content').slideToggle(400);
	});

	$('.col-right-func-select-header, .col-right-func-select-toggle').click(function(event) {
		var parent = $(this).parent();
		//$('.col-right-func-select-options-wrapper', parent).slideToggle(400);
	});
	$('.col-right-func-select-options li').click(function(event) {
		var target = $(this).closest('.col-right-func-select');
		$('.col-right-func-select-header',target).html($(this).html());
		if ($('div').is('.img-deposit')) {
			$('.img-deposit img', target).attr('src', $(this).attr('img'));
			$('input[name="payment_method"]').val($(this).attr('data-gateway_name'));
		}
		
		//$(this).closest('.col-right-func-select-options-wrapper').slideToggle(400);
	});
	$('.col-center-sort-header').click(function(event) {
		var parent = $(this).parent();
		if ($('div').is('.col-center-live-bet-content', parent)) {
			$('.col-center-live-bet-content', parent).slideToggle(400);
			$(this).toggleClass('toggled');
		}
	});
	$('.match-additional-bets-toggle').click(function(event) {
		$(this).toggleClass('toggled');
		var parent = $(this).closest('li');
		$('.additional-bets', parent).slideToggle(400);
	});
	$('.col-right-block-header').click(function(event) {
		var parent = $(this).parent();
		$(this).toggleClass('toggled');
		$('.col-right-block-content', parent).slideToggle(400);
	});

	$('.additional-bets-line-header').click(function(event) {
		$(this).toggleClass('toggled');
		var parent = $(this).parent();
		$('.additional-bets-container', parent).slideToggle(400)
	});
	$('.button-stream').click(function(event) {
		var parent = $(this).parent();
		$('.button-stream', parent).removeClass('active');
		$(this).addClass('active')
	});
	$('.col-center-live-tabs li').click(function(event) {
		var parent = $(this).closest('.col-center-block-container')
		$('.col-center-live-tabs li', parent).removeClass('active');
		$(this).addClass('active');
		var id = $(this).attr('id');
		$('.tab', parent).removeClass('active');
		$('.'+id+'', parent).addClass('active');
	});
	$('.language-select-content li').click(function(event) {
		$('.language-select-content li').removeClass('selected');
		$(this).addClass('selected');
	});


	$('.account-category-select li').click(function(event) {
		var parent = $(this).attr('category');
		var item = $(this).attr('inner');
		$('.account-content-tab').css('display', 'none');
		$('.account-content-tab>div').css('display', 'none');
		$('.'+parent+'-content-wrapper').css('display', 'block');
		$('.'+item+'-tab-content').css('display', 'block');
	});

	$('.col-right-bet-info-bet').click(function(event) {
		$(this).toggleClass('toggled');
	});

	$('.mobile-menu-toggle').click(function(event) {
		$('.hidden-mobile-menu').css('display', 'block');
		$('.hidden-mobile-menu').animate({left: 0}, 400);
	});
	$('.hidden-mobile-menu .icon-close2').click(function(event) {
		$('.hidden-mobile-menu').animate({
			left: '-200px'},
			400, function() {
			$('.hidden-mobile-menu').css('display', 'none');
		});
	});


	function baronInit(){
		baron({
			root: '.baron',
			scroller: '.baron__scroller',
			bar: '.baron__bar',
			scrollingCls: '_scrolling',
			draggingCls: '_dragging'
		}).fix({
			elements: '.header__title',
			outside: 'header__title_state_fixed',
			before: 'header__title_position_top',
			after: 'header__title_position_bottom',
			clickable: true
		}).controls({
			// Element to be used as interactive track. Note: it could be different from 'track' param of baron.
			track: '.baron__track',
			forward: '.baron__down',
			backward: '.baron__up'
		})
	}

	$('.scrollong-item').scroll(function() {
		scrollItemScroll($(this))
	});

	$('.go-to-right').click(function(event) {

		var scrolling = $(this).closest('.scrollong-item');
		var width = scrolling[0].scrollWidth - scrolling.width();
		scrolling.animate({scrollLeft: width}, 400);

	});
	$('.go-to-left').click(function(event) {
		var scrolling  = $(this).closest('.scrollong-item');
		scrolling.animate({scrollLeft: 0}, 400);
	});
	baronInit();
	if ($('div').is('.col-right-additional-stat-circle-block')) {
		$('.col-right-additional-stat-circle-block').each(function(index, el) {
			var id = '#'+$(this).attr('id');
			initCircle(id);
		});
	}

	if ($('div').is('.col-right-additional-stat-line-block')) {
		$('.col-right-additional-stat-line-block').each(function(index, el) {
			var id = '#'+$(this).attr('id');
			initLineStat(id);
		});
	}

	var currentTime = new Date();
	$('#gmt_plus').html(-(currentTime.getTimezoneOffset()/60));
});



jQuery(document).ready(function($) {
	$('.slick-list').trigger('click')
	var clearGames = false
	//winnerBorderUpdate()
	curryncyUpdate()

	if ($('div').is('.main-menu')) {
		var topMenuOffset = $('.main-menu').offset().top
	}
	if ($('div').is('.filtergames')) {
		var secondMenuOffset = $('.filtergames').offset().top
	}else if($('div').is('.main-menu')){
		var secondMenuOffset = $('.main-menu').offset().top
	}

	function scrollUpMenuShow(){
		if ($(window).scrollTop()>topMenuOffset) {
			$('.main-menu').css({
				width: '100%',
				'max-width': $('.main-filter').width() -12
			});
			$('.main-menu').addClass('menu_line_fixed');
		} else {
			$('.main-menu').removeAttr('style');
			$('.main-menu').removeClass('menu_line_fixed');
		}
	}

	function scrollDownMenuHide(){
		$('.main-menu').removeAttr('style');
		$('.main-menu').removeClass('menu_line_fixed');
	}

	function scrollDownSecondMenu(){
		if ($(window).scrollTop()>secondMenuOffset) {
			if ($('.main-menu')[0].hasAttribute("style")) {
				$('.filter-games-scroll-wrapper-hidden').css({
					top: '-23px',
					width: $('.main-filter').width() -12
				});

				$('.filter-games-scroll-wrapper-hidden').addClass('filter_line_fixed');
			}else{
				$('.filter-games-scroll-wrapper-hidden').css({
					top: '-72px',
					width: $('.main-wrapper').width() -12
				});
				$('.filter-games-scroll-wrapper-hidden').addClass('filter_line_fixed');
			}
		} else {
			$('.filter-games-scroll-wrapper-hidden').css('top', 'auto');
			$('.filter-games-scroll-wrapper-hidden').removeClass('filter_line_fixed');
		}
	}
	if ($('div').is('.main-menu')) {
		$('.main-menu').width(($('.main-filter').width() -12))
	}
	if ($('div').is('.filter-games-scroll-wrapper-hidden')) {
		$('.filter-games-scroll-wrapper-hidden').width(($('.main-filter').width() -12))
	}
	$(window).resize(function(event) {
		if ($('div').is('.main-menu')) {
			$('.main-menu').width(($('.main-filter').width() -12))
		}
		if ($('div').is('.filter-games-scroll-wrapper-hidden')) {
			$('.filter-games-scroll-wrapper-hidden').width(($('.main-filter').width() -12))
		}
	});

	var lastScrollTop = 0;

	$(window).scroll(function(event) {
		var st = $(this).scrollTop();
		if (st > lastScrollTop){
			scrollDownMenuHide()
			scrollDownSecondMenu()
		} else {
			scrollUpMenuShow()
			scrollDownSecondMenu()
		}
		lastScrollTop = st;
	});

	$('.btn-provide').click(function (event) {

		if ($(this).hasClass('active')) {
			$('.games-filter-wrapper').css('display', 'none');
			$(this).removeClass('active');
			if ($(window).width() < 900) {
				$('.games').removeAttr('style');
			}
		} else {
			$('.games-filter-wrapper').css('display', 'block');
			$(this).addClass('active');
			if ($(window).width() < 900) {
				$('.games').css('padding-top', $('.games-filter-wrapper').height() + 5);
			}
			$('.az-filter').removeClass('active');
		}
	});

	$('.az-filter').click(function(event) {
		$(this).addClass('active');
		$('.games-filter-wrapper').css('display', 'none');
		$('.btn-provide').removeClass('active');
		$('.games').removeAttr('style');

	});


	$('.search.search-line-toggle.mobile-search').click(function(event) {
		event.preventDefault();
		if ($(window).width() < 901) {
				
			if ($(this).hasClass('active') == true) {
				//alert('clicked twise');
				$('.search-line-toggle').removeClass('active');
				$('.mobile-search-wrapper').css('display', 'block');
				$('.main-menu, .filter-games-scroll-wrapper-hidden, .hidden-mobile-menu').addClass('search-opened');
				$('.mobile-search-wrapper').animate({top: 0}, 200);
			}else{
				$('.search-line-toggle').addClass('active');
				$('.main-menu, .filter-games-scroll-wrapper-hidden, .hidden-mobile-menu').removeClass('search-opened');
				$('.mobile-search-wrapper').animate({
					top: '-50px'},
					250, function() {
					$('.mobile-search-wrapper').css('display', 'none');
				});
			}
			
		}
		 return false;
	});

	
function curryncyUpdate(){
		$('.winners-currency').each(function(index, el) {
			var currency = $(this).text()
			if (currency == 'USD') {
				$(this).addClass('usd')
				$(this).text('')
			} else if (currency == 'RUB') {
				$(this).addClass('rub')
				$(this).text('')
			} else if (currency == 'EURO') {
				$(this).addClass('euro')
				$(this).text('')
			} else{
				return;
			}
		});
	}



}); 


	var $html = $('html'); //, isTouch = $html.hasClass('touchevents');
    var $body = $('body');
    var windowWidth = Math.max($(window).width(), window.innerWidth);
	var merchant_id = merchant_id;
    var selected_games_type = 'slot';
    var selected_vendor = null;
    var popular_games_limit = 20;
    var new_games_limit = 10;
    var all_games_limit = 30;
    var load_more_limit = 60;
    var last_games_quantity = 20;
    var remove_empty_sections = false;
    var mobile = $('html').hasClass('touchevents');
   
    if (!$.cookie('last_games')) {
        var last_games = new Array();
        $.cookie('last_games', last_games);
    } else {
        var last_games = $.cookie('last_games').split(',');
    }

    var filter_params = {
        game_type: (casino_type == 'casino') ? 'slot' : 'all-tables',
        casino_type: casino_type,
        request_total_count: true,
        locale: $.cookie('locale'),
        append: false,
        type: 'popular',
		sub_container : false,
		is_mobile : mobile,
		merchant_id : merchant_id,
		limit : 60,
		sorting : false
		
    };

    if (typeof casino_type != undefined) {
        $.extend(filter_params, {casino_type: casino_type});
    }
	
	 var setFilterParam = function(obj) {
        $.extend(filter_params, obj);
    }
	
	var clearFilterObj = function() {
        delete filter_params.vendor;
        delete filter_params.search;
        delete filter_params.exclude_popular;
        delete filter_params.exclude_new;
        delete filter_params.exclude_all;
        delete filter_params.exclude_vendor;
        delete filter_params.type;
		delete filter_params.limit;
        if (filter_params.casino_type == 'casino') {
            setFilterParam({game_type: 'slot'});
        } else {
            setFilterParam({game_type: 'all-tables'});
        }

        setFilterParam({append: false});

        return true;
    }
	
	// End : of global variables


//Newly added function - geBalance
$(document).ready(()=>{
	
	//Declare Global Variables
		//alert(logged);
		var getNewGames = function(){
        // console.log('getAllGames');
        setFilterParam({type: 'new', limit: 15,sub_container:false});
        getGames(false,filter_params);
		var label = $('label[for="new"]').html();
		$('div[data-title="new"]').html(label+' Games');
		return true;
    }
		
	 var getAllGames = function(){
        // console.log('getAllGames');
        setFilterParam({type: 'all', limit: 30,sub_container:false});
        getGames(true,filter_params);
		var label = $('label[for="all"]').html();
		$('div[data-title="all"]').html(label+' Games');
		return true;
    }
	
	var getSortedGames = function(){
        // console.log('getAllGames');
        setFilterParam({type: 'a-z', limit: 30,sub_container:false,sorting:true});
        getGames(false,filter_params);
		var label = $('label[for="all"]').html();
		$('div[data-title="all"]').html('A-Z Games');
		return true;
    }
	
	 var getPopularGames = function(){
        // console.log('getAllGames');
        setFilterParam({type: 'popular', limit: 15,sub_container:false});
        getGames(true,filter_params);
		var label = $('label[for="popular"]').html();
		$('div[data-title="popular"]').html(label+' Games');
		return true;
    }
	
	// FUnction to Set Inital Params
	
	
	
	// Function to get Games
	var getGames = function(append = false,filters,load_more_trigger=false){
		 
			var isMobile = false; //initiate as false
			// device detection
			if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
            || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) 
			{
				isMobile = true;
			}
			if (isMobile == true) {
				$.extend(filter_params, {is_mobile: true});
			}
		    
			var filters = filter_params;
			
		    $.ajax({
			url : '/games',
			async : false,
			type : 'POST',
			data : filters,
			success : function(response){
			var response = JSON.parse(response);
			//console.log(response);
		    var games = response.result;
			//console.log(games.length);
			if(!mobile)
			{
				var widthString =  'style=""';
			}
			else
			{
				var widthString = '';
			}
			
			if(load_more_trigger == false)
			{
				if(filter_params.type != 'all')
				{
					var string = '<div class="main-wrapper games casino_page">';
				}
				else
				{
					var string = '<div class="main-wrapper all-game-container games casino_page">';
				}
			
			
			if( filters.type == 'vendor' )
			{
					if(games[0]["vendor"]["display_name"] == null || games[0]["vendor"]["display_name"] == 'null')
					{
						var display_name = games[0]["vendor"]["name"].toLowerCase();
						if(display_name.includes("gaming"))
						{
							var display_name = games[0]["vendor"]["name"];
						}
						else if(display_name.includes("games"))
						{
							var display_name = games[0]["vendor"]["display_name"];
						}
						else
						{
							var display_name = games[0]["vendor"]["name"]+'</br>Games';
						}
					}
					else
					{
						var display_name = games[0]["vendor"]["display_name"].toLowerCase();
						//alert(display_name);
						if(display_name.includes("gaming"))
						{
							var display_name = games[0]["vendor"]["display_name"];
							
						}
						else if(display_name.includes("games"))
						{
							var display_name = games[0]["vendor"]["display_name"];
						}
						else
						{
							
							var display_name = games[0]["vendor"]["display_name"]+'</br>Games';
						}
						
					}
					string += '<div class="category-tile" '+widthString+'><div class="title" data-title="'+display_name+'" style="font-size:18px;">'+display_name+'</div></div>';
			}
			else if(filters.type == 'search')
			{
				if( response['total_count'] == 0 )
				{
						string += '<div class="category-tile" '+widthString+'><div class="title" style="font-size:18px;">No Games Found</div></div>';
				}
				else
				{
					string += '<div class="category-tile" '+widthString+'><div class="title" style="font-size:18px;">SEARCH RESULT</div></div>';
				}
				
			}
			else{
				if(filters.type == undefined)
				{
					string += '<div class="category-tile" '+widthString+'><div class="title" data-title="'+filters.type+'" style="font-size:18px;">'+filters.game_type+' Games</div></div>';
				}
				else
				{
					string += '<div class="category-tile" '+widthString+'><div class="title" data-title="'+filters.type+'" style="font-size:18px;">'+filters.type+' Games</div></div>';
				}
				
			}
			}
			else
			{
				var string = '';
			}
			
			$.each(games,function(index,value){
				value.game_img = value.game_img.replace("134.209.251.124", "yayaxl1.com");
				//console.log(value.iframe_logged);
				
				if(!logged)
				{
					var playClassName = 'custom-play-game';
				}
				else
				{
					var playClassName = 'custom-play-game';
				}
				
				string += '<div style="background-size:cover;background-repeat:no-repeat;background-position:center" data-game-id="' + value.id + '" data-fav="'+value.is_fav+'" class="game-link" name="leprechaun" '+widthString+'>';
						  if( value.is_new == 1 )
						  {
							string += '<div class="badge-wrapper">'+
						  '<i class="badge-new" title="New"></i>'+
						  '<span class="badge-label false">New</span>'+
						  '</div>';
						  }
				string += '<a data-fav="'+value.is_fav+'" data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" data-touch-popup="choose-game-popup" data-popup="authorization" data-img-src="'+value.game_img+'">'+
						  '<div data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="'+value.id+'" data-fav="'+value.is_fav+'" data-src="'+value.iframe_logged+'" class="game-link-icon" style="background-image: url('+value.game_img+');background-size:cover;background-repeat:no-repeat;background-position:center"></div>'+
						  '<span class="game-link-bg"></span>'+
						  '<span class="icon-play-wrapper">';
				string +='<i data-src="'+value.iframe_logged+'" data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" class="icon-play-button play-game" aria-hidden="true"></i></span>';  
						  
						  if (value.has_demo == null || value.has_demo == 1) {
							 
							   if(!logged)
							   {
								string += '<span data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="'+value.id+'" data-fav="'+value.is_fav+'" data-src="'+value.iframe_logged+'" class="play-game-title">Play for free</span>';
							   }
						  }
						  							  
				string += '</a>'+
						  '<div class="game-name">'+
						  '<div class="hearts-like" data-fav="'+value.is_fav+'" data-game-id="'+value.id+'" >';
						  if(logged)
						  {
							if(value.is_fav == 1)
							{
								string += '<i class="fa fa-heart" aria-hidden="true"></i>';
							}
							else
							{
								string += '<i class="fa fa-heart-o" aria-hidden="true"></i>';
							}
						  }
						  else
						  {
							 string += '<i class="fa fa-heart-o" aria-hidden="true"></i>'; 
						  }
				
					 	  
				string += '</div>'+
						  '<span data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="'+value.id+'" data-fav="'+value.is_fav+'" data-src="'+value.iframe_logged+'" style="cursor:pointer" class="'+playClassName+'" >'+value.name+'</span>'+
						  '</div>'+
						  '</div>';
				
			});
			if(load_more_trigger == false)
			{
			string += '</div>';
			if(response.show_more == true)
			{	
				if(filter_params.type != 'new' && filter_params.type != 'popular')
				string += '<div style="text-align:center;position:relative;padding-top:3%;padding-bottom:3%"><a href="#" class="casino_promo_btn load-more-button">Load More</a></div>';
			}
			}
			
			if(load_more_trigger == false)
			{
			
			if( append == false )
			{
				//alert('no append');
				$('.casino-page-content').html(string);
			}
			else
			{
				$('.casino-page-content').append(string);	
			}
			}
			else
			{
				if(filter_params.type == 'all')
				{
					$('.main-wrapper.games.casino_page.all-game-container').append(string);
				}
				else
				{
					$('.main-wrapper.games.casino_page').append(string);
				}
					
			}
			
			//console.log(games);
			//console.log(filter_params);
			gamesResize();
			
					
			}
		});
		
		
		
	}
	
	
	// Function to get iframe URL
	

	var getBalance = function(){
		$.post('/player/get-balance',function(result){
			var result = JSON.parse(result);
			//console.log(result);	
			if(result["status"] == 1)
			{
				var balance = parseFloat(result["result"]["balance"]) - parseFloat(result["result"]["balance_frozen"]) + parseFloat(result["result"]["bonus"]);
				$('.depos-btn-up').css('color','#1cff00');
				$('.depos-btn-up').css('font-size','18px');
				$('.depos-btn-up').html(balance+' '+result["result"]["currency"]);	
				$('.display-balance').html(balance+' '+result["result"]["currency"]);
				$('.display-bonus').html(result["result"]["bonus"]+' '+result["result"]["currency"]);
				$('.display-wager').html(result["result"]["wager"]+' '+result["result"]["currency"]);
			}
		});
	}

	var toggleFav = function(is_fav,id){
		if(is_fav == 0)
		{
				$.post('/games/add-to-fav',{game_id:id,casino_type:casino_type},function(response){
				response = JSON.parse(response);
				if(response["status"] == 1)
				{
					var temp = '.game-link[data-game-id="'+id+'"] a';
					$(temp).attr('data-fav',1);
					var temp = '.game-link[data-game-id="'+id+'"]';
					$(temp).attr('data-fav',1);
					var temp = '.hearts-like[data-game-id="'+id+'"] i';
					$(temp).removeClass('fa-heart-o');
					$(temp).addClass('fa-heart');
					var temp = '.hearts-like[data-game-id="'+id+'"]';
					$(temp).attr('data-fav',1);
					$('.game-like').attr('data-fav',1);
					$('.game-like i').removeClass();
					$('.game-like i').addClass('fa');
					$('.game-like i').addClass('fa-heart');
				}
				
			});
		}
		else
		{
			$.post('/games/del-from-fav',{game_id:id,casino_type:casino_type},function(response){
				response = JSON.parse(response);
				if(response["status"] == 1)
				{
					var temp = '.game-link[data-game-id="'+id+'"] a';
					$(temp).attr('data-fav',0);
					var temp = '.game-link[data-game-id="'+id+'"]';
					$(temp).attr('data-fav',0);
					var temp = '.hearts-like[data-game-id="'+id+'"] i';
					$(temp).removeClass('fa-heart');
					$(temp).addClass('fa-heart-o');
					var temp = '.hearts-like[data-game-id="'+id+'"]';
					$(temp).attr('data-fav',0);
					$('.game-like').attr('data-fav',0);
					$('.game-like i').removeClass();
					$('.game-like i').addClass('fa');
					$('.game-like i').addClass('fa-heart-o');
				}
				
			});
		}
	}

	
	var getFavGames = function() {
        clearFilterObj();
        setFilterParam({game_type: 'favorite',sub_container:false,type: 'favorite',limit : 60, casino_type : casino_type, append : false});
		var append = false;
		var filters = filter_params;
		$.post('/games/get-fav',filter_params,function(response){
			
			var response = JSON.parse(response);
			var games = response.result;
			
			if(!mobile)
			{
				var widthString =  '';
			}
			else
			{
				var widthString = '';
			}
			
			var string = '<div class="main-wrapper games casino_page">';
			
			if( filters.type == 'vendor' )
			{
					string += '<div class="category-tile" '+widthString+'><div class="title" style="font-size:18px;">'+games[0]["vendor_name"]+' Games</div></div>';
			}
			else if(filters.type == 'search')
			{
				if( response['total_count'] == 0 )
				{
						string += '<div class="category-tile" '+widthString+'><div class="title" style="font-size:18px;">No Games Found</div></div>';
				}
				else
				{
					string += '<div class="category-tile" '+widthString+'><div class="title" style="font-size:18px;">'+filters.game_type+' Games</div></div>';
				}
				
			}
			else{
				if(filters.type == undefined)
				{
					string += '<div class="category-tile" '+widthString+'><div class="title" style="font-size:18px;">'+filters.game_type+' Games</div></div>';
				}
				else
				{
					string += '<div class="category-tile" '+widthString+'><div class="title" style="font-size:18px;">'+filters.type+' Games</div></div>';
				}
				
			}
			
			
			
			$.each(games,function(index,value){
				value.game_img = value.game_img.replace("134.209.251.124", "yayaxl1.com");
				string += '<div data-game-id="' + value.id + '" data-fav="'+value.is_fav+'" class="game-link" name="leprechaun" '+widthString+'>';
						  if( value.is_new == 1 )
						  {
							string += '<div class="badge-wrapper">'+
						  '<i class="badge-new" title="New"></i>'+
						  '<span class="badge-label false">New</span>'+
						  '</div>';
						  }
				string += '<a data-fav="'+value.is_fav+'" data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" data-src="' + value.iframe_logged + '" data-touch-popup="choose-game-popup" data-popup="authorization" data-img-src="'+value.game_img+'">'+
						  '<div class="game-link-icon" style="background-image: url('+value.game_img+');background-size:cover;background-repeat:no-repeat;background-position:center"></div>'+
						  '<span class="game-link-bg"></span>'+
						  '<span class="icon-play-wrapper">';
				string +='<i data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" class="icon-play-button play-game" aria-hidden="true"></i></span>';  
						  
						  if (value.has_demo == null || value.has_demo == 1) 
						  {
							if(!logged)
							{
									string += '<span data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" data-fav="'+value.is_fav+'" class="play-game-title">Play for free</span>';	
							}									
						  }
						  							  
				string += '</a>'+
						  '<div class="game-name">'+
						  '<div class="hearts-like" data-fav="'+value.is_fav+'" data-game-id="'+value.id+'" >';
						  if(logged)
						  {
							if(value.is_fav == 1)
							{
								string += '<i class="fa fa-heart" aria-hidden="true"></i>';
							}
							else
							{
								string += '<i class="fa fa-heart-o" aria-hidden="true"></i>';
							}
						  }
						  else
						  {
							 string += '<i class="fa fa-heart-o" aria-hidden="true"></i>'; 
						  }
				
					 	  
				string += '</div>'+
						  '<span>'+value.name+'</span>'+
						  '</div>'+
						  '</div>';
				
			});
			string += '</div>';
			if( append == false )
			{
				//alert('no append');
				$('.casino-page-content').html(string);
			}
			else
			{
				$('.casino-page-content').append(string);	
			}
			
		});
		

        return true;
    }

	
	
	var displayLocalStorage = function(){
		
		if(localStorage.getItem('last-games') != null)
		{
			var gamesId = localStorage.getItem('last-games');
			$.ajax({
				url : '/games/get-by-ids',
				data : { game_id : gamesId },
				type : 'POST',
				async : false,
				success : function(response){
					var response = JSON.parse(response);
					if(response.status == 1 || response.status == '1' )
					{
						var games = response.result;
						var filters = filter_params;
						if(!mobile)
						{
							var widthString =  '';
						}
						else
						{
							var widthString = '';
						}
			
			var string = '<div class="main-wrapper games casino_page">';
			
			string += '<div class="category-tile" '+widthString+'><div class="title" style="font-size:18px;">RECENTLY PLAYED</div></div>';
			
			$.each(games,function(index,value){
				value.game_img = value.game_img.replace("134.209.251.124", "yayaxl1.com");
				string += '<div data-game-id="' + value.id + '" data-fav="'+value.is_fav+'" class="game-link" name="leprechaun" '+widthString+'>';
						  if( value.is_new == 1 )
						  {
							string += '<div class="badge-wrapper">'+
						  '<i class="badge-new" title="New"></i>'+
						  '<span class="badge-label false">New</span>'+
						  '</div>';
						  }
				string += '<a data-fav="'+value.is_fav+'" data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" data-src="' + value.iframe_logged + '" data-touch-popup="choose-game-popup" data-popup="authorization" data-img-src="'+value.game_img+'">'+
						  '<div class="game-link-icon" style="background-image: url('+value.game_img+');background-size:cover;background-repeat:no-repeat;background-position:center"></div>'+
						  '<span class="game-link-bg"></span>'+
						  '<span class="icon-play-wrapper">';
				string +='<i data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" class="icon-play-button play-game" aria-hidden="true"></i></span>';  
						  
						  if (value.has_demo == null || value.has_demo == 1) 
						  {
							if(!logged)
							{
									string += '<span data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" data-fav="'+value.is_fav+'" class="play-game-title">Play for free</span>';	
							}									
						  }
						  							  
				string += '</a>'+
						  '<div class="game-name">'+
						  '<div class="hearts-like" data-fav="'+value.is_fav+'" data-game-id="'+value.id+'" >';
						  if(logged)
						  {
							if(value.is_fav == 1)
							{
								string += '<i class="fa fa-heart" aria-hidden="true"></i>';
							}
							else
							{
								string += '<i class="fa fa-heart-o" aria-hidden="true"></i>';
							}
						  }
						  else
						  {
							 string += '<i class="fa fa-heart-o" aria-hidden="true"></i>'; 
						  }
				
					 	  
				string += '</div>'+
						  '<span>'+value.name+'</span>'+
						  '</div>'+
						  '</div>';
				
			});
			string += '</div>';
			$('.casino-page-content').html(string);
		}
		}				
			});
		}
	} 
	
	$(document).on('change','.jq_search_input',function(e){
		e.preventDefault();
		var keyword = $(this).val();
		if( keyword == '' )
		{
				getNewGames();	
				getPopularGames();
				getAllGames();	
		}
		else
		{
				setFilterParam({type: 'search',sub_container:false, search: keyword,limit:60});
				getGames(false,filter_params);
				clearFilterObj();
		}
		
	});
	
	
	//Document click function
	
	
	$(document).on('click','.jq_filter_main',function(e){
		e.preventDefault();
		var tag = $(this).attr('data-gametype');
		
		if(tag == 'Favs')
		{
			if(logged)
			{
				getFavGames();
			}
			else
			{
				modalWindowOpen();
				loginEnter();
			}
		}
		else if(tag == 'last-games')
		{
			displayLocalStorage();
		}
		else
		{
			clearFilterObj();
			setFilterParam({game_type: tag,sub_container:false,limit:60});
			$('.bigtab').removeClass('active-filter');
			$(this).parent().addClass('active-filter');
			getGames(false,filter_params);
		}
		 //alert(tag);
	});
	
	$(document).on('click','.play-game-title, .custom-play-game-title',function(){
		
		if(logged)
		{
				$('.sport-table-top-account-money').show();
		}
		else
		{
				$('.sport-table-top-account-money').hide();
		}
		
		var id = $(this).attr('data-game-id');
		var temp = '.game-link[data-game-id="'+id+'"]';
		
		if(logged)
		{
		if($(temp).attr('data-fav') == 1)
		{
			$('.game-like i').removeClass();
			$('.game-like i').addClass('fa');
			$('.game-like i').addClass('fa-heart');
			$('.game-like').attr('data-game-id',id);
				$('.game-like').attr('data-fav',1);
		}
		else
		{
			$('.game-like i').removeClass();
			$('.game-like i').addClass('fa');
			$('.game-like i').addClass('fa-heart-o');
			$('.game-like').attr('data-game-id',id);
				$('.game-like').attr('data-fav',0);
		}
		}
		getIframeUrl($(this).attr('data-game-id'),false);
		getBalance();
	});	
	
	$(document).on('click','.play-game, .custom-play-game',function(){
		
		if( !logged )
		{
			modalWindowOpen();
			loginEnter();
		}
		else
		{	
			//alert(logged);
			$('.sport-table-top-account-money').show();
			var id = $(this).attr('data-game-id');
			var temp = '.game-link[data-game-id="'+id+'"]';
			if(logged)
			{
			if($(temp).attr('data-fav') == 1)
			{
				$('.game-like i').removeClass();
				$('.game-like i').addClass('fa');
				$('.game-like i').addClass('fa-heart');
				$('.game-like').attr('data-game-id',id);
				$('.game-like').attr('data-fav',1);
			}
			else
			{
				$('.game-like i').removeClass();
				$('.game-like i').addClass('fa');
				$('.game-like i').addClass('fa-heart-o');
				$('.game-like').attr('data-game-id',id);
				$('.game-like').attr('data-fav',0);
			}
			}
			getIframeUrl($(this).attr('data-game-id'),logged);
			getBalance();
		}
		
	});
	
	$(document).on('click','.game-body-container .modal-closer',function(e){
		e.preventDefault();
		$('#game-box-holder').html('');
		$('.game-body-container').fadeOut();
		
	});
	
	$(document).on('click','.close-modal',function(e){
		e.preventDefault();
		
		$('body, html').removeAttr('style');
		$('.modal-window').css('display', 'none');
		$('.modal-window').css('opacity', 0);
		$('.body-container').removeAttr('style');
		$('.body-container').css('display','none');
	});
	
	$(document).on('click','.account-window-trigger',function(e){
		e.preventDefault();
		if(!logged)
		{
			modalWindowOpen();
			loginEnter();
		}
		else
		{
			modalWindowOpen();
			accountEnter();
			
		}
		
	});
	
	$(document).on('click','.withdrawl-window-trigger',function(e){
		e.preventDefault();
		if(!logged)
		{
			modalWindowOpen();
			loginEnter();
		}
		else
		{
			modalWindowOpen();
			accountEnter();
			$('.menu-item[data-id="withdraw"]').click();
		}
		
	});
	
	$(document).on('click','.jq_search_provider_btn',function(e){
		e.preventDefault();
		modalWindowOpen();
		$('.modal-providers-popup').css('display', 'block');
	});
	
	$(document).on('click','.provider-item',function(e){
		e.preventDefault();
		$('.close-modal').click();
		if( $(this).attr('data-vendor-id') != '' && $(this).attr('data-vendor-id') != null  )
		{
			clearFilterObj();
			setFilterParam({type: 'vendor',vendor:$(this).attr('data-vendor-id'),sub_container:true,limit:60});
			//console.log(filter_params);
			getGames(false,filter_params);
		}
		
	});
	
	$(document).on('click','.hearts-like,.game-like',function(e){
		if(logged)
		{
			toggleFav($(this).attr('data-fav'),$(this).attr('data-game-id'));
		}
		else
		{
			modalWindowOpen();
			loginEnter();
		}
	});
	
	$(document).on('click','.checkbox-label',function(e){
		e.preventDefault();
		var tag = $(this).attr('data-target');
		if($(tag).attr('data-value') == '1')
		{
			$(tag).attr('data-value','0');
		}
		else
		{
			$(tag).attr('data-value','1');
		}
		$(tag).click();
		$('.casino-page-content').html('');
		$('.checkbox-input').each(function(){
			if($(this).attr('data-value') == '1')
			{
				var value = $(this).attr('value');
				if(value == 'all')
				{
					setFilterParam({type: 'all', limit: 30,sub_container:false});
					getGames(true,filter_params);
				}
				else if(value == 'popular')
				{
					setFilterParam({type: 'popular', limit: 15,sub_container:false});
					getGames(true,filter_params);
				}
				else if(value == 'new')
				{
					setFilterParam({type: 'new', limit: 15,sub_container:false});
					getGames(true,filter_params);
				}
			}
		});
		
	});
	
	$(document).on('click','.load-more-button',function(e){
		e.preventDefault();
		var extend_limit = load_more_limit; 
		setFilterParam({limit: extend_limit});
		getGames(false,filter_params,true);
	});
	
	//Execute On Load Functions
	if( casino_page == 'casino-live' )
	{
			setFilterParam({type: 'vendor',vendor:27,sub_container:true,limit:60});
			getGames(false,filter_params);
			
			setFilterParam({type: 'vendor',vendor:28,sub_container:true,limit:60});
			getGames(true,filter_params);
			
			setFilterParam({type: 'vendor',vendor:29,sub_container:true,limit:60});
			getGames(true,filter_params);
			
			setFilterParam({type: 'vendor',vendor:30,sub_container:true,limit:60});
			getGames(true,filter_params);
			
			setFilterParam({type: 'vendor',vendor:31,sub_container:true,limit:60});
			getGames(true,filter_params);
			
			setFilterParam({type: 'vendor',vendor:32,sub_container:true,limit:60});
			getGames(true,filter_params);
			
			/*setFilterParam({type: 'vendor',vendor:15,sub_container:true,limit:100});
			getGames(true,filter_params);
			*/
			
	/*	console.log(filter_params);
		getNewGames();	
		getPopularGames();
		getAllGames();
	*/
			$('.checkbox-wrapper').hide();	
	}
	else if(casino_page == 'casino')
	{
		getNewGames();	
		getPopularGames();
		getAllGames();
		
	}
	
	//CSS FIXES
	
	if(logged)
	{
		
		$('.casino_promo_header').hide();
		getBalance();
	}
	else
	{
		if(mobile)
		{
			$('.casino_promo_header').hide();
		}
		else
		{
			$('.casino_promo_header').show();
		}
		
	}
	
	/* Trigger Classes If mobile is there */
	if(mobile)
	{
		$('.search-line-toggle').addClass('mobile-search');
	}
	
	$('.jq_sort_by_btn').click(function(e){
			e.preventDefault();
			getSortedGames();	
	});

});

var updateLocalStorage = function(game_id){
		if (typeof(Storage) !== "undefined") 
		{	
			//console.log(localStorage.getItem('last-games'));
			if(localStorage.getItem('last-games') == null)
			{
				var games = [];
				games[0] = game_id;
				localStorage.setItem('last-games',JSON.stringify(games));	
			}
			else
			{
				var games = localStorage.getItem('last-games');
				games = JSON.parse(games);
				//console.log(games);
				games.push(game_id);
				localStorage.setItem('last-games',JSON.stringify(games));
			}
			//console.log(localStorage.getItem('last-games'));	
		}
		
	}
	
	var getIframeUrl = function(game_id, logged_in) {
		$('.in-game-deposit').attr('data-game-id',game_id);
		
		//console.log(game_id);
        var url = '';
        var request_data = {
            game_id: game_id,
            locale: $.cookie('locale'),
            merchant_id: merchant_id
        };
		var request_result = {};

        if (logged_in == true) {
            $.extend(request_data, {logged: logged_in});
        }
		if (mobile) {
			//alert(mobile);
			$.extend(request_data, {is_mobile: true});
		}
		
		
		$.post('/games/get-iframe-url',request_data,function(response){
			//console.log(response);
			var response = JSON.parse(response);
			if( response['status'] == 1 )
			{
				var iframe_url = response; 
			}
			
			if (typeof(iframe_url.inject_code) == "undefined") {
				
				if(mobile)
				{
					window.open(iframe_url['result']);
				}
				else
				{
				
			//alert('src');
		var gameIframeSrc = iframe_url['result'];
		$('#game-box-holder').html('<iframe style="width:100%;height:100%" id="game-frame" src="" data-ratio="16/9" data-launch-width="320" data-launch-height="240"></iframe>');
		$('#game-frame').attr('src', gameIframeSrc);
		
		gameLaunchWidth = $('html').find('#game-frame').attr('data-launch-width');
        gameLaunchHeight = $('html').find('#game-frame').attr('data-launch-height');
        gameProportion = gameLaunchWidth / gameLaunchHeight;
        windowGameHeight = $(window).height() - 160;
		//alert(windowGameHeight);
		$('#game-box-holder').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
		$('#game-frame').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
		$('.game-window-wrapper').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
				$('.game-body-container').fadeIn();
			}
		}
		else
		{
			if(mobile)
			{
				var gameIframeSrc = iframe_url['result'];
				gameIframeSrc += '<script>egamingsStartNetEnt();</script>'; 
				var myWindow = window.open();
				myWindow.document.write(gameIframeSrc);
			}
			else
			{
				var gameIframeSrc = iframe_url['result'];
				$('#game-box-holder').html('<div style="width:100%;height:100%" id="game-frame" data-ratio="16/9" data-launch-width="320" data-launch-height="240"></div>');
				$('#game-frame').hide();
				$('#game-frame').html(gameIframeSrc);
				gameLaunchWidth = $('html').find('#game-frame').attr('data-launch-width');
				gameLaunchHeight = $('html').find('#game-frame').attr('data-launch-height');
				gameProportion = gameLaunchWidth / gameLaunchHeight;
				windowGameHeight = $(window).height() - 160;
				//alert(windowGameHeight+' dsadd');
				if( gameIframeSrc.indexOf('var egamingsStartNetEnt = function ()') !== -1 )
				{
					$('#game-frame').append('<script>egamingsStartNetEnt(); </script>');
					setTimeout(function () {
					$('#egamings_container').css({width:windowGameHeight * gameProportion, height: windowGameHeight}); $('#game-frame').show();
					}, 3000);
					
				}
				$('#game-box-holder').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
				$('.game-window-wrapper').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
				$('.game-body-container').fadeIn();
			}
			
		}
		
		updateLocalStorage(game_id);
		
		});
}