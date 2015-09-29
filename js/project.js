/**
 *	GoSpotCheck Styleguide
 *	Common JavaScript methods
 *
 *	Last Modified: 10 September 2015 by Burney
 */

// make JSLint happy
/*global alert, console, jQuery */


var gsc, docready;

jQuery(function () {
	'use strict';
	docready.init();
});

// closure allows jQuery shorthand ($) compatibility with WordPress
(function ($) {
	'use strict';

	// to avoid using absolute paths, assign path of this script (project.js) to a variable
	// var scriptsLoaded	= document.getElementsByTagName('script'),
	// 	thisScript 		= scriptsLoaded[scriptsLoaded.length - 1],
	// 	thisScriptPath 	= thisScript.src,
	// 	thisScriptURL 	= thisScriptPath.substr(0, thisScriptPath.lastIndexOf('/') + 1);


	/**
	 *	This method always calls gsc.common.init, then looks at data attributes
	 *	on the <body> element to determine what additional methods to call.
	 *
	 *	More here:
	 *	http://viget.com/inspire/extending-paul-irishs-comprehensive-dom-ready-execution
	 */
	docready = {
		init : function () {
			var body = document.body,
				type = body.getAttribute('data-type'),
				slug = body.getAttribute('data-slug');

			// call common methods
			docready.exec('common');

			// call type methods (e.g., post or page)
			docready.exec(type);

			// call page-specific methods
			docready.exec(type, slug);
		},

		exec : function (type, slug) {
			slug = (slug === undefined) ? 'init' : slug;

			if (type !== '' && gsc[type] && gsc[type][slug]) {
				if (typeof gsc[type][slug] === 'function') {
					gsc[type][slug]();
				} else if (typeof gsc[type][slug].init === 'function') {
					gsc[type][slug].init();
				}
			}
		}
	};


	/**
	 *	Namespaced object for housing commonly used vars and methods
	 */
	gsc = {
		// formData : {
		// 	action	: 'ajax-submit',
		// 	nonce 	: gsc_ajax.ajaxNonce
		// },
		viewport : $(window),


		/**
		 *	Common methods (those called on multiple pages or on all pages)
		 */
		common : {

			init : function () {
				// var self = this;
				var timer;


				/**
				 *	Methods called without any user interaction
				 */
				// gsc.common.methodName();


				/**
				 *	Methods triggered by user
				 */
				$('.scroll').click(function (e) {
					gsc.common.smoothScroll(e, this);
				});

				$('[type="submit"]').click(function () {
					gsc.common.submitForm($(this));
				});

				$('.menu-item-has-children').click(function (e) {
					gsc.common.toggleDropdown($(this), e);
				});

				$('footer.collapsible').find('h4').click(function () {
					gsc.common.toggleFooterSections($(this));
				});

				$('body').find('> header').find('button').click(function () {
					gsc.common.toggleMobileNav($(this));
				});

				$('.sub-menu').mouseleave(function () {
					gsc.common.hideDropdown($(this));
				});

				$('#kicker').find('.close').click(function () {
					gsc.common.closeKicker();
				});

				// specific to the hero demo page
				$('#hero-changer').change(function () {
	                $('.hero').removeClass().addClass('section hero align-center light-text ' + $(this).val());
	            });


				/**
				 *	Window events, also triggered by user
				 *	For better performance, delay method calls for 1/10th second
				 */
				gsc.viewport.scroll(function () {
					if (timer) {
				        window.clearTimeout(timer);
				    }

				    timer = window.setTimeout(function() {
						gsc.common.onWindowScroll();
				    }, 100);
				});

				gsc.viewport.resize(function () {
					if (timer) {
				        window.clearTimeout(timer);
				    }

				    timer = window.setTimeout(function() {
						gsc.common.onWindowResize();
				    }, 100);
				});
			},


			/**
			 *	Trigger CSS animations on scroll
			 */
			animateOnScroll : function () {
				console.log('animate on scroll');
			 	var scrolled = gsc.viewport.scrollTop();

				$('.animate-on-scroll:not(.animated)').each(function () {
					var animatedElement = $(this),
					offsetTop = animatedElement.offset().top;

					// 1.1 = wait for 10% of element to scroll into view before triggering animation
					if (scrolled + gsc.viewport.height() * 1.1 > offsetTop) {
						if (animatedElement.data('animation-delay')) {
							window.setTimeout(function () {
								animatedElement.addClass('animated ' + animatedElement.data('animation'));
							}, parseInt(animatedElement.data('animation-delay'), 10));
						} else {
							animatedElement.addClass('animated ' + animatedElement.data('animation'));
						}
					}
				});
			},


			/**
			 *	Closes kicker CTA
			 */
			closeKicker : function () {
				var kicker = $('#kicker');

				if (kicker.hasClass('animated')) {
					kicker.removeClass('animated');
				} else {
					kicker.fadeOut();
				}

				setTimeout(function() {
					kicker.remove();
				}, 1000);
			},


			/**
			 *	Creates a cookie (default life is 7 days)
			 */
			createCookie : function (name, contents) {
				var date, expires;

				date = new Date();
				date.setTime(date.getTime() + (gsc.cookieExpirationDays*24*60*60*1000));
				expires = date.toGMTString();

				document.cookie = name + '=' + contents + '; expires=' + expires + '; path=/';
			},


			/**
			 *	Initialize Fancybox (08/28/15: currently only used on homepage)
			 */
			fancybox : function () {
				if ( $.isFunction($.fn.fancybox) ) {
					$('.fancybox').fancybox({
						maxWidth	: 800,
						maxHeight	: 600,
						fitToView	: false,
						width		: '70%',
						height		: '70%',
						autoSize	: false,
						closeClick	: false,
						openEffect	: 'none',
						closeEffect	: 'none',
						helpers : {
							overlay : {
								locked : false
							}
						}
					});
				}
			},


			/**
			 *	Checks for existence of a cookie
			 */
			getCookie : function (name) {
				var cookieName = name + "=",
					ca = document.cookie.split(';'),
					c,
					i;
				
				for (i = 0; i < ca.length; i++) {
					c = ca[i];
					
					while (c.charAt(0) === ' ') {
						c = c.substring(1);
					}

					if (c.indexOf(cookieName) === 0) {
						return c.substring(cookieName.length,c.length);
					}
				}
				return "";
			},


			/**
			 *	Hides dropdown on mouseleave
			 */
			hideDropdown : function (dropdown) {
				dropdown.parent().removeClass('open');
			},


			/**
			 *	Does stuff on window resize
			 *	TO DO: there should be a better way - right now, we are introducing another place
			 *	where the slug would need to be updated if it changed.
			 */
			onWindowResize : function () {
				console.log('window resized');
			},


			/**
			 *	Does stuff on window scroll
			 *	TO DO: there should be a better way - right now, we are introducing another place
			 *	where the slug would need to be updated if it changed.
			 */
			onWindowScroll : function () {
				gsc.common.animateOnScroll();
				gsc.common.toggleKicker();
			},


			/**
			 *	Smooth scrolls to a section on the page
			 */
			smoothScroll : function (e, clicked) {
				e.preventDefault();

				if (location.pathname.replace(/^\//,'') === clicked.pathname.replace(/^\//,'') && location.hostname === clicked.hostname) {
					var target = $(clicked.hash);
					target = target.length ? target : $('[name=' + clicked.hash.slice(1) +']');

					if (target.length) {
						$('html, body').animate({
							scrollTop: target.offset().top - gsc.headerHeight
						}, 2000);
						return false;
					}
				}
			},


			/**
			 *	Submits a form
			 */
			submitForm : function (button) {
				var form 		 = button.closest('form'),
					buttonText 	 = button.text();

				// don't submit the FAQ search form
				if (form.attr('id') === 'faq-search') {
					return false;
				}

				// get form name
				gsc.formData.form_name = button.closest('form').find('[name="form_name"]').val();


				function prepareRequest () {
					button.attr('disabled', 'disabled').text('Please wait...');
				}

				function showErrors() {
					alert('There was a problem with your submission; please try again later');
				}

				function showResponse (responseText, statusText, xhr, form) {
					responseText = $.parseJSON(responseText);

					form.find('.message').slideUp();

					// responseText will only be empty if honeypot fails
					if (responseText) {
						// output any errors
						if (responseText.errors || !responseText.sent) {
							$('.message.error').text(responseText.errors).slideDown();

						// form was sent ok
						} else {
							/* success method 1: show success message
							$('.message.success').slideDown().delay(4000).slideUp();
							form.find('input, textarea').val('');
							*/

							// success method 2: redirect to specific page
							window.location.href = responseText.redirect_to;
						}

						button.removeAttr('disabled').text(buttonText);
					}
				}

				// set jQuery Form plugin options
				var options = {
					beforeSubmit : prepareRequest,
					data 		 : gsc.formData,
					error 		 : showErrors,
					success 	 : showResponse,
					url 		 : gsc_ajax.ajaxURL
				};

				// submit the form
				form.ajaxForm(options);
			},


			/**
			 *	Toggles dropdown menus in the main nav
			 */
			toggleDropdown : function (parent, e) {
				e.preventDefault();

				parent.siblings().removeClass('open');
				parent.toggleClass('open');
			},


			/**
			 *	Toggles collapsible footer sections
			 */
			toggleFooterSections : function (heading) {
				heading.parent().toggleClass('open');
			},


			/**
			 *	Toggles a call to action "kicker" when present. This guy slides out
			 *	bottom right of the page when a user scrolls towards page bottom.
			 */
			toggleKicker : function () {
				var bottomScrollPos = parseInt(gsc.viewport.scrollTop() + gsc.viewport.height()),
					documentHeight 	= $(document).height(),
					halfwayDown 	= documentHeight / 2,
					kicker 			= $('#kicker');

				// show kicker when middle of scrollbar is halfway down the page
				if (bottomScrollPos > halfwayDown + gsc.viewport.height() / 2 && kicker.attr('data-animation')) {
					kicker.addClass('animated');
				} else {
					kicker.removeClass('animated');
				}
			},


			/**
			 *	Adds a class to the header, which triggers CSS transitions
			 *	(opens the mobile menu in a smoooooth way)
			 */
			toggleMobileNav : function (hamburger) {
				hamburger.closest('header').toggleClass('open');
			}
		},


		/**
		 *	Page-specific JavaScript
		 */
		page : {

			/**
			 *	About Page
			 */
			about_gospotcheck : {

				init : function () {
					gsc.page.about_gospotcheck.methodName();
				},


				/**
				 *	Pronounce "GoSpotCheck" on About page, and highlight syllables
				 *	as name is pronounced
				 */
				methodName : function () {
					console.log('you are on the about page');
				}
			}
		},


		/**
		 *	Post-specific JavaScript (i.e., for blog)
		 */
		post : {
			init : function () {
				gsc.post.methodName();
			},


			/**
			 *	Placeholder method
			 */
			methodName : function () {
				// console.log('method called in post type');
			}
		}
	};
})(jQuery);