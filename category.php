<?php get_header(); ?>
<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php echo get_site_url(); ?>">Home</a>
            <a href="<?php echo get_site_url(); ?>/news">ニュース・<?php single_cat_title('', true) ?></a>
            <span>
                <?php single_cat_title('', true) ?>
            </span>
        </div>
    </div>
    <div class="c-headpage">
        <h2 class="c-title">ニュース・<?php single_cat_title('', true) ?></h2>
    </div>
    <div class="p-news__content">
        <div class="l-container">
            <ul class="c-listpost" id="cat_1">
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>
                        <li class="c-listpost__item">
                            <div class="c-listpost__info">
                                <span class="datepost">
                                    <?php echo get_the_date('Y年m月d日'); ?>
                                </span>
                    <?php
                    $cats = get_the_category($post);
                    foreach ($cats as $cat) {
                        if ($cat->cat_name) {
                            ?>
                                        <span class="cat">
                                            <i class="c-dotcat"
                                                style="background-color: <?php echo get_category_color($cat->cat_name); ?>"></i>
                                            <a href="<?php echo get_category_link($cat->term_id); ?>">
                                                <?php echo $cat->cat_name; ?>
                                            </a>
                                        </span>
                                    <?php }
                    } ?>
                            </div>
                            <h3 class="titlepost"> <a href="<?php echo get_permalink($post->ID) ?>">
                                    <?php echo get_the_title() ?>
                                </a></h3>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
            <div class="c-pagination">
                <?php the_posts_pagination(
                    array(
                        'mid_size' => 4,
                        'prev_text' => __('', 'textdomain'),
                        'next_text' => __('', 'textdomain'),
                    )
                ); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>