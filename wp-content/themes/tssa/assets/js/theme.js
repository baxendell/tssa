// // Custom js for Theme

jQuery(document).ready(function($) {

	//Smooth Scrolling

	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
	    // On-page links
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000, function() {
	          // Callback after animation
	          // Must change focus!
	          var $target = $(target);
	          $target.focus();
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            $target.focus(); // Set focus again
	          };
	        });
	      }
	    }
	  });
	  
	//Skip Link
	var skipLink = function () {
        $(".skiplink").focusin(function () {
            $(this).css("position","static");
        });

        $(".skiplink").focusout(function () {
            $(this).css("position","absolute");
        });
    }

	//Navigation
	$('.nav-opener').click(function () {
		$('#m-toggle').toggleClass('.nav-active menu');
	});

	//FAQ Plugin JS
	$('.qa_cats').remove();

	var anchor = $( '.qa-faq-anchor' );

	anchor.click( function() {
		$('.faq-active').removeClass('faq-active');
		$('.qa-faq-anchor').removeClass('faq-active');
		$( this ).toggleClass( 'faq-active' );
	});

	//No comments
	$("#commentform").addClass("noauto");

	//Navigation
	$(".nav-opener").on("click",function() {
	    $(".header-top-wrap").toggleClass("nav-active");
	});

	// Play video on play

	 $(".modal").on('shown.bs.modal', function (ev) { 
	 	var $this2 = $(this); 
	 	var $frame2 = $this2.find('.modal-content #video_play iframe'); 
	 	$frame2[0].src += "1"; 
	 });

  	//Stop video on play

	 $(".modal").on('hidden.bs.modal', function (e) { 
	 	var $this = $(this); 
	 	var $frame = $this.find('.modal-content #video_play iframe');
	 	$frame.attr("src", $frame.attr("src").replace("autoplay=1", "autoplay="))
	 	//$frame.attr("src", $frame.attr("src")); 
	 });

	 //Hover for Desktop, click for mobile nav
	 if($(window).width() > 767){
	    $('.dropdown').on('mouseenter mouseleave click tap', function() {
	      $(this).toggleClass("open");
	    });
    } 

	//Slick

	$("#result-slide").slick({
		slidesToShow: 4,
		infinite: true,
		autoplay: false,
		slidesToScroll: 4,
		prevArrow: '<span class="icon-chevron-left-green"></span>',
		nextArrow: '<span class="icon-chevron-right-green"></span>',
		appendArrows: '.customNavigationResults',
		dots: false,
		responsive: [
		    {
		      breakpoint: 1199,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3
		      }
		    },
			{
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 4,
		        slidesToScroll: 4
		      }
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        centerMode: true
		      }
		    }
	  	]
	});

	$("#quote-slide").slick({
		infinite: true,
		arrows: false,
		appendDots: '.customDots',
		dots: true,
	});

	$("#practice-slide").slick({
		slidesToShow: 5,
		infinite: false,
		autoplay: false,
		slidesToScroll: 5,
		initialSlide: 0,
		prevArrow: '<span class="icon-chevron-left-green"></span>',
		nextArrow: '<span class="icon-chevron-right-green"></span>',
		appendArrows: '.customNavigationPractices',
		dots: false,
		responsive: [
		    {
		      breakpoint: 1199,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		        //centerMode: true,
		      }
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 2,
				slidesToScroll: 2,
		      }
		    },
			{
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
				slidesToScroll: 1,
		        centerMode: true,
		        centerPadding: 0,
		      }
		    }

	  	],
	});	

	$("#association-rack").slick({
		slidesToShow: 6,
		infinite: false,
		autoplay: false,
		slidesToScroll: 6,
		initialSlide: 0,
		prevArrow: '<span class="icon icon-chevron-left"></span>',
		nextArrow: '<span class="icon icon-chevron-right"></span>',
		appendArrows: '.customNavigationAwards',
		dots: false,
		variableWidth: false,
		//centerMode: true,
		responsive: [
		    {
		      breakpoint: 1199,
		      settings: {
		        slidesToShow: 4,
				slidesToScroll: 1,
				//centerMode: true,
				variableWidth: false,
		      }
		    },
		    {
		      breakpoint: 991,
		      settings: {
		        slidesToShow: 2,
				slidesToScroll: 1,
				//centerMode: true,
				variableWidth: false,
		      }
		    },

		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
		        centerMode: false,
		        variableWidth: false,
		      }
		    }
	  	]
	});
});


jQuery(window).load(function() {
	jQuery('.wf-active').css({ 'opacity': "0" });
	jQuery('.wf-active').attr('style', 'opacity: 1 !important');
});
