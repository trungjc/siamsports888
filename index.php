<?php get_header(); ?>

<?php
$item = get_field('feature_item', option);
$story = get_field('home_last_story', option);
$feature = array(
	'posts_per_page' => $item,
	'meta_key' => 'wpb_post_views_count',
	'orderby' => 'meta_value_num',
	'order' => 'DESC',
);
query_posts($feature);
?>
<?php if (have_posts()); { ?>
<div class="dc_feauture slider-for">
<?php while (have_posts()) { the_post(); ?>

	<div class="dc_feauture_top" style="background-position: top center;background-size:cover;background-image:url(<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'large', true); echo $image_url[0];  ?>) ">
		<?php if(has_post_thumbnail()) { ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="dch_news_img"><img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'large', true); echo $image_url[0];  ?>" alt="<?php the_title(); ?>" style="visibility: hidden;opacity: 0" /></a>
		<?php } ?>
		<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
	</div>

<?php } ?>
</div>


<div class="slider-nav">
	<?php while (have_posts()) { the_post(); ?>
		<div class="dc_feauture_item">
			<?php if(has_post_thumbnail()) { ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="dch_news_img"><img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'thumbnail', true); echo $image_url[0];  ?>" alt="<?php the_title(); ?>" /></a>
			<?php } ?>
			<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
	</div>
	<?php } ?>

</div>
<?php } wp_reset_query(); ?>


<div class="lastest-post">
<?php echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="'.$story.'" scroll="false" button_label="Show"]'); ?>
</div>


<?php get_footer(); ?>
<script type="text/javascript">
	 $('.slider-for').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  fade: true,
		  asNavFor: '.slider-nav'
		});
		$('.slider-nav').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  asNavFor: '.slider-for',
		  dots: false,autoplay: true,
		  focusOnSelect: true,
		  responsive: [
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		      }
    },]
		});
</script>