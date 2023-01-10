
jQuery(window).on("load resize",function(){
	//
});

jQuery(function(){
	
	function initFunction(){
		jQuery('[data-toggle="tooltip"]').tooltip();
		jQuery("form input[type=tel]").mask("+7 (999) 999 99-99");
		jQuery('#ya-map .map-box').click(function(){jQuery(this).remove()});
		
		jQuery('#navbar-menu a.nav-link.href').click( function(){
			var El = jQuery(this).attr('href');
			if (jQuery(El).length !== 0){
				jQuery('html, body').animate({ scrollTop: jQuery(El).offset().top + 3 }, 800);
			}
			return false;
		});
		
		jQuery('.card_button').click(function(){
			var $postID =+ jQuery(this).attr('data-id');
			jQuery.get( '/wp-admin/admin-ajax.php', { action:'get_capsule', capsule_id: $postID } ).done(function( data ) {
				var obj = JSON.parse(data);
				jQuery('#service-model h5.modal-title').text(obj.title);
				jQuery('#service-model .modal-body').html(obj.text);
				jQuery('#service-model').modal('show');
			}).fail(function(e){
				console.error(e);
			});

			return false;
		});
		
		jQuery('#phone-form').submit(function(){
			jQuery('#phone-form').find('button[type="submit"]').attr('disabled','disabled');
			var name = jQuery('#item_name').val();
			var phone = jQuery('#item_phone').val();
			jQuery.ajax({
				url: "/wp-admin/admin-ajax.php",
				method: 'post',
				data: {
					action: 'ajax_form',
					name: name,
					phone: phone
				},
				success: function(msg){
					jQuery('#item_name').removeClass('is-invalid');
					switch(JSON.parse(msg)){
						case 'error_name':
							jQuery('#item_name').addClass('is-invalid').focus();
						break;
						case 'error_send':
							jQuery('#phone-model').modal('hide');
							jQuery('#info-model .modal-header').removeClass('bg-success').addClass('bg-danger');
							jQuery('#info-model .modal-body .alert span > i').removeClass('fa-check').addClass('fa-exclamation-triangle');
							jQuery('#info-model .modal-body .alert p').removeClass('text-success').addClass('text-danger').text('Ошибка почтового сервера. Попробуйте повторить позднее.');
							jQuery('#info-model').modal('show');
						break;
						case 'form_send':
							jQuery('#phone-model').modal('hide');
							jQuery('#item_name,#item_phone').val('').removeClass('is-invalid');
							jQuery('#info-model .modal-header').removeClass('bg-danger').addClass('bg-success');
							jQuery('#info-model .modal-body .alert p').removeClass('text-danger').addClass('text-success').text('Ваше сообщение успешно отправлено. Мы свяжемся с вами в ближайшее время!');
							jQuery('#info-model').modal('show');
					}
					jQuery('#phone-form').find('button[type="submit"]').attr('disabled', false);
				}
			});

			return false;
		});
		
		var swiperInfo = new Swiper('#info .swiper-container', {
      		slidesPerView: 1,
      		spaceBetween: 10,
			loop: true,
			autoplay: {
    			delay: 5500,
  			},
      		pagination: false,
			navigation: {
    			nextEl: '.swiper-button-next',
    			prevEl: '.swiper-button-prev',
  			},
      		breakpoints: {
        		360: {
          			slidesPerView: 1,
          			spaceBetween: 0,
        		},
        		400: {
          			slidesPerView: 1,
          			spaceBetween: 0,
        		},
        		768: {
          			slidesPerView: 3,
          			spaceBetween: 0,
        		},
        		1200: {
          			slidesPerView: 4,
          			spaceBetween: 0,
        		},
      		}
    	});
		
		var swipeReview = new Swiper('#review .swiper-container', {
      		slidesPerView: 1,
      		spaceBetween: 50,
			loop: true,
			autoplay: {
    			delay: 3500,
  			},
      		pagination: false,
			navigation: {
    			nextEl: '.swiper-button-next',
    			prevEl: '.swiper-button-prev',
  			},
      		breakpoints: {
        		360: {
          			slidesPerView: 1,
          			spaceBetween: 0,
        		},
        		400: {
          			slidesPerView: 1,
          			spaceBetween: 0,
        		},
        		768: {
          			slidesPerView: 2,
          			spaceBetween: 30,
        		},
        		1200: {
          			slidesPerView: 3,
          			spaceBetween: 50,
        		},
        		1600: {
          			slidesPerView: 4,
          			spaceBetween: 50,
        		},
      		}
    	});
		
		//
	}
	
	function initMap(){
		// Создание карты.
		var myMap = new ymaps.Map("ya-map", {
            center: [47.226029957905396,39.75964661538056],
			zoom: 18
        }),
		myMark = new ymaps.Placemark([47.226029957905396,39.75964661538056], 
		{
			hintContent: 'HIDE HOSTEL - УЮТНЫЙ КАПСУЛЬНЫЙ ОТЕЛЬ В ТИХОМ ЦЕНТРЕ РОСТОВА-НА-ДОНУ'
		}, 
		{
			iconLayout: 'default#image',
      		iconImageHref: '/wp-content/themes/hide_hostel/images/logo-map.png',
      		iconImageSize: [50, 50],
      		iconImageOffset: [-72, -25]
		})
		
		myMap.geoObjects.add(myMark);
    }

	initFunction();
	ymaps.ready(initMap);
});