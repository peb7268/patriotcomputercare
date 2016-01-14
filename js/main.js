(function($){
	window.app = {};
	app.animationSpeed = 225;



	function lookupLink(target){
		var link = $(target).data('action');
		
		if(typeof link == 'undefined') return lookupLink($(target).parent());

		return link;
	}

	function bindEvents(){
		$('#searchform a').on('click', toggleSearchForm);
		$('.toggleMobileNav').on('click', toggleMobileNav);

		$('.services-grid li a').on('click', toggleService);
		$('#services #services-content .close').on('click', function(){
			app.retractService($('.active'));
		});

		$('#nav li:last-child() a, #footerMenu li:last-child() a').fancybox();
	}

	function toggleService(evt){
		evt.preventDefault();
		app.sel 	= '#service-' + evt.target.href.split('#')[1];
		app.target 	= $('#services-content ' + app.sel);
		var active 	= $('.active');

		if(active.length > 0){
			app.retractService(active, function(){
				app.displayService(app.target);	
			});
		} else {
			app.displayService(app.target);
		}
	}

	app.displayService = function(service, callback){
		$('.shade').animate({'bottom': '0'}, 100, function(){
			window.setTimeout(function(){
				service.addClass('active').animate({
					left: '20%',
				    top: '0'
				}, 100);
			}, 500);
		});
	}

	app.retractService = function(service, callback){
		service.animate({
			left: '-100%'
		}, 100, function(){
			$(this).removeClass('active').removeAttr('style');
			window.setTimeout(function(){
				$('.shade').animate({
					bottom: '-100%'
				}, 100, function(){
					$(this).removeAttr('style');
				});
			}, 500);
		});
	}

	function toggleMobileNav(evt){
		evt.preventDefault();
		$('#nav').slideToggle(100);
	}

	function hideEmailForm(evt){
		$('#emailForm').animate({
			top: '-100%'
		}, (tau.animationSpeed + 175), function(){
			$('.shade').animate({
				bottom: '-100%'
			}, (tau.animationSpeed + 100));
		});
	}

	function showEmailForm(){
		var $shade = $('<div />', {
			class: 'shade'
		});

		$('body').append($shade);

		$shade.animate({
			bottom: 0
		}, tau.animationSpeed, function(){
			$('#emailForm').css('display', 'block').animate({
				top: '30%'
			}, tau.animationSpeed);
		});
	}

	function toggleEmailForm(evt){
		evt.preventDefault();
		
		if(! $('#emailForm').is(':visible')){
			showEmailForm(evt);
		} else {
			hideEmailForm(evt);
		}
	}

	function togglePosts(evt){
		evt.preventDefault();
		var $navContainer = $('#projects_and_highlights');

		if($navContainer.hasClass('recent_content')){
			$navContainer.removeClass('recent_content').addClass('featured_content');
		} else {
			if($navContainer.hasClass('featured_content')) $navContainer.removeClass('featured_content').addClass('recent_content');
		}

		$navContainer.find('li a.active').removeClass('active');
		$(evt.target).addClass('active');

		var $target = $($(evt.target).attr('href'));
		
		$('.loop.active').fadeOut(100, function(){
		   $(this).removeClass('active');
		   $target.fadeIn(100, function(){
		   		$(this).addClass('active');
		   });
		});
	}

	function toggleContactForm(evt){
		$(evt.target).fadeOut(200, function(){
			$('form#contactForm').fadeIn(200);
		});
	}

	function delegateKeyEvent(evt){
		var key  = evt.which;
		var next = $(evt.target).parent().next();
		
		if(key === 13) {
			evt.preventDefault();
			if(next.length == 0){
				ajaxSubmit($('form#contactForm'));
				return false;
			}

			transitionNextInput(evt);
		} else {
			if(evt.target.nodeName === 'SELECT') transitionNextInput(evt);
		}
	}

	function ajaxSubmit($form){
		var data = $form.serialize();
		$.ajax($form.attr('action'), {
			data: data,
			method: 'POST'
		})
		.success(function(statusCode){
			if(statusCode == '200') return showSuccessMsg($('form#contactForm'));
			return showErrorMsg($('form#contactForm'));
		})
		.fail(function(a, b){
			console.log(a);
			console.log(b);
		});
	}

	function showSuccessMsg($form){
		$form.fadeOut(200, function(){
			$(this).parent().append($('<h4 />', {
				'text': 'Your message has been sent. We\'ll be in touch!', 
				'class': 'successMsg',
				'style': 'display: none'
			}));

			$(this).parent().find('h4').fadeIn(200);
		});
	}

	function transitionNextInput(evt){
		var effectTime = 175;
		$(evt.target).parent().animate({
			left: '-110%'
		}, effectTime, function(){
			$(this).removeAttr('class').removeAttr('style')
			.next().animate({
				right: 0
			}, effectTime, function(){
				$(this).addClass('current');
			})
		});
	}

	function toggleSearchForm(evt){
		evt.preventDefault();
		var $input 		= $(this).parent().find('input');
		var inputWidth 	= $input.outerWidth();
		var newWidth  	= (inputWidth == 0) ? '90%' : 0;
		var newPadding  = (inputWidth == 0) ? '0 10px 0 10px' : 0;
		
		$input.animate({
			'width' 	: newWidth,
			'padding'	: newPadding
		}, 100);
		
	}

	//Post DOM content
	$('document').ready(function(){
		if($('.blog').length > 0) $('.post_excerpt h2.title > a').removeAttr('target');
		if($('.fa-map-marker').length > 0){
			$('.fa-map-marker').on('click', function(evt){
				evt.preventDefault();
				$(evt.target).parent().find('#map').slideToggle(100);
			});
		}

		//Post Behavior
		var $post_items = $('.featured_image, .more, .title a', '#projects');
		$post_items.on('click', function(evt){ 
			evt.preventDefault(); 
			var action = lookupLink(evt.target);

			window.location.href=action; 
		});

		$post_items.hover(function(){
			$(this).find('.filter').slideUp(120);
			$('body').css('cursor', 'pointer');
		}, function(){
			$(this).find('.filter').slideDown(120);
			$('body').removeAttr('style');
		});

		bindEvents();

		   $(window).load(function() {
		     $('#slideshow').nivoSlider({
		     	'effect': 'boxRain',
		     	'prevText': '<i class="fa fa-chevron-left"></i>',
		     	'nextText': '<i class="fa fa-chevron-right"></i>',
		     	'controlNav': false
		     });
		   });

	});

	$('')
}(jQuery));