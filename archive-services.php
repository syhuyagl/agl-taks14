<?php get_header();
$terms = get_terms([
    'taxonomy' => "service-taxonomy",
    'hide_empty' => false,
]);
$termsContent = get_terms([
    'taxonomy' => "service-content-taxonomy",
    'hide_empty' => false,
])
    ?>
<main class="p-service">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="index.html">Home</a>
            <span>ご提供サービス</span>
        </div>
    </div>
    <div class="c-headpage">
        <div class="l-container2">
            <h2 class="c-title">ご提供サービス</h2>
        </div>
    </div>

    <div class="feature_img">
        <img src="<?php echo get_template_directory_uri(); ?>/img/img_services01.png" alt="">
    </div>
    <div class="p-service__content">
        <div class="l-container">
            <p class="notice">ひかり税理士法人がご提供するすべてのサービスを目的別に検索していただけます</p>
            <!-- =======checkArea====== -->
            <div class=" p-service__checkArea">
                <form id="serviceSearch" method="POST" action="#" data-url="<?php echo admin_url('admin-ajax.php') ?>">

                    <div class="checkArea__form">
                        <legend class="servicesList-heading">サービスの対象で選ぶ</legend>
                        <div class="checkArea__inner">
                            <?php
                            if ($terms): ?>
                                <?php foreach ($terms as $term): ?>
                                    <div class="c-w240">
                                        <label>
                                            <input class="chkbutton" type="checkbox" name="service-taxonomy"
                                                value="<?php echo $term->term_id ?>">
                                            <?php echo $term->name ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="checkArea__form form2">
                        <legend class="servicesList-heading">サービスの内容で選ぶ</legend>
                        <div class="checkArea__inner">
                            <?php
                            if ($termsContent): ?>
                                <?php foreach (array_reverse($termsContent) as $term): ?>
                                    <div class="c-w156">
                                        <label>
                                            <input class="chkbutton" type="checkbox" name="service-content-taxonomy"
                                                value="<?php echo $term->term_id ?>">
                                            <?php echo $term->name ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>

            <?php
            $services = get_posts(array('post_type' => 'services', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 10));
            ?>
            <p class="p-service__result">23件が該当しました</p>
            <ul class="c-column">
                <?php foreach ($services as $service):
                    setup_postdata($service);
                    ?>
                    <li class="c-column__item"><a href="<?php echo get_permalink($service->ID); ?>">
                            <img src="<?php $icon = get_field('icon', $service->ID);
                            echo esc_url($icon['url']); ?>" alt="<?php echo get_the_title($service->ID); ?>">
                            <p>
                                <?php echo get_the_title($service->ID); ?>
                            </p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="endcontent">
                <img src="<?php echo get_template_directory_uri(); ?>/img/img_more05.png" alt="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/img_more06.png" alt="">
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>