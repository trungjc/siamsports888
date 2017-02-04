<?php get_header(); ?>
<div class="single-page">
<h1><?php echo the_title(); ?></h1>

<?php if (have_posts()) { ?>
<div class="dc_content_single clearfix">
<?php while (have_posts()) { the_post(); ?>
<?php the_content(); ?>
<?php } ?>
</div>
<?php } wp_reset_query(); ?>
</div>
<?php get_footer(); ?>