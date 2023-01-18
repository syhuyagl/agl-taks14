<?php
/* Template Name: Publish
 */
?>
<?php get_header(); ?>
<main class="p-publish">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php echo get_site_url(); ?>">Home</a>
            <span>出版物</span>
        </div>
    </div>
    <div class="c-headpage">
        <h2 class="c-title">出版物</h2>
        <p>ひかり税理士法人では、税務・会計・経営・相続などに関する書籍の執筆を行っています。</p>
    </div>
    <div class="l-container">
        <div class="p-publish__content">
            <ul class="c-gridpost">
                <?php
                $get_post_query = array(
                    'post_type' => 'publishs',
                    'orderby' => 'rand',
                    'posts_per_page' => 12,
                    'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
                );
                $publishs = new WP_Query($get_post_query);
                if ($publishs->have_posts()):
                    while ($publishs->have_posts()):
                        $publishs->the_post();
                        ?>
                        <?php $date = get_field('public_date', $post->ID);
                                $image = get_field('image', $post->ID);
                                $title = get_field('title', $post->ID);
                                $price = get_field('price', $post->ID);
                             ?>
                        <li class="c-gridpost__item">
                            <div class="c-gridpost__thumb">
                                <img src="<?php echo $image['url'] ?>" alt="">
                            </div>
                            <div class="c-gridpost__info">
                                <p class="datepost"><?php echo $date ?></p>
                                <h3><?php echo $title ?></h3>
                                <p class="price">¥<?php echo $price ?> (税別)</p>
                                <a href="<?php echo get_permalink($post->ID); ?>" class="c-btnview">詳しく見る</a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="c-pagination">
        <?php pagination($publishs); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>