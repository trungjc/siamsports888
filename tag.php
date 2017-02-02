<?php get_header(); ?>

<?php
    $tag = get_queried_object();
    $tagslug = $tag->slug;
?>

<h1><?php echo $tag->name; ?></h1>

<?php echo do_shortcode('[ajax_load_more post_type="post" tag="'.$tagslug.'" scroll="false" button_label="Show"]'); ?>

<?php get_footer(); ?>