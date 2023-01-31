<?php get_header(); ?>
<div class="c-mainvisual">
    <div class="js-slider">
        <?php
        $images = get_field('slides');
        if ($images) : ?>
            <?php foreach ($images as $image) : ?>
                <div>
                    <img src="<?php echo esc_url($image['img']['url']); ?>" alt="幅広い案件に対応できるひかりのワンストップサービス目的に応じて、最適な方法をご提案できます" />
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<main class="p-home">
    <section class="service">
        <div class="l-container">
            <h2 class="c-title"><span>幅広い案件に対応できるひかりのワンストップサービス</span>目的に応じて、最適な方法をご提案できます</h2>
            <div class="service__inner">
                <div class="service__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_service01.png" alt="幅広い案件に対応できるひかりのワンストップサービス目的に応じて、最適な方法をご提案できます">
                </div>
                <div class="service__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_service02.png" alt="幅広い案件に対応できるひかりのワンストップサービス目的に応じて、最適な方法をご提案できます">
                </div>
                <div class="service__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_service03.png" alt="幅広い案件に対応できるひかりのワンストップサービス目的に応じて、最適な方法をご提案できます">
                </div>
                <div class="service__item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_service04.png" alt="幅広い案件に対応できるひかりのワンストップサービス目的に応じて、最適な方法をご提案できます">
                </div>
            </div>
            <div class="l-btn l-btn--2btn">
                <div class="c-btn">
                    <a href="<?php echo get_site_url(); ?>/services">ひかり税理士法人のサービス一覧を見る</a>
                </div>
                <div class="c-btn">
                    <a href="<?php echo get_site_url(); ?>/cases">ひかり税理士法人の成功事例を見る</a>
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="ja">ニュース</span>
                <span class="en">News</span>
            </h2>
            <div class="news__inner">
                <ul class="c-tabs">
                    <?php
                    $tabs = get_field('tabs');
                    if ($tabs) : ?>
                        <?php foreach ($tabs as $tab) : ?>
                            <li data-content="<?php echo $tab['content'] ?>" data-color="<?php echo $tab['color'] ?>" class="<?php echo $tab['active'] ?>">
                                <?php echo $tab['category'] ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <div class="c-tabs__content">
                    <!-- All Posts - Display 5 Posts-->
                    <ul class="c-listpost active" id="all">
                        <?php
                        $newss = get_posts(array('post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 5));
                        foreach ($newss as $news) :
                            setup_postdata($news);
                        ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $news); ?></span>
                                    <?php
                                    $cats = get_the_category($news);
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
                                <h3 class="titlepost"><a href="<?php echo get_permalink($news->ID); ?>"><?php echo get_the_title($news->ID); ?></a>
                                </h3>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- Posts of cat1 item - Display 5 Posts-->
                    <ul class="c-listpost" id="cat_1">
                        <?php
                        $newss = get_posts(array('post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'cat' => 3, 'posts_per_page' => 5));
                        foreach ($newss as $news) :
                            setup_postdata($news);
                        ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $news); ?></span>
                                    <?php
                                    $cats = get_the_category($news);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                    <div class="c-cats">
                                            <span class="cat">
                                                <i class="c-dotcat" style="background-color: #1bb7c5"></i>
                                                <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                            </span>
                                    </div>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($news->ID); ?>"><?php echo get_the_title($news->ID); ?></a>
                                </h3>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- Posts of cat2 item - Display 5 Posts-->
                    <ul class="c-listpost" id="cat_2">
                        <?php
                        $newss = get_posts(array('post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'cat' => 4, 'posts_per_page' => 5));
                        foreach ($newss as $news) :
                            setup_postdata($news);
                        ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $news); ?></span>
                                    <?php
                                    $cats = get_the_category($news);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                    <div class="c-cats">
                                            <span class="cat">
                                                <i class="c-dotcat" style="background-color: #d6772a;"></i>
                                                <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                            </span>
                                    </div>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($news->ID); ?>"><?php echo get_the_title($news->ID); ?></a>
                                </h3>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- Posts of cat3 item - Display 5 Posts-->
                    <ul class="c-listpost" id="cat_3">
                        <?php
                        $newss = get_posts(array('post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'cat' => 5, 'posts_per_page' => 5));
                        foreach ($newss as $news) :
                            setup_postdata($news);
                        ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $news); ?></span>
                                    <?php
                                    $cats = get_the_category($news);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                    <div class="c-cats">
                                            <span class="cat">
                                                <i class="c-dotcat" style="background-color: #c4a021"></i>
                                                <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                            </span>
                                    </div>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($news->ID); ?>"><?php echo get_the_title($news->ID); ?></a>
                                </h3>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- Posts of cat4 item - Display 5 Posts-->
                    <ul class="c-listpost" id="cat_4">
                        <?php
                        $newss = get_posts(array('post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'cat' => 6, 'posts_per_page' => 5));
                        foreach ($newss as $news) :
                            setup_postdata($news);
                        ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $news); ?></span>
                                    <?php
                                    $cats = get_the_category($news);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                    <div class="c-cats">
                                            <span class="cat">
                                                <i class="c-dotcat" style="background-color: #416ad3"></i>
                                                <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                            </span>
                                    </div>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($news->ID); ?>"><?php echo get_the_title($news->ID); ?></a>
                                </h3>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- Posts of cat5 item - Display 5 Posts-->
                    <ul class="c-listpost" id="cat_5">
                        <?php
                        $newss = get_posts(array('post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'cat' => 7, 'posts_per_page' => 5));
                        foreach ($newss as $news) :
                            setup_postdata($news);
                        ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?php echo get_the_date('Y年m月d日', $news); ?></span>
                                    <?php
                                    $cats = get_the_category($news);
                                    foreach ($cats as $cat) {
                                        if ($cat->cat_name) {
                                    ?>
                                    <div class="c-cats">
                                            <span class="cat">
                                                <i class="c-dotcat" style="background-color: #ccc"></i>
                                                <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a>
                                            </span>
                                    </div>
                                    <?php }
                                    } ?>

                                </div>
                                <h3 class="titlepost"><a href="<?php echo get_permalink($news->ID); ?>"><?php echo get_the_title($news->ID); ?></a>
                                </h3>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="l-btn">
                    <div class="c-btn c-btn--small">
                        <a href="<?php echo get_site_url(); ?>/news">ニュース一覧を見る</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="publish">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="ja">出版物</span>
                <span class="en">Publish</span>
            </h2>
            <div class="publish__inner">
                <ul class="c-gridpost">
                    <?php
                    $publishs = get_posts(array('post_type' => 'publishs', 'orderby' => 'rand', 'posts_per_page' => 4));
                    foreach ($publishs as $publish) :
                        setup_postdata($publish);
                    ?>
                        <?php $date = get_field('public_date', $publish->ID);
                        $image = get_field('image', $publish->ID);
                        $title = get_field('title', $publish->ID);
                        ?>
                        <li class="c-gridpost__item">
                            <a href="<?php echo get_permalink($publish->ID); ?>">
                                <div class="c-gridpost__thumb">
                                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $title; ?>">
                                </div>
                                <p class="datepost"><?php echo $date; ?></p>
                                <h3><?php echo $title; ?></h3>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="l-btn">
                <div class="c-btn c-btn--small">
                    <a href="<?php echo get_site_url(); ?>/publish">出版物一覧を見る</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>