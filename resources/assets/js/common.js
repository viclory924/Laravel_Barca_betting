//========== modal ==========//
function modalWindowOpen(){
	$('body, html').css('overflow', 'hidden');
	$('.modal-account').css('display', 'none');
	$('.modal-dialog').removeAttr('style');
	$('.modal-content').removeAttr('style');
	$('.modal-content > div').css('display', 'none');
	$('.modal-window').css('display', 'block');
	$('.modal-window').animate({opacity: 1}, 300);
	//$('.body-container').attr('style', 'filter: blur(5px);');
	// $('.modal-dialog').css('width', '535px');
}

function activeDepositOpen(argument) {
	$('.deposit-active-wrapper').css('display', 'block');
}

function passwordRecovery(argument) {
	$('.password-recovery-wrapper').css('display', 'block');
}

function loginEnter(argument) {
	$('.modal-login-wrapper').css('display', 'block');
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

$('.toggleshow').click(function(event) {
	
	if($(this).hasClass('terms-active')){
		$(this).removeClass('terms-active');
	} else {
		$(this).toggleClass('terms-active');
		
	}
	
	var parent = $(this).closest('.dropdown-wrapper');
	
	$('.togglediv', parent).slideToggle(500);
});



function scrollItemScroll(scrollItem){

	var maxscroll = scrollItem[0].scrollWidth -  scrollItem.width();
	var scrollLeft = scrollItem.scrollLeft();
	if (scrollLeft == 0) {
		$('.go-to-right', scrollItem).css('display', 'block');
		$('.go-to-left', scrollItem).css('display', 'none');
	}else if(scrollLeft == maxscroll){
		$('.go-to-left', scrollItem).css('display', 'block');
		$('.go-to-right', scrollItem).css('display', 'none');
	}else{
		$('.go-to-left', scrollItem).css('display', 'block');
		$('.go-to-right', scrollItem).css('display', 'block');
	}
}

if ($('div').is('.scrollong-item')) {
	$('.scrollong-item').each(function(index, el) {
		scrollItemScroll($(this));
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

$('.hide-menus').click(function(event) {
 $('.hide-menus').toggleClass('fsa');

	$('.menu-game-wrapper').slideToggle(250);

	  if ($(this).hasClass('fsa')) {
	   clearGames = true
	   // resizeGame(clearGames)
	   $('.left-navigation-wrapper').animate({
	    left: '-100px'},
	    400, function() {
	    $('.left-navigation-wrapper').css('display', 'none');
	   });
	   $('.help-toggle').animate({
	    right: '20px'},
	    400, function() {
	    $('.help-toggle').css('display', 'none');
	   });
	  }else{
	   clearGames = false
	   // resizeGame(clearGames)
	   $('.left-navigation-wrapper').css('display', 'block');
	   $('.help-toggle').css('display', 'flex');
	   $('.left-navigation-wrapper').animate({left: '0px'},400);
	   $('.help-toggle').animate({right: '20px'},200);}
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

$('.depos-btn-down').click(function(event) {
	modalWindowOpen();
	activeDepositOpen()
});
$('.register-modal').click(function(event) {
	modalWindowOpen();
	registerChoice();
});
/*
$('.close-modal').click(function(event) {
	$('body, html').removeAttr('style');
	$('.modal-window').css('display', 'none');
});


$('.modal-bg, .close-modal').click(function(event) {
	$('.modal-window').animate({
		opacity: 0},
		300, function() {
		$('body, html').removeAttr('style');
		$('.modal-window').css('display', 'none');
	});
	$('.body-container').removeAttr('style');
});
*/
$('.register-modal').click(function(event) {
	
});
$('.account-window-trigger').click(function(event) {
	modalWindowOpen();
	$('.modal-dialog').css('display', 'none');
	$('.modal-account').css('display', 'block');
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
			}else{
				gameWidth = (wrapperWidth - 60)/4;
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
	gamesResize();

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
	$('.help-toggle').click(function(event) {
		if (!$(this).hasClass('active-help')) {
			helpBlockOpen();
			$(this).addClass('active-help');
		} else {
			helpBlockClose();
		}
		

	});

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
$('.question').click(function(event) {
	$(this).toggleClass("active");
	$('.answer', this).slideToggle(400)
	$('.category-question').each(function(index, el) {
		var check = $('.question', this).length
		var check2 = check
		$('.question', this).each(function(index, el) {
			if ($(this).hasClass('active')) {
				check2--
			}
		});
		if (check > check2) {
			$(this).addClass('triggered')
		} else {
			$(this).removeClass('triggered')
		}
	});
});
$('.trigger-category').click(function(event) {
	var target = $(this).parent()
	$('ul', target).slideToggle(400)
	$(this).toggleClass('opened-help')
	if ($(this).hasClass('opened-help')) {
		$(this).parent('.category-question').css('background-color', '#1a202b');
	} else {
		$(this).parent('.category-question').css('background-color', '#283346');
	}
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
	winnerBorderUpdate()
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


	$('.search-line-toggle').click(function(event) {
		if ($(window).width() < 901) {
			$('.search-line-toggle').toggleClass('active');
			if ($(this).hasClass('active')) {
				$('.mobile-search-wrapper').css('display', 'block');
				$('.main-menu, .filter-games-scroll-wrapper-hidden, .hidden-mobile-menu').addClass('search-opened');
				$('.mobile-search-wrapper').animate({top: 0}, 200);
			}else{
				$('.main-menu, .filter-games-scroll-wrapper-hidden, .hidden-mobile-menu').removeClass('search-opened');
				$('.mobile-search-wrapper').animate({
					top: '-50px'},
					250, function() {
					$('.mobile-search-wrapper').css('display', 'none');
				});
			}
			
		}
	});

	var winnersOpened = false;

	$('.current-winner').click(function(event) {
		if (winnersOpened) {
			$('.last-winners-dropdown').animate({'height': '0px'}, 500)
			winnersOpened = false
		} else {
			$('.last-winners-dropdown').animate({'height': '300px'}, 500)
			winnersOpened = true
		}
	});

	var winner = new Array()
		winner[0] = '<span class="winners-name">Thomas H</span><span class="other-text"> just won </span><span class="winners-value">1.8</span> <span class="winners-currency">RUB</span><span class="other-text"> in </span><span class="winners-game">Vikings</span>',
		winner[2] = '<span class="winners-name">Jonh G</span><span class="other-text"> just won </span><span class="winners-value">2.8</span> <span class="winners-currency">EURO</span><span class="other-text"> in </span><span class="winners-game">Vikings</span>',
		winner[1] = '<span class="winners-name">Marry L</span><span class="other-text"> just won </span><span class="winners-value">11</span> <span class="winners-currency">USD</span><span class="other-text"> in </span><span class="winners-game">Vikings</span>'
	var count = 0;

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

function winnerBorderUpdate(){
	$('.winner-item').each(function(index, el) {
		if ($(this).text() == 0) {
			$(this).css('border', 'none');
		} else{
			$(this).removeAttr('style');
		}
	});
}


$(function() {
	
	function winnerUpdate(){
		if ($('.prev-winner').text().length > 0) {
			$('.win-currency').addClass('win-currency-trig');
			setTimeout (function(){
				$('.win-currency').removeClass('win-currency-trig');
			}.bind('.win-currency'), 1100);
			
			var newWinnerCurrency = $('.prev-winner .winners-currency').text()
			if (newWinnerCurrency == 'USD') {
				$('.win-currency').children().removeClass()
				$('.win-currency').children().addClass('usd')
			} else if (newWinnerCurrency == 'RUB') {
				$('.win-currency').children().removeClass()
				$('.win-currency').children().addClass('rub')
			} else if (newWinnerCurrency == 'EURO') {
				$('.win-currency').children().removeClass()
				$('.win-currency').children().addClass('euro')
			}
			$('.winner').animate({
				left: '450px'},
				700);
			$('.prev-winner').animate({
				left: '65px'},
				700, function() {
					var winner = $(this).html();
					$('.winner').text('');
					$('.winner').html(winner);
					$('.winner').css('left', '65px');
					$(this).css('left', '-400px');
					$(this).text('');
				});


			$('.winner-item-prev').animate({
				'margin-top': '0px'
			}, 700,function(){
				$('.winner-item').last().html('');
				$('.winner-item').last().html($('.winner-item:eq(1)').html());
				$('.winner-item:eq(1)').html('');
				$('.winner-item:eq(1)').html($('.winner-item').first().html());
				$('.winner-item').first().html('');
				$('.winner-item').first().html($('.winner-item-prev').html())
				$('.winner-item-prev').css('margin-top', '-70px');
				$('.winner-item-prev').html('');
				winnerBorderUpdate()
			})

		}

			
			curryncyUpdate();
			return setTimeout(function(){
				$('.prev-winner').html(winner[count]);
				$('.winner-item-prev').html(winner[count]);
				if (count == 2){
					count = 0;
				} else {
					count ++;
				}
				return winnerUpdate();
			},6000)
	};
	
	winnerUpdate();
});

}); 


	var $html = $('html'); //, isTouch = $html.hasClass('touchevents');
    var $body = $('body');
    var windowWidth = Math.max($(window).width(), window.innerWidth);
	var merchant_id = $('#quick_merchant_id').val();
    var selected_games_type = 'slot';
    var selected_vendor = null;
    var popular_games_limit = 20;
    var new_games_limit = 10;
    var all_games_limit = 30;
    var load_more_limit = 60;
    var last_games_quantity = 10;
    var remove_empty_sections = false;
    var mobile = $('html').hasClass('touchevents');
    if (typeof casino_type == "undefined") {
        casino_type = 'casino';
    }
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
		sub_container : false
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
        setFilterParam({type: 'new', limit: 10,sub_container:false});
        getGames(false,filter_params);
		return true;
    }
		
	 var getAllGames = function(){
        // console.log('getAllGames');
        setFilterParam({type: 'all', limit: 10,sub_container:false});
        getGames(true,filter_params);
		return true;
    }
	
	 var getPopularGames = function(){
        // console.log('getAllGames');
        setFilterParam({type: 'popular', limit: 10,sub_container:false});
        getGames(true,filter_params);
		return true;
    }
	
	// FUnction to Set Inital Params
	
	
	
	// Function to get Games
	var getGames = function(append = false,filters){
		 var filters = filters;
		
		    $.ajax({
			url : '/games',
			async : false,
			type : 'POST',
			data : filters,
			success : function(response){
			//console.log(response);
			var response = JSON.parse(response);
			var games = response.result;
			
			if(!mobile)
			{
				var widthString =  'style="width:19%"';
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
				string += '<div class="game-link" name="leprechaun" '+widthString+'>';
						  if( value.is_new == 1 )
						  {
							string += '<div class="badge-wrapper">'+
						  '<i class="badge-new" title="New"></i>'+
						  '<span class="badge-label false">New</span>'+
						  '</div>';
						  }
				string += '<a data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" data-src="' + value.iframe_logged + '" data-touch-popup="choose-game-popup" data-popup="authorization" data-img-src="'+value.game_img+'">'+
						  '<div class="game-link-icon" style="background-image: url('+value.game_img+')"></div>'+
						  '<span class="game-link-bg"></span>'+
						  '<span class="icon-play-wrapper">';
				string +='<i data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" class="icon-play-button play-game" aria-hidden="true"></i></span>';  
						  
						  if (value.has_demo == null || value.has_demo == 1) {
							 
							   string += '<span data-type="'+filters.type+'" data-has-demo="'+value.has_demo+'" data-game-id="' + value.id + '" class="play-game-title">Play for free</span>';
						  }
						  							  
				string += '</a>'+
						  '<div class="game-name">'+
						  '<div class="hearts-like">'+
						  '<i class="fa fa-heart-o" aria-hidden="true"></i>'+
					 	  '</div>'+
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
			
			
			//console.log(games);
			console.log(filter_params);
			
			
					
			}
		});
		
		
		
	}
	
	
	// Function to get iframe URL
	var getIframeUrl = function(game_id, logged_in) {
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
			//alert('src');
		var gameIframeSrc = iframe_url['result'];
		$('#game-box-holder').html('<iframe style="width:100%;height:100%" id="game-frame" src="" data-ratio="16/9" data-launch-width="320" data-launch-height="240"></iframe>');
		$('#game-frame').attr('src', gameIframeSrc);
		
		gameLaunchWidth = $('html').find('#game-frame').attr('data-launch-width');
        gameLaunchHeight = $('html').find('#game-frame').attr('data-launch-height');
        gameProportion = gameLaunchWidth / gameLaunchHeight;
        windowGameHeight = $(window).height() - 160;
		$('#game-box-holder').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
		$('#game-frame').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
		$('.game-window-wrapper').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
		
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
			if( gameIframeSrc.indexOf('var egamingsStartNetEnt = function ()') !== -1 )
			{
				$('#game-frame').append('<script>egamingsStartNetEnt(); </script>');
				 setTimeout(function () {
				 $('#egamings_container').css({width:windowGameHeight * gameProportion, height: windowGameHeight}); $('#game-frame').show();
				}, 3000);
					
			}
			$('#game-box-holder').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
			//$('#game-frame').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
			$('.game-window-wrapper').css({width:windowGameHeight * gameProportion, height: windowGameHeight});
			
		}
		
		$('.game-body-container').fadeIn();
		//$('.modal-window').show();
		});
}

	var getBalance = function(){
		$.post('/player/get-balance',function(result){
			var result = JSON.parse(result);
			if(result["status"] == 1)
			{
				var balance = parseFloat(result["result"]["balance"]) - parseFloat(result["result"]["balance_frozen"]) + parseFloat(result["result"]["bonus"]);
				$('.depos-btn-up').css('color','#1cff00');
				$('.depos-btn-up').css('font-size','18px');
				$('.depos-btn-up').html(balance+' '+result["result"]["currency"]);	
				$('.display-balance').html(balance+' '+result["result"]["currency"]);
			}
		});
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
				setFilterParam({type: 'search',sub_container:false, search: keyword});
				getGames(false,filter_params);
				clearFilterObj();
		}
		
	});
	
	
	//Document click function
	
	
	$(document).on('click','.jq_filter_main',function(e){
		e.preventDefault();
		var tag = $(this).attr('data-gametype');
		clearFilterObj();
		setFilterParam({game_type: tag,sub_container:false});
		$('.bigtab').removeClass('active-filter');
		$(this).parent().addClass('active-filter');
		getGames(false,filter_params);
		
		 //alert(tag);
	});
	
	$(document).on('click','.play-game-title',function(){
		
		if(logged)
		{
				$('.sport-table-top-account-money').show();
		}
		else
		{
				$('.sport-table-top-account-money').hide();
		}
		
		getIframeUrl($(this).attr('data-game-id'),false);
		getBalance();
	});	
	
	$(document).on('click','.play-game',function(){
		
		if( !logged )
		{
			modalWindowOpen();
			loginEnter();
		}
		else
		{	
			//alert(logged);
			$('.sport-table-top-account-money').show();
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
	
	//Execute On Load Functions
	if( casino_page == 'casino-live' )
	{
			setFilterParam({type: 'vendor',vendor:27,sub_container:true});
			getGames(false,filter_params);
			
			setFilterParam({type: 'vendor',vendor:28,sub_container:true});
			getGames(true,filter_params);
			
			setFilterParam({type: 'vendor',vendor:29,sub_container:true});
			getGames(true,filter_params);
			
			setFilterParam({type: 'vendor',vendor:30,sub_container:true});
			getGames(true,filter_params);
			
			setFilterParam({type: 'vendor',vendor:31,sub_container:true});
			getGames(true,filter_params);
			
			setFilterParam({type: 'vendor',vendor:32,sub_container:true});
			getGames(true,filter_params);
			
	}
	else if(casino_page == 'casino')
	{
		getNewGames();	
		getPopularGames();
		getAllGames();
		
	}
	
	if(logged)
	{
		$('.casino_promo_header').hide();
		getBalance();
	}
	else
	{
		$('.casino_promo_header').show();
	}
	
	
	
});
