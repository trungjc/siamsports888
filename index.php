<?php get_header(); ?>

<?php
$item = get_field('feature_item', option);
$story = get_field('home_last_story', option);
$feature = array(
	'meta_key' => 'post_views_count',
	'orderby' => 'meta_value_num',
	'order' => 'DESC'
);
query_posts($feature);
?>
<?php if (have_posts()); { $post = $posts[0]; $c=0; ?>
<div class="dc_feauture clearfix">
<?php while (have_posts()) { the_post(); ?>

<?php $c++; if($c ==1) { ?>
	<div class="dc_feauture_top">
		<?php if(has_post_thumbnail()) { ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="dch_news_img"><img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'large', true); echo $image_url[0];  ?>" alt="<?php the_title(); ?>" /></a>
		<?php } ?>
		<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
	</div>
<?php } else { ?>
	<div class="dc_feauture_item">
		<?php if(has_post_thumbnail()) { ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="dch_news_img"><img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'thumbnail', true); echo $image_url[0];  ?>" alt="<?php the_title(); ?>" /></a>
		<?php } ?>
		<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
	</div>
<?php } ?>

<?php } ?>
</div>
<?php } wp_reset_query(); ?>


<?php echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="'.$story.'" offset="'.$item.'" scroll="false" button_label="Show"]'); ?>

<?php /*?><div class="dch_loading clearfix">
	<div class="dch_item clearfix">
		<?php if(has_post_thumbnail()) { ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="dch_news_img"><img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'thumbnail', true); echo $image_url[0];  ?>" alt="<?php the_title(); ?>" /></a>
		<?php } ?>
		<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<aside><?php the_excerpt(); ?></aside>
	</div>
</div><?php */?>

<?php get_footer(); ?>