"use strict";

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

let div = document.createElement('div');
div.style.overflowY = 'scroll';
div.style.width = '50px';
div.style.height = '50px'; // мы должны вставить элемент в документ, иначе размеры будут равны 0

document.body.append(div);
let scrollWidth = div.offsetWidth - div.clientWidth;
let root = document.documentElement;
root.style.setProperty('--spacing-end', scrollWidth + 'px');
div.remove();
const JSCCommon = {
	btnToggleMenuMobile: [].slice.call(document.querySelectorAll(".toggle-menu-mobile--js")),
	menuMobile: document.querySelector(".menu-mobile--js"),
	menuMobileLink: [].slice.call(document.querySelectorAll(".menu-mobile--js ul li a")),

	modalCall() {
		const link = ".link-modal-js";
		$(link).fancybox({
			arrows: false,
			infobar: false,
			touch: false,
			type: 'inline',
			autoFocus: false,
			i18n: {
				en: {
					CLOSE: "Закрыть",
					NEXT: "Вперед",
					PREV: "Назад" // PLAY_START: "Start slideshow",
					// PLAY_STOP: "Pause slideshow",
					// FULL_SCREEN: "Full screen",
					// THUMBS: "Thumbnails",
					// DOWNLOAD: "Download",
					// SHARE: "Share",
					// ZOOM: "Zoom"

				}
			}
		});
		$(".modal-close-js").click(function () {
			$.fancybox.close();
		});
		$.fancybox.defaults.backFocus = false;
		const linkModal = document.querySelectorAll(link);

		function addData() {
			linkModal.forEach(element => {
				element.addEventListener('click', () => {
					let modal = document.querySelector(element.getAttribute("href"));
					const data = element.dataset;

					function setValue(val, elem) {
						if (elem && val) {
							const el = modal.querySelector(elem);
							el.tagName == "INPUT" ? el.value = val : el.innerHTML = val; // console.log(modal.querySelector(elem).tagName)
						}
					}

					setValue(data.typ, '[name="typ"]');
					setValue(data.subtype, '[name="subtype"]');
					setValue(data.price, '[name="price"]');
					setValue(data.text, '.after-headline');
					setValue(data.btn, '.btn');
					setValue(data.order, '.order');
				});
			});
		}

		if (linkModal) addData();
	},

	// /modalCall
	toggleMenu() {
		const toggle = this.btnToggleMenuMobile;
		const menu = this.menuMobile;
		document.addEventListener("click", function (event) {
			const toggleEv = event.target.closest(".toggle-menu-mobile--js");
			if (!toggleEv) return;
			toggle.forEach(el => el.classList.toggle("on"));
			menu.classList.toggle("active");
			[document.body, document.querySelector('html')].forEach(el => el.classList.toggle("fixed"));
		}, {
			passive: true
		});
	},

	closeMenu() {
		let menu = this.menuMobile;
		if (!menu) return;

		if (menu.classList.contains("active")) {
			this.btnToggleMenuMobile.forEach(element => element.classList.remove("on"));
			this.menuMobile.classList.remove("active");
			[document.body, document.querySelector('html')].forEach(el => el.classList.remove("fixed"));
		}
	},

	mobileMenu() {
		if (!this.menuMobileLink) return;
		this.toggleMenu();
		document.addEventListener('mouseup', event => {
			let container = event.target.closest(".menu-mobile--js.active"); // (1)

			if (!container) this.closeMenu();
		}, {
			passive: true
		});
		window.addEventListener('resize', () => {
			if (window.matchMedia("(min-width: 992px)").matches) this.closeMenu();
		}, {
			passive: true
		});
	},

	// /mobileMenu
	// tabs  .
	tabscostume(tab) {
		const tabs = document.querySelectorAll(tab); // const indexOf = element => Array.from(element.parentNode.children).indexOf(element);

		tabs.forEach(element => {
			let tabs = element;
			const tabsCaption = tabs.querySelector(".tabs__caption");
			const tabsBtn = tabsCaption.querySelectorAll(".tabs__btn");
			const tabsWrap = tabs.querySelector(".tabs__wrap");
			const tabsContent = tabsWrap.querySelectorAll(".tabs__content");
			const random = Math.trunc(Math.random() * 1000);
			tabsBtn.forEach((el, index) => {
				const data = "tab-content-".concat(random, "-").concat(index);
				el.dataset.tabBtn = data;
				const content = tabsContent[index];
				content.dataset.tabContent = data;
				if (!content.dataset.tabContent == data) return;
				const active = content.classList.contains('active') ? 'active' : ''; // console.log(el.innerHTML);

				content.insertAdjacentHTML("beforebegin", "<div class=\"tabs__btn-accordion  btn btn-primary  mb-1 ".concat(active, "\" data-tab-btn=\"").concat(data, "\">").concat(el.innerHTML, "</div>"));
			});
			tabs.addEventListener('click', function (element) {
				const btn = element.target.closest("[data-tab-btn]:not(.active)");
				if (!btn) return;
				const data = btn.dataset.tabBtn;
				const tabsAllBtn = this.querySelectorAll("[data-tab-btn");
				const content = this.querySelectorAll("[data-tab-content]");
				tabsAllBtn.forEach(element => {
					element.dataset.tabBtn == data ? element.classList.add('active') : element.classList.remove('active');
				});
				content.forEach(element => {
					element.dataset.tabContent == data ? (element.classList.add('active'), element.previousSibling.classList.add('active')) : element.classList.remove('active');
				});
			});
		}); // $('.' + tab + '__caption').on('click', '.' + tab + '__btn:not(.active)', function (e) {
		// 	$(this)
		// 		.addClass('active').siblings().removeClass('active')
		// 		.closest('.' + tab).find('.' + tab + '__content').hide().removeClass('active')
		// 		.eq($(this).index()).fadeIn().addClass('active');
		// });
	},

	// /tabs
	inputMask() {
		// mask for input
		let InputTel = [].slice.call(document.querySelectorAll('input[type="tel"]'));
		InputTel.forEach(element => element.setAttribute("pattern", "[+][0-9]{1}[(][0-9]{3}[)][0-9]{3}-[0-9]{2}-[0-9]{2}"));
		Inputmask("+9(999)999-99-99").mask(InputTel);
	},

	// /inputMask
	ifie() {
		var isIE11 = !!window.MSInputMethodContext && !!document.documentMode;

		if (isIE11) {
			document.body.insertAdjacentHTML("beforeend", '<div class="browsehappy">	<p class=" container">К сожалению, вы используете устаревший браузер. Пожалуйста, <a href="http://browsehappy.com/" target="_blank">обновите ваш браузер</a>, чтобы улучшить производительность, качество отображаемого материала и повысить безопасность.</p></div>');
		}
	},

	heightwindow() {
		// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
		let vh = window.innerHeight * 0.01; // Then we set the value in the --vh custom property to the root of the document

		document.documentElement.style.setProperty('--vh', "".concat(vh, "px")); // We listen to the resize event

		window.addEventListener('resize', () => {
			// We execute the same script as before
			let vh = window.innerHeight * 0.01;
			document.documentElement.style.setProperty('--vh', "".concat(vh, "px"));
		}, {
			passive: true
		});
	},

	animateScroll() {
		$(document).on('click', " .top-nav li a, .scroll-link", function () {
			const elementClick = $(this).attr("href");
			const destination = $(elementClick).offset().top;
			$('html, body').animate({
				scrollTop: destination
			}, 1100);
			return false;
		});
	},

	getCurrentYear(el) {
		let now = new Date();
		let currentYear = document.querySelector(el);
		if (currentYear) currentYear.innerText = now.getFullYear();
	},

	CustomInputFile: function CustomInputFile() {
		var file = $(".add-file input[type=file]");
		file.change(function () {
			var filename = $(this).val().replace(/.*\\/, "");
			var name = $(this).parents('.add-file').find(".add-file__filename");
			name.text(filename);
		});
	}
}; // let $ = jQuery;

function eventHandler() {
	JSCCommon.ifie();
	JSCCommon.modalCall();
	JSCCommon.tabscostume('.tabs--js');
	JSCCommon.mobileMenu();
	JSCCommon.inputMask();
	JSCCommon.heightwindow();
	JSCCommon.animateScroll();
	JSCCommon.CustomInputFile();
	var x = window.location.host;
	let screenName;
	screenName = document.body.dataset.bg;

	if (screenName && x.includes("localhost:30")) {
		document.body.insertAdjacentHTML("beforeend", "<div class=\"pixel-perfect\" style=\"background-image: url(screen/".concat(screenName, ");\"></div>"));
	}

	function setFixedNav() {
		let topNav = document.querySelector('.top-nav  ');
		if (!topNav) return;
		window.scrollY > 0 ? topNav.classList.add('fixed') : topNav.classList.remove('fixed');
	}

	function whenResize() {
		setFixedNav();
	}

	window.addEventListener('scroll', () => {
		setFixedNav();
	}, {
		passive: true
	});
	window.addEventListener('resize', () => {
		whenResize();
	}, {
		passive: true
	});
	whenResize();
	let defaultSl = {
		spaceBetween: 0,
		lazy: {
			loadPrevNext: true
		},
		watchOverflow: true,
		spaceBetween: 0,
		loop: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		},
		pagination: {
			el: ' .swiper-pagination',
			type: 'bullets',
			clickable: true
		}
	};
	const swiper4 = new Swiper('.sBanners__slider--js', _objectSpread(_objectSpread({}, defaultSl), {}, {
		slidesPerView: 'auto',
		freeMode: true,
		loopFillGroupWithBlank: true,
		touchRatio: 0.2,
		slideToClickedSlide: true,
		freeModeMomentum: true
	})); // modal window

	let brifSlider = new Swiper('.sCarPark__slider--js', {
		freeModeMomentum: true,
		watchOverflow: true,
		slidesPerView: 1,
		spaceBetween: 40,
		breakpoints: {
			768: {
				spaceBetween: 100
			}
		},
		navigation: {
			nextEl: '.sCarPark .swiper-button-next',
			prevEl: '.sCarPark .swiper-button-prev'
		}
	});
	const sReviewsSlider = new Swiper('.sReviews .tabs__content .sReviews__slider--js', {
		slidesPerView: 1,
		loop: false,
		// effect: fade,
		spaceBetween: 30,
		observer: true,
		autoHeight: true,
		observeParents: true,
		breakpoints: {
			992: {
				slidesPerView: 2
			}
		},
		navigation: {
			nextEl: '.sReviews .tabs__content .swiper-button-next',
			prevEl: '.sReviews .tabs__content .swiper-button-prev'
		}
	});
	const sReviewsVideoSlider = new Swiper('.sReviews .tabs__content .sReviews__sliderVideo--js', {
		slidesPerView: 1,
		loop: false,
		spaceBetween: 30,
		observer: true,
		autoHeight: true,
		observeParents: true,
		breakpoints: {
			992: {
				slidesPerView: 2
			},
			1200: {
				slidesPerView: 3
			}
		},
		navigation: {
			nextEl: '.sReviews .tabs__content--video .swiper-button-next',
			prevEl: '.sReviews .tabs__content--video .swiper-button-prev'
		}
	});
	const sMotorcyclesSlider = new Swiper('.sMotorcycles__slider--js', {
		loop: false,
		// effect: fade,
		spaceBetween: 30,
		watchOverflow: true,
		slidesPerView: 1,
		breakpoints: {
			576: {
				slidesPerView: 2
			},
			992: {
				slidesPerView: 'auto'
			}
		},
		navigation: {
			nextEl: '.sMotorcycles .swiper-button-next',
			prevEl: '.sMotorcycles .swiper-button-prev'
		}
	}); //accardion

	function makeDDGroup(qSelecorts) {
		for (let parentSelect of qSelecorts) {
			let parent = document.querySelector(parentSelect);

			if (parent) {
				// childHeads, kind of funny))
				let ChildHeads = parent.querySelectorAll('.accardion__head--js');
				$(ChildHeads).click(function () {
					let clickedHead = this;
					$(ChildHeads).each(function () {
						if (this === clickedHead) {
							$(this.parentElement).toggleClass('active');
							$(this.parentElement).find('.accardion__content--js').slideToggle(function () {
								$(this).toggleClass('active');
							});
						} else {
							$(this.parentElement).removeClass('active');
							$(this.parentElement).find('.accardion__content--js').slideUp(function () {
								$(this).removeClass('active');
							});
						}
					});
				});
			}
		}
	}

	makeDDGroup(['.sQuestions', '.dd-price-js']);
}

;

if (document.readyState !== 'loading') {
	eventHandler();
} else {
	document.addEventListener('DOMContentLoaded', eventHandler);
} // window.onload = function () {
// 	document.body.classList.add('loaded_hiding');
// 	window.setTimeout(function () {
// 		document.body.classList.add('loaded');
// 		document.body.classList.remove('loaded_hiding');
// 	}, 500);
// }