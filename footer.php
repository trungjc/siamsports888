
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
	
$('.dcs_search').click(function(e) {
    $('.dch_search').slideToggle();
    $(this).toggleClass('dcs_open');
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