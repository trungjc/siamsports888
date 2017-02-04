
<footer id="dc_footer" class="">
	<div class=" clearfix">
		<div class="dc_footer_top clearfix">
			<?php the_field('footer_top', option) ?>
		</div>
		<div class="dc_footer_end clearfix">
			<?php the_field('footer', option) ?>
		</div>
	</div>
</footer>


</div>



<?php wp_footer(); ?>

<script type="text/javascript" >
	
$('.dcs_search').on('click',function(e) {
    $('.dch_search').slideToggle();
    $(this).toggleClass('dcs_open');
    $('#searchform input').focus();
});
$('.mobile-toggle').on('click',function(e) {
  //  $('').slideToggle();
    $('body,html').toggleClass('open');
     $("body.open").on('click',function(e) {
 		
        if($(e.target).is('.dc_nav_mobile') || $(e.target).is('.mobile-toggle')){
            e.preventDefault();
            return;
        } else {
        	 $('body,html').removeClass('open');
        }
    });
});	

</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>