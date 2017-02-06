<?php get_header(); ?>
<div class="single-page">
<h1><?php echo the_title(); ?></h1>
<hr/>
<div class="clearfix  head_post">
<span class="date pull-left"><?php the_date(); ?></span> 

<div class="dc_share pull-right">
    <div class="social-single">
        <a class="facebook-social" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a class="twitter-social" href="http://twitter.com/home?status=Reading: <?php the_permalink(); ?>" title="Share this post on Twitter!" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a class="line-social" target="_blank" href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url') ?>/img/line-icon.png"></a>
        <a class="google-plus-social" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </div>
</div>
</div>


<?php if (have_posts()) { ?>
<div class="dc_content_single clearfix">
<?php while (have_posts()) { the_post(); ?>
<?php the_content(); ?>
<?php } ?>
</div>
<?php } wp_reset_query(); ?>

<div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="100%" data-numposts="5"></div>	

<div class="dc_share ">
    <div class="social-single">
        <a class="facebook-social" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a class="twitter-social" href="http://twitter.com/home?status=Reading: <?php the_permalink(); ?>" title="Share this post on Twitter!" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a class="line-social" target="_blank" href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url') ?>/img/line-icon.png"></a>
        <a class="google-plus-social" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </div>
</div>
<hr/>


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
		'posts_per_page'=>6,
		'caller_get_posts'=>1
	);
query_posts($args); ?>
<?php if ( have_posts() ) { ?>
<div class="dch_lastnews_title clearfix">
			<h3>Related Post</h3>
		</div>	
	<div class="dc_related clearfix">
		
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
</div>
<?php get_footer(); ?>