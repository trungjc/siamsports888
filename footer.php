
<footer id="dc_footer" class="clearfix">
	<div class="dc_main clearfix">
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

</body>
</html>