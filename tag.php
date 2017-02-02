<?php get_header(); ?>

<h1><?php echo single_cat_title(); ?></h1>

<?php $tagid = get_the_tags('cat'); ?>

<?php echo do_shortcode('[ajax_load_more post_type="post" tag="'.$tagid.'" scroll="false" button_label="Show"]'); ?>

<?php get_footer(); ?>