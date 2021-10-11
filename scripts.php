
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- SCRIPTS -->
	    <script>
	        $(document).ready(function() {

				// ===== Scroll to Top ==== 
				$(window).scroll(function() {
					if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
						$('#return-to-top').fadeIn(200);    // Fade in the arrow
					} else {
						$('#return-to-top').fadeOut(200);   // Else fade out the arrow
					}
				});
				$('#return-to-top').click(function() {      // When arrow is clicked
					$('body,html').animate({
						scrollTop : 0                       // Scroll to top of body
					}, 500);
				});

				// ===== Responsive ==== 
	            if(window.screen.width <= 768){
	                $('.nav.navbar-nav').addClass('collapse');
	                $('#nav-language').insertBefore($('#navbar-toggler'));
	                $('.nav.navbar-nav .navbar-nav').css('margin-right','auto');
	                    
	                var joinBtn = $('.join-btn').eq(0);
	                $('.join-btn').parent().remove();
                    $('.row.caption').slick({
                        autoplay: true,
                        autoplaySpeed: 2000,
                    });

                    joinBtn.css("margin-top","1rem");
	                joinBtn.insertAfter($('.about_number_object'));

	            }
	        });
	    </script>