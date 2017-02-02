<?php get_header(); ?>

<h1><?php echo the_title(); ?></h1>

<?php if (have_posts()) { ?>
<div class="dc_content_single clearfix">
<?php while (have_posts()) { the_post(); ?>
<?php the_content(); ?>
<?php } ?>
</div>
<?php } wp_reset_query(); ?>


<?php
$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);
if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	$args=array(
		'tag__in' => $tag_ids,
		'post__not_in' => array($post->ID),
		'posts_per_page'=>3,
		'caller_get_posts'=>1
	);
query_posts($args); ?>
<?php if ( have_posts() ) { ?>
	<div class="dc_related clearfix">
		<div class="dch_lastnews_title clearfix">
			<h3>Related Post</h3>
		</div>	
		<div class="dc_related_list clearfix">
<?php while( have_posts() ) { the_post(); ?>
		<div class="dc_related_item">
<?php if(has_post_thumbnail()) { ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'thumbnail', true); echo $image_url[0];  ?>" alt="<?php the_title(); ?>" /></a>
<?php } ?>
			<h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
			<?php the_category(); ?>
		</div>
<?php } ?>
		</div>
	</div>
<?php } ?>
<?php }
$post = $orig_post;
wp_reset_query();
?>

<?php get_footer(); ?>