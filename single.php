<?php get_header(); ?>
<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php echo get_site_url(); ?>">Home</a>
            <a href="<?php echo get_site_url(); ?>/news">ニュース・お知らせ</a>
            <span>
                <?php echo get_the_title($post->ID); ?>
            </span>
        </div>
    </div>

    <div class="p-news__content">
        <div class="l-container">
            <div class="feature_img">
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>" alt="">
            </div>

            <div class="c-ttlpostpage">
                <h2>
                    <?php echo get_the_title($post->ID); ?>
                </h2>
                <span> <?php echo get_the_date('Y年m月d日'); ?></span>
                <span class="c-listpost__cat">
                    <i class="c-dotcat" style="background-color: <?php $value = get_field("color", $post->ID);
                    echo $value; ?>"></i>
                    <?php $cat = get_the_category();
                    foreach ($cat as $cd) {
                        ?>
                        <a href="<?php echo get_category_link($cd->term_id); ?>">
                            <?php echo $cd->cat_name; ?>
                        </a>
                    <?php } ?>

                </span>
            </div>

            <div class="single__content">
                <?php echo get_post_field('post_content', $post->ID); ?>
                <p class="u-center">▽▽詳細はこちら▽▽</p>

                <p class="u-center u-bborder">さあ、顧問先育成型会計事務所へ！~業務改善をもたらすMAS指導の実際~</p>
            </div>

            <div class="l-btn">
                <div class="c-btn c-btn--small2">
                    <a href="<?php echo get_site_url(); ?>/news">ニュース一覧を見る</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>