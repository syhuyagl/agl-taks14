<?php

get_header();

$title = get_field('title', $post->ID);
$description = get_field('description', $post->ID);
$feature_image = get_field('image', $post->ID);
$date = get_field('public_date', $post->ID);
$author = get_field('author', $post->ID);
$publisher = get_field('publisher', $post->ID);
$price = get_field('price', $post->ID);
$contents = get_field('contents', $post->ID);
?>


<?php get_footer(); ?>