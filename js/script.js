jQuery(document).ready(function() {

    jQuery('<div class="select-arrow" style="height: 40px; width: 40px; line-height: 40px;"></div>').insertAfter('select');
    
    //mobile menu
    jQuery('.mobile-menu-anchor').click(function(e) {
        e.preventDefault();
        jQuery('.mobile-menu').toggle();    
    });
    
    jQuery('.mobile-menu li.menu-item-has-children').after().click(function(){
        jQuery(this).children('.sub-menu').toggle();
    });
    
    jQuery('.has-child').on("mouseenter", function() {
    	jQuery(this).children('.sub-menu').css('visibility', 'visible');
    	jQuery(this).children('.sub-menu').css('display', 'grid');
    });
    
    jQuery('.has-child').mouseleave(function() {
    	jQuery(this).children('.sub-menu').css('visibility', 'hidden');
    });
    
     jQuery('.desktop-menu .menu-item-has-children').on("mouseenter", function() {
    	jQuery(this).children('.sub-menu').css('visibility', 'visible');
    	jQuery(this).children('.sub-menu').css('display', 'grid');
    });
    
    jQuery('.desktop-menu .menu-item-has-children').mouseleave(function() {
    	jQuery(this).children('.sub-menu').css('visibility', 'hidden');
    });
    
    //News Search Bar
    jQuery('.sidebar-widget .searchform>div').append('<a class="erase-search">&#10006;</a>');
    jQuery('.sidebar-widget .searchform input[type="submit"]').attr('value','');
    jQuery('.sidebar-widget .searchform input[type="text"]').on('input',function() {
        jQuery('.sidebar-widget .searchform .erase-search').show();
    });
    
    jQuery('.sidebar-widget .searchform .erase-search').on('focusout',function() {
        jQuery(this).hide();
    });
    
    jQuery('.sidebar-widget .searchform input[type="text"]').keyup(function() {
        if(jQuery('.sidebar-widget .searchform input[type="text"]').val()) {
            jQuery('.sidebar-widget .searchform .erase-search').show();
        } else {
            jQuery('.sidebar-widget .searchform .erase-search').hide();
        }
    });
    
    jQuery('.sidebar-widget .searchform .erase-search').on('click', function() {
        jQuery('.sidebar-widget .searchform input[type="text"]').val('');
        jQuery(this).hide();
    });
    
    //News Search Bar
    
    
    //Accordions
    jQuery('.accordion-title').click(function() {
        jQuery(this).toggleClass('active');
        jQuery(this).parent().siblings().children('.accordion-content').slideUp();
        jQuery(this).parent().children('.accordion-content').slideDown();
        jQuery(this).parent('.accordion-item').siblings('.accordion-item').find('.accordion-title').removeClass('active');
        
    });
    
    
    //Tabs
    if(jQuery(window).width() > 1280) {
        //Submenu
        jQuery('.menu-item-has-children .sub-menu').each(function() {
            let leftPosition = jQuery('#menu-item-204').offset().left;
            let thisLeft = jQuery(this).offset().left;
            let difference = thisLeft - leftPosition; 
            if(difference > 0) {
                if(jQuery(this).offset().left > 500) {
                jQuery(this).css('left', -difference); 
                }
            }  
        });
        //Submenu
        
        var maxHeight = -1;
        jQuery('.mobile-tab .mobile-tab-content').each(function() {
            if (jQuery(this).innerHeight() > maxHeight) {
                maxHeight = jQuery(this).innerHeight();
            }
        });
        jQuery('.mobile-tab .mobile-tab-content').css('min-height',maxHeight);
        
    } else if(jQuery(window).width() > 1024 && jQuery(window).width() < 1280) {
        //Submenu
        jQuery('.menu-item-has-children .sub-menu').each(function() {
            let leftPosition = jQuery('#menu-item-204').offset().left;
            let thisLeft = jQuery(this).offset().left;
            let difference = thisLeft - leftPosition; 
            if(difference > 0) {
                if(jQuery(this).offset().left > 100) {
                jQuery(this).css('left', -difference); 
                }
            }  
        });
        
        var maxHeight = -1;
        jQuery('.mobile-tab .mobile-tab-content').each(function() {
            if (jQuery(this).innerHeight() > maxHeight) {
                maxHeight = jQuery(this).innerHeight();
            }
        });
        jQuery('.mobile-tab .mobile-tab-content').css('min-height',maxHeight);
        
    }
    
   
    
    jQuery('.mobile-tab-header').click(function() {
        jQuery(this).parent().siblings('.mobile-tab-item').removeClass("tab-active");
        jQuery(this).parent().addClass("tab-active");
        
        jQuery('html,body').animate({scrollTop: jQuery(this).offset().top - 80}, 'linear');
    });

    jQuery('.desktop-tab-nav ul li').click(function() {
        jQuery(this).parent().parent().siblings().removeClass('tab-active');
        jQuery(this).parent().children().removeClass('tab-active');
        
        jQuery(this).addClass("tab-active");
    	let current_tab = jQuery(this).attr('tab-id');
    	let active_tab = jQuery(this).parent().parent().siblings('.mobile-tab-item[tab-id = '+current_tab+']');
    	active_tab.addClass('tab-active');
    });
    
    //How it works slider
    jQuery('.how-it-works-slider-holder').slick({
      dots: true,
      infinite: true,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      prevArrow: jQuery('.prev-btn'),
	  nextArrow: jQuery('.next-btn')
    });
    
    jQuery('.slick-dots button').html("");
});


//Scroll and sticky menu effect
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 150 && jQuery(window).width() > 800) {
        jQuery('.menu-section').addClass('is-sticky');
    } else {
        jQuery('.menu-section').removeClass('is-sticky');
    }
});



jQuery(document).ready(function() {
    /* Master Slider */
    /* Dynamic styling */
    jQuery(document).ready(function() {
        jQuery('.master-navigators').css('top', 0.5 * jQuery('.master-display').height());
    });
    
    jQuery('.master-slider').on('mouseenter', function() {
        setTimeout(function () {
            jQuery('.master-navigators').show();
        }, 300);
    });
    
    jQuery('.master-slider').on('mouseleave', function() {
        setTimeout(function () {
            jQuery('.master-navigators').hide();
        }, 300);
    });
    /* Dynamic styling */
    
    /* Autoplay */
    var sliderInterval = setInterval(function() {
        if(jQuery('.master-slider').attr('autoplay') == 'autoplay') {
            let totalChildren = jQuery('.master-slider').children('.master-display').children().length;
            totalChildren = totalChildren - 1;
            
            let currentDisplayItem = jQuery('.master-slider').children('.master-display').children('.master-display-item').first();
            let currentIndex = parseInt(currentDisplayItem.attr('index'));
            let nextIndex = 0;
            if(currentIndex == totalChildren) {
                nextIndex = 1;
            } else {
                nextIndex = currentIndex + 1;
            }
            let nextItemToDisplay = jQuery('.master-slider').children('.master-display').children('.master-display-item[index='+nextIndex+']');
            nextItemToDisplay.prependTo(jQuery('.master-slider').children('.master-display'));
            
            jQuery('.master-slider').children('.master-navigation').children('.master-thumbnail').removeClass('navigation-active');
            jQuery('.master-slider').children('.master-navigation').children('.master-thumbnail[index='+nextIndex+']').addClass('navigation-active');
        }
        
    }, 4000);
    /* Autoplay */
    
    /*Previous Action */
    jQuery('.master-prev').on('click', function(e) {
        e.preventDefault();
        
        let currentDisplayItem = jQuery(this).parent().parent('.master-display').children('.master-display-item').first();
        let currentIndex = parseInt(currentDisplayItem.attr('index'));
        
        let totalChildren = jQuery(this).parent().parent('.master-display').children().length;
        totalChildren = totalChildren -1;
        let nextIndex = 0;
        if(currentIndex == 1) {
            nextIndex = totalChildren;
        } else {
            nextIndex = currentIndex - 1;
        }
        
        let nextItemToDisplay = jQuery(this).parent().parent('.master-display').children('.master-display-item[index='+nextIndex+']');
        nextItemToDisplay.prependTo(jQuery(this).parent().parent('.master-display'));
        
        jQuery(this).parent().parent().siblings('.master-navigation').children('.master-thumbnail').removeClass('navigation-active');
        jQuery(this).parent().parent().siblings('.master-navigation').children('.master-thumbnail[index='+nextIndex+']').addClass('navigation-active');
        clearInterval(sliderInterval);
        jQuery('iframe').each(function(index) {
            jQuery(this).attr('src', jQuery(this).attr('src'));
            return false;
      });
    });
    
    /* Next Action*/
    jQuery('.master-next').on('click', function(e) {
        e.preventDefault();
        
        let currentDisplayItem = jQuery(this).parent().parent('.master-display').children('.master-display-item').first();
        let currentIndex = parseInt(currentDisplayItem.attr('index'));
        
        let totalChildren = jQuery(this).parent().parent('.master-display').children().length;
        totalChildren = totalChildren - 1;
        let nextIndex = 0;
        if(currentIndex == totalChildren) {
            nextIndex = 1;
        } else {
            nextIndex = currentIndex + 1;
        }
        
        let nextItemToDisplay = jQuery(this).parent().parent('.master-display').children('.master-display-item[index='+nextIndex+']');
        nextItemToDisplay.prependTo(jQuery(this).parent().parent('.master-display'));
        
        jQuery(this).parent().parent().siblings('.master-navigation').children('.master-thumbnail').removeClass('navigation-active');
        jQuery(this).parent().parent().siblings('.master-navigation').children('.master-thumbnail[index='+nextIndex+']').addClass('navigation-active');
        clearInterval(sliderInterval);
        jQuery('iframe').each(function(index) {
            jQuery(this).attr('src', jQuery(this).attr('src'));
            return false;
      });
    });
    
    /* Click on thumbnail action */
    jQuery('.master-thumbnail').on('click', function() {
        let nextIndex = jQuery(this).attr('index');
        
        let nextItemToDisplay = jQuery(this).parent().siblings('.master-display').children('.master-display-item[index='+nextIndex+']');
        nextItemToDisplay.prependTo(jQuery(this).parent().siblings('.master-display'));
        
        jQuery(this).siblings().removeClass('navigation-active');
        jQuery(this).addClass('navigation-active');
        clearInterval(sliderInterval);
        jQuery('iframe').each(function(index) {
            jQuery(this).attr('src', jQuery(this).attr('src'));
            return false;
      });
    });
    /* Click on thumbnail action */
    

    
    /* Video iframe logic */
    jQuery('.master-btn-play').on('click', function() {
        jQuery(this).siblings('.in-frame').show();
        clearInterval(sliderInterval);
        jQuery(this).parent().parent().parent().removeAttr("autoplay");
        
    });
    
    jQuery('.close-iframe').on('click', function() {
        jQuery(this).parent().hide();
        jQuery(this).parent().parent().parent().parent().attr("autoplay", "autoplay");
        clearInterval(sliderInterval);
        
        jQuery('iframe').each(function(index) {
            jQuery(this).attr('src', jQuery(this).attr('src'));
            return false;
      });
    });
    /* Video iframe logic */
    /* Master Slider */

    jQuery('#plus').click(function() {
    	let input = jQuery(this).prev('input.qty');
        var val = parseInt(input.val());
        input.val( val+1 ).change();
    });

    jQuery('#minus').click(function() {
    	let input = jQuery(this).next('input.qty');
        var val = parseInt(input.val());
        if (val > 0) {
            input.val( val-1 ).change();
        } 
    });
});

jQuery(document).ready(function() {
    jQuery('.rslides').slick({
		dots: false,
		prevArrow: false,
		nextArrow: false,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 1500,
		responsive: [{
		    breakpoint:800,
		    settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		    },
		}],
	});
	
	jQuery('.orgs-we-supply').slick({
	slidesToShow: 6,
	slidesToScroll: 6,
	autoplay: false,
	autoplaySpeed: 4000,
	prevArrow: jQuery('.prev-btn'),
	nextArrow: jQuery('.next-btn'),
	responsive: [{
		    breakpoint:1280,
		    settings: {
		        slidesToShow: 5,
		        slidesToScroll: 5,
		    },
		},
		{
		    breakpoint:800,
		    settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
		    },
		}],
	});
	
	jQuery('.popup-on-click').click(function() {
	let target = jQuery(this).attr('popup-id');
	console.log(target);
	let element = jQuery('.popup[popup-id ='+ target +']');
	element.slideDown();
    });
    
    jQuery('.show-popup').on('click', function (e) {
        e.preventDefault();
        let target = jQuery(this).attr('target');
        console.log(target);
        let audioElement = jQuery('#' + target).find('audio');

        if (audioElement.length > 0) {
            let sourceElementURL = jQuery('#' + target + ' source').attr('datasrc');

            if (sourceElementURL) {

                jQuery('#' + target + ' source').attr('src', sourceElementURL);
                audioElement[0].load();
                audioElement[0].play();

            }
        }
        jQuery('#' + target).slideDown();
        // jQuery('body').css('overflow', 'hidden');
    });
    
    jQuery(document).on('click', '.popup', function(e) {
      if (!jQuery(e.target).closest('.popup-block').length) {
        jQuery(this).slideUp();
      }
    });
    
    

    jQuery('.close').click(function(e) {
    	e.preventDefault();
    	jQuery(this).parent().parent().parent().slideUp();
    });
    
    
});


