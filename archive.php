<?php get_header(); ?>

<h1><?php echo single_cat_title(); ?></h1>

<?php $catid = get_query_var('cat'); ?>

<div class="dc_catdes clearfix">
	<?php echo category_description( $catid ); ?>
</div>

<?php echo do_shortcode('[ajax_load_more post_type="post" category="'.$catslug.'" scroll="false" button_label="Show"]'); ?>

<?php get_footer(); ?>