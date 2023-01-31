<?php
/* Template Name: News
 */
?>
<?php get_header(); ?>
<main class="p-post">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php echo get_site_url(); ?>">Home</a>
            <span>ニュース・お知らせ</span>
        </div>
    </div>
    <div class="c-headpage">
        <h2 class="c-title">ニュース・お知らせ</h2>
    </div>
    <div class="p-news__content">
        <div class="l-container">
            <ul class="c-tabs">
                <?php
                $tabs = get_field('tabs', 11);
                if ($tabs) : ?>
                    <?php foreach ($tabs as $tab) : ?>
                        <li data-content="<?php echo $tab['content'] ?>" data-color="<?php echo $tab['color'] ?>" class="<?php echo $tab['active'] ?>">
                            <?php echo $tab['category'] ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="c-tabs__content" data-url="<?php echo admin_url('admin-ajax.php') ?>">
                <ul class="c-listpost active" id="all" data-cat="">
                    <?php
                    $get_post_query = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5,
                        'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
                    );
                    $newss1 = new WP_Query($get_post_query);
                    if ($newss1->have_posts()) :
                        while ($newss1->have_posts()) :
                            $newss1->the_post();
                    ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $post); ?></span>
                                    <?php
                                    $cats = get_the_category($post);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                            <div class="c-cats">
                                                <span class="cat">
                                                    <i class="c-dotcat" style="background-color: <?php echo get_category_color($cat->cat_name); ?>"></i>
                                                    <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                                </span>
                                            </div>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                                </h3>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="c-pagination">
                        <?php echo pagination_tdc($newss1, $paged, null, 'news') ?>
                    </div>
                </ul>
                <ul class="c-listpost" id="cat_1" data-cat="3">
                    <?php
                    $get_post_query = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5, 'cat' => 3,
                        'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
                    );
                    $newss = new WP_Query($get_post_query);
                    if ($newss->have_posts()) :
                        while ($newss->have_posts()) :
                            $newss->the_post();
                    ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $post); ?></span>
                                    <?php
                                    $cats = get_the_category($post);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                            <div class="c-cats">
                                                <span class="cat">
                                                    <i class="c-dotcat" style="background-color: <?php echo get_category_color($cat->cat_name); ?>"></i>
                                                    <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                                </span>
                                            </div>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                                </h3>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="c-pagination">
                        <?php echo pagination_tdc($newss, $paged, null, 'news') ?>
                    </div>
                </ul>
                <ul class="c-listpost" id="cat_2" data-cat="4">
                    <?php
                    $get_post_query = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5, 'cat' => 4,
                        'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
                    );
                    $newss = new WP_Query($get_post_query);
                    if ($newss->have_posts()) :
                        while ($newss->have_posts()) :
                            $newss->the_post();
                    ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $post); ?></span>
                                    <?php
                                    $cats = get_the_category($post);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                            <div class="c-cats">
                                                <span class="cat">
                                                    <i class="c-dotcat" style="background-color: <?php echo get_category_color($cat->cat_name); ?>"></i>
                                                    <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                                </span>
                                            </div>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                                </h3>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="c-pagination">
                        <?php echo pagination_tdc($newss, $paged, null, 'news') ?>
                    </div>
                </ul>
                <ul class="c-listpost" id="cat_3" data-cat="5">
                    <?php
                    $get_post_query = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5, 'cat' => 5,
                        'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
                    );
                    $newss = new WP_Query($get_post_query);
                    if ($newss->have_posts()) :
                        while ($newss->have_posts()) :
                            $newss->the_post();
                    ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $post); ?></span>
                                    <?php
                                    $cats = get_the_category($post);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                            <div class="c-cats">
                                                <span class="cat">
                                                    <i class="c-dotcat" style="background-color: <?php echo get_category_color($cat->cat_name); ?>"></i>
                                                    <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                                </span>
                                            </div>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                                </h3>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="c-pagination">
                        <?php echo pagination_tdc($newss, $paged, null, 'news') ?>
                    </div>
                </ul>
                <ul class="c-listpost" id="cat_4" data-cat="6">
                    <?php
                    $get_post_query = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5, 'cat' => 6,
                        'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
                    );
                    $newss = new WP_Query($get_post_query);
                    if ($newss->have_posts()) :
                        while ($newss->have_posts()) :
                            $newss->the_post();
                    ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $post); ?></span>
                                    <?php
                                    $cats = get_the_category($post);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                            <span class="cat">
                                                <i class="c-dotcat" style="background-color: <?php echo get_category_color($cat->cat_name); ?>"></i>
                                                <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                            </span>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                                </h3>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="c-pagination">
                        <?php echo pagination_tdc($newss, $paged, null, 'news') ?>
                    </div>
                </ul>
                <ul class="c-listpost" id="cat_5">
                    <?php
                    $get_post_query = array(
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5, 'cat' => 7,
                        'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
                    );
                    $newss = new WP_Query($get_post_query);
                    if ($newss->have_posts()) :
                        while ($newss->have_posts()) :
                            $newss->the_post();
                    ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $post); ?></span>
                                    <?php
                                    $cats = get_the_category($post);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                            <span class="cat">
                                                <i class="c-dotcat" style="background-color: <?php echo get_category_color($cat->cat_name); ?>"></i>
                                                <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                            </span>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                                </h3>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="c-pagination">
                        <?php echo pagination_tdc($newss, $paged, null, 'news') ?>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>