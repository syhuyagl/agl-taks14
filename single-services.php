<?php

get_header();

$title = get_field('title', $post->ID);
$description = get_field('description', $post->ID);
$feature_image = get_field('image', $post->ID);
$targets = get_field('targets', $post->ID);
$advantages = get_field('advantages', $post->ID);
$steps = get_field('steps', $post->ID);
$relatedServices = get_field('related_services', $post->ID)
?>

<main class="p-service">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php echo get_site_url(); ?>">Home</a>
            <a href="<?php echo get_site_url(); ?>/publish">ご提供サービス</a>
            <span>法人税務顧問</span>
        </div>
    </div>
    <div class="c-headpage">
        <div class="l-container2">
            <h2 class="c-title">
                <?php echo $title ?>
            </h2>
        </div>
        <p>
            <?php echo $description ?>
        </p>
    </div>

    <div class="feature_img">
        <?php if ($feature_image) : ?>
            <img src="<?php echo esc_url($feature_image['url']) ?>" alt="<?php echo $title ?>">
        <?php endif; ?>
    </div>

    <div class="p-service__consultation">
        <dl class="l-container2">
            <dt>このような方はご相談ください</dt>
            <?php
            if ($targets) : ?>
                <?php foreach ($targets as $target) : ?>
                    <dd class="c-checkMark">
                        <?php echo $target['target'] ?>
                    </dd>
                <?php endforeach; ?>
            <?php endif; ?>
        </dl>
    </div>

    <div class="p-service__merit">
        <div class="l-container2">
            <h3 class="p-service__title">ひかり税理士法人を選ぶメリット</h3>
            <dl>
                <?php
                if ($advantages) : ?>
                    <?php foreach ($advantages as $advantage) : ?>
                        <?php if ($advantage['advantage_title']) : ?>
                            <dt class="c-checkMark">
                                <?php echo $advantage['advantage_title'] ?>
                            </dt>
                        <?php endif; ?>
                        <dd><?php echo $advantage['advantage_description'] ?></dd>
                    <?php endforeach; ?>
                <?php endif; ?>
            </dl>
        </div>
    </div>

    <div class="p-service__flow">
        <div class="l-container2">

            <h3 class="p-service__title">サービスの流れ</h3>
            <?php
            $index = 1;
            if ($steps) : ?>
                <?php foreach ($steps as $step) : ?>
                    <table>
                        <tbody>
                            <tr>
                                <th>STEP <?php echo $index ?></th>
                                <td>
                                    <h4 class="flow-title"><?php echo $step['step_title'] ?></h4>
                                    <?php
                                    if ($step['step_subtitles']) :
                                    ?>
                                        <?php foreach ($step['step_subtitles'] as $stepSubtitle) : ?>
                                            <?php if ($stepSubtitle['step_subtitle']) : ?>
                                                <h5 class="flow-subtitle"><?php echo $stepSubtitle['step_subtitle'] ?></h5>
                                            <?php endif; ?>
                                            <?php foreach ($stepSubtitle['step_descriptions'] as $stepDes) : ?>
                                                <p class="c-checkMark">
                                                    <?php echo $stepDes['step_description'] ?>
                                                </p>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php $index++;
                endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="p-service__division">
        <div class="l-container">
            <h3 class="p-service__subtitle">関連サービス</h3>
            <ul class="division-list c-flex">
                <?php
                if ($relatedServices) :
                ?>
                    <?php foreach ($relatedServices as $relatedService) : ?>
                        <?php $related_icon = get_field('icon', $relatedService['related_service']->ID) ?>
                        <li class="small-12 medium-4">
                            <a href="<?php echo get_permalink($relatedService['related_service']->ID); ?>">
                                <p class="img"><img src="<?php echo esc_url($related_icon['url']) ?>" alt="<?php echo $relatedService['related_service']->title ?>"></p>
                                <p class="text"><span class="arrow"><?php echo $relatedService['related_service']->title ?></span></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>


            </ul>
        </div>

        <div class="l-btn">
            <div class="c-btn c-btn--small">
                <a href="news.html">ご提供サービス一覧へ</a>
            </div>
        </div>
    </div>


</main>

<?php
get_footer();
?>