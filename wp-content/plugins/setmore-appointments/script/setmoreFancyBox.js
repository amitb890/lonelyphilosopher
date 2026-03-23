var isBookinPageLoaded = false;
var initalFrameLoad = function () {
	jQuery('.iframe_loader').hide();
	jQuery('#iframeContent').show();

	var fancyBoxHeight = $('#setmore-fancy-box').height();
	var iframewindowHeight = jQuery(window).height();

	if (iframewindowHeight > fancyBoxHeight) {
		$('#setmore-fancy-box-content').css('height', '635px');
	} else {
		$('#setmore-fancy-box-content').css('height', iframewindowHeight - 50);
	}
};

var setmorePopup = function (e, bookingPageLink) {
	if (e) {
		e.preventDefault();
		e.stopPropagation();
		e.stopImmediatePropagation();
	}

	var windowWidth = jQuery(window).width();
	if (windowWidth < 600) {
		window.open(bookingPageLink, '_blank');
		return;
	}

	var templ = {};
	templ.overlay = '<div id="setmore-overlay"></div>';
	templ.popup =
		'<div id="setmore-fancy-box" style= " background-color: #FFFFFF;height: auto;left: 50%;position: absolute;top: 0;width: 545px;z-index: 9999;">' +
		'<button id="setmore-fancy-box-close-icon"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none"><path d="M1.3335 0.674316L10.6668 10.0076" stroke="#EFF3F9" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.6668 0.674316L1.3335 10.0076" stroke="#EFF3F9" stroke-linecap="round" stroke-linejoin="round"/></svg></button>' +
		'<div id="setmore-fancy-box-content">' +
		'<div class="int-loader-wrap iframe_loader">' +
		'<div aria-hidden="true" id=":ri:" role="img" style="width:48px; height:48px; stroke-width:1; position:relative;" data-eds-component="true"><svg aria-hidden="true" data-eds-component="true" fill-rule="evenodd" focusable="false" preserveAspectRatio="xMidYMid meet" role="img" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" style="height:20px; width:20px; fill: #111111; position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(0) skewX(0) skewY(0) scaleX(1) scaleY(1);"><path d="M210.833 216.666h-.583c0 64.948-38.039 140-116.084 140v-64.167c96.084.056 116.667-69.133 116.667-110.833V100h-.583c0 64.948-38.039 140-116.084 140v-64.167C190.25 175.889 210.834 106.7 210.834 65h58.334c0 41.7 20.582 110.889 116.666 110.833V240c-78.044 0-116.083-75.052-116.083-140h-.583v81.666c0 41.7 20.582 110.889 116.666 110.833v64.167c-78.044 0-116.083-75.052-116.083-140h-.583v198.333h-58.334V216.666z"></path></svg><svg fill="none" focusable="false" preserveAspectRatio="xMidYMid meet" viewBox="0 0 50 50" class="animate-loading-spin block"><circle cx="25" cy="25" r="20" stroke-linecap="round" style="stroke:#111111;" class="animate-loading-dash"></circle></svg></div>' +
		'</div>' +
		// '<div class="iframe_loader" style="position: absolute; left: 50%;top: 50%; -ms-transform: translate(-50%, -50%); -moz-transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%)"><img src="https://storage.googleapis.com/setmore-assets/2.0/Images/Logos/setmore-loader.gif" width="48" height="48" ></div>' +
		'<div id="iframeContent" style="height:100%;width:100%" ">' +
		'</div>' +
		'</div>';
	var init = function () {
		if (!isBookinPageLoaded) {
			isBookinPageLoaded = true;
			renderTempl();
		} else {
			loadIframe();
			positionPopup();
			showPopup();
		}
	};
	var renderTempl = function () {
		jQuery('body').append(templ.overlay).append(templ.popup);
		positionPopup();
		loadIframe();
		bindEvents();
	};
	var loadIframe = function () {
		jQuery('.iframe_loader').show();
		jQuery('#iframeContent').hide();

		jQuery('#iframeContent').html(
			'<iframe allow="web-share; payment"  id="setmore-fancy-box-iframe" frameborder="0" hspace="0" scrolling="auto" src="' +
				bookingPageLink +
				'"></>'
		);
		console.log(jQuery('#iframeContent').html());
		document.getElementById('setmore-fancy-box-iframe').onload = function () {
			return initalFrameLoad();
		};
	};
	var bindEvents = function () {
		// var self	=	this;
		jQuery('#setmore-overlay , #setmore-fancy-box-close-icon').bind('click', function () {
			hidePopup();
		});
	};
	var positionPopup = function () {
		var windowHeight = jQuery(window).height();
		var windowScrollHeight = jQuery(document).height();
		var windowScrollTop = jQuery(document).scrollTop();
		var popupWidth = jQuery('#setmore-fancy-box').width();
		var popupHeight = windowHeight - 100;

		jQuery('#setmore-overlay').height(windowScrollHeight + 'px');
		jQuery('#setmore-fancy-box').css({
			'margin-left': '-' + popupWidth / 2 + 'px',
			'margin-top': (windowHeight - popupHeight) / 2 + windowScrollTop + 'px',
		});
		jQuery('html,body').css('overflow', 'hidden');
	};
	var hidePopup = function () {
		jQuery('#setmore-overlay,#setmore-fancy-box').hide();
		jQuery('html,body').css('overflow', 'auto');
	};
	var showPopup = function () {
		jQuery('#setmore-overlay,#setmore-fancy-box').show();
	};
	init();
};

// include required css file
var loadCss = function () {
	var cssFilePath =
		'<link href="https://assets.setmore.com/integration/static/setmorePopupStaging.css" rel="stylesheet" type="text/css" />';

	var appendCssFiles = function () {
		jQuery('head').append(cssFilePath);
		setTimeout(function () {
			loadSetmoreFancyBox();
		}, 600);
	};

	// Binding click event to the "a" tag. Added this to override the
	// FancyBox plugin
	var loadSetmoreFancyBox = function () {
		jQuery('[id=Setmore_button_iframe]').on('click', function (e) {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();

			var bookingPageLink = jQuery(this).attr('href');
			var parsedBookingUrl = new URL(bookingPageLink);

			if (parsedBookingUrl.hostname.endsWith('setmore.com')) {
				setmorePopup(e, bookingPageLink);
			} else {
				var invalidPath = parsedBookingUrl.pathname + parsedBookingUrl.search;
				var newBookingUrl = 'https://booking.setmore.com' + invalidPath;

				if (invalidPath === '/' || invalidPath === '') {
					newBookingUrl = 'https://booking.setmore.com/invalidurl';
				}

				setmorePopup(e, newBookingUrl);
			}
		});
	};

	if (typeof jQuery !== 'undefined') {
		appendCssFiles();
	} else {
		var script = document.createElement('SCRIPT');
		script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js';
		script.type = 'text/javascript';
		document.getElementsByTagName('head')[0].appendChild(script);

		var checkReady = function (callback) {
			if (window.jQuery) {
				callback(jQuery);
			} else {
				window.setTimeout(function () {
					checkReady(callback);
				}, 100);
			}
		};

		checkReady(function (jQuery) {
			appendCssFiles();
			windowHeight = window.innerHeight;
		});
	}
};
loadCss();