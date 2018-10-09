jQuery(document).ready(function ($) {
    "use strict";
	
	//preloader
   	setTimeout(function() {
        $('#preloader').fadeOut('slow', function() {
        });
    }, 300);
	
	//fixed-header
	$('.navigation-container').each(function(){
		var window_scrolltop;
		
		$(window).scroll(function(){
			window_scrolltop = $(this).scrollTop();
			if(window_scrolltop > 10){
				$(".navigation-container").addClass("fixed-header", 1000);
			}
			else {
				$(".navigation-container").removeClass("fixed-header" ,1000);
			}
		});
	});
	
	// Sticky sidebar
	if ($(window).width() > 960) {
	   $('.sidebar-stick').each(function(){
			$('.sidebar-stick').theiaStickySidebar({
				additionalMarginTop: 90,
				additionalMarginBottom: 20,
			});
		});
	}
	
	// Back to top
	$('.back-to-top').each(function(){
		var offset = 220;
		var duration = 500;
			$(window).scroll(function() {
				if ($(this).scrollTop() > offset) {
					$('.back-to-top').fadeIn(duration);
				} else {
					$('.back-to-top').fadeOut(duration);
				}
		});

		$('.back-to-top').on("click", function(event) {

			event.preventDefault();
			$('html, body').animate({scrollTop: 0}, 1000);

		return false;
		});
	});

    // Slider setting up
    $('.carousel-default').owlCarousel({
		loop: true,
        items: 1,
		autoplay:true,
        autoplayTimeout: 2500,
		autoplaySpeed: 1500,
        navSpeed: 1500,
        nav: true,
		navText: false,
		dots: false,
		responsive: {
			1199: { items:1 },
			979: { items:1 },
			768: { items:1 },
			479: { items:1 },
			0: { items:1 }
		  }
    });
	 $('.carousel-two').owlCarousel({
		loop: true,
        items: 2,
		autoplay:true,
        autoplayTimeout: 2500,
		autoplaySpeed: 1500,
        navSpeed: 1500,
        nav: true,
		navText: false,
		dots: false,
		responsive: {
			1199: { items:2 },
			979: { items:2 },
			768: { items:1 },
			479: { items:1 },
			0: { items:1 }
		  }
    });
	$('.carousel-three').owlCarousel({
		loop: true,
        items: 3,
		autoplay:true,
        autoplayTimeout: 2500,
		autoplaySpeed: 1500,
        navSpeed: 1500,
        nav: true,
		navText: false,
		dots: false,
		responsive: {
			1199: { items:3 }, 
			979: { items:3 },
			768: { items:1 },
			479: { items:1 },
			0: { items:1 }
		  }
    });
	$('.carousel-onef').owlCarousel({
		loop: true,
        items: 1,
		autoplay:true,
        autoplayTimeout: 2500,
		autoplaySpeed: 1500,
        navSpeed: 1500,
        nav: true,
		navText: false,
		dots: false,
		responsive: {
			1199: { items:1 },
			979: { items:1 },
			768: { items:1 },
			479: { items:1 },
			0: { items:1 }
		  }
    });
	$('.carousel-twof').owlCarousel({
		loop: true,
        items: 2,
		autoplay:true,
        autoplayTimeout: 2500,
		autoplaySpeed: 1500,
        navSpeed: 1500,
        nav: true,
		navText: false,
		dots: false,
		responsive: {
			1199: { items:2 },
			979: { items:2 },
			768: { items:1 },
			479: { items:1 },
			0: { items:1 }
		  }
    });
	
	// Post slider
	$('.bxslider').bxSlider({
	  adaptiveHeight: true,
	  mode: 'fade',
	  pager: false,
	  captions: true
	});

	// Searchbox
	var submitIcon = $('.searchbox-icon');
	var submitfk = $('.fk-submit');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;
    submitIcon.click(function(){
        if(isOpen == false){
            searchBox.addClass('searchbox-open');
            submitIcon.addClass('submit-active');
            submitfk.addClass('submit-active');
            inputBox.focus();
            isOpen = true;
        } else {
            searchBox.removeClass('searchbox-open');
            submitIcon.removeClass('submit-active');
            submitfk.removeClass('submit-active');
            inputBox.focusout();
            isOpen = false;
        }
    });  
    submitIcon.mouseup(function(){
        return false;
    });
    searchBox.mouseup(function(){
        return false;
    });
    $(document).mouseup(function(){
        if(isOpen == true){
            $('.searchbox-icon').css('display','block');
            submitIcon.click();
        }
    });	

    // toggle sidebar
    $('.sidebar-scroll').each(function(){
        $("body").on("click",".menu-tumbl", function(e){
            $("html").addClass("glide-nav-open");
            $("html").addClass("overflow-clear");
            $(".sidebar-scroll, .blog-inwrap").addClass("open");
            e.stopPropagation();
            e.preventDefault();
        });

        $("body").on("click",".close-btn", function(e){
            $("html").removeClass("glide-nav-open");
            $(".sidebar-scroll, .blog-inwrap").removeClass("open");
            $("html").removeClass("overflow-clear");
            e.preventDefault();
        });

		$(".sidebar-scroll ul li.menu-item-has-children").append( "<i class='fa fa-angle-down'></i>" );
        $(".sidebar-scroll ul li.menu-item-has-children i").on("click", function() {
            var link = $(this);
            var closest_ul = link.closest("ul");
            var parallel_active_links = closest_ul.find(".active")
            var closest_li = link.closest("li");
            var link_status = closest_li.hasClass("active");
            var count = 0;
            closest_ul.find("ul").slideUp(function() {
                if (++count == closest_ul.find("ul").length)
                        parallel_active_links.removeClass("active");
            });
            if (!link_status) {
                closest_li.children("ul").slideDown();
                closest_li.addClass("active");
            }
        });
        $('.scrollbar-macosx').scrollbar();
    });

	//Shop
	$(document).on('click', '.mkd-quantity-minus, .mkd-quantity-plus', function (e) {
		e.stopPropagation();

		var button = $(this),
			inputField = button.siblings('.mkd-quantity-input'),
			step = parseFloat(inputField.attr('step')),
			max = parseFloat(inputField.attr('max')),
			minus = false,
			inputValue = parseFloat(inputField.val()),
			newInputValue;

		if (button.hasClass('mkd-quantity-minus')) {
			minus = true;
		}

		if (minus) {
			newInputValue = inputValue - step;
			if (newInputValue >= 1) {
				inputField.val(newInputValue);
			} else {
				inputField.val(1);
			}
		} else {
			newInputValue = inputValue + step;
			if (max === undefined) {
				inputField.val(newInputValue);
			} else {
				if (newInputValue >= max) {
					inputField.val(max);
				} else {
					inputField.val(newInputValue);
				}
			}
		}
		inputField.trigger('change');
	});

	//Initialize for inline images
	$('.pop').magnificPopup({type:'image'});
	//Initialize for wordpress galleries
	$('.gallery, .woocommerce-product-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		zoom: {
			enabled: !0,
			duration: 300
		},
		gallery: {
			enabled: true
		},
	});
	
	// Fitvids
	$(document).ready(function(){
		$(".container").fitVids();
	});
	
});