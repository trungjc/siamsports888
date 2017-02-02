<?php get_header(); ?>

<?php if (have_posts()); { ?>
	<div class="dch_loading clearfix">
<?php while (have_posts()) { the_post(); ?>
		<div class="dch_item clearfix">
<?php if(has_post_thumbnail()) { ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'thumbnail', true); echo $image_url[0];  ?>" alt="<?php the_title(); ?>" /></a>
<?php } ?>
			<?php the_category(); ?>
			<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<aside><?php the_excerpt(); ?></aside>
		</div>
<?php } ?>
	</div>
<?php } wp_reset_query(); ?>

<div class="pagenavi">
<?php wp_pagenavi(); ?>
</div>	

<?php get_footer(); ?>