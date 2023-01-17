<?php

get_header();

$title = get_field('title', $post->ID);
$description = get_field('description', $post->ID);
$feature_image = get_field('image', $post->ID);
$targets = get_field('targets', $post->ID);
$advantages = get_field('advantages', $post->ID);
$steps = get_field('steps', $post->ID);
?>

<main class="p-service">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="index.html">Home</a>
            <a href="publish.html">ご提供サービス</a>
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
        <img src=" <?php echo esc_url($feature_image['url']) ?>" alt="">
    </div>

    <div class="p-service__consultation">
        <dl class="l-container2">
            <dt>このような方はご相談ください</dt>
            <?php
            if ($targets): ?>
                <?php foreach ($targets as $target): ?>
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
                if ($advantages): ?>
                    <?php foreach ($advantages as $advantage): ?>
                        <dt class="c-checkMark">
                            <?php echo $advantage['advantage_title'] ?>
                        </dt>
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
            if ($steps): ?>
                <?php foreach ($steps as $step): ?>
                    <table>
                        <tbody>
                            <tr>
                                <th>STEP <?php echo $index ?></th>
                                <td>
                                    <h4 class="flow-title"><?php echo $step['step_title'] ?></h4>
                                    <?php
                                    if($step['step_subtitles']): 
                                    ?>
                                        <?php foreach ($step['step_subtitles'] as $stepSubtitle): ?>
                                            <?php if ($stepSubtitle['step_subtitle']): ?>
                                                <h5 class="flow-subtitle"><?php echo $stepSubtitle['step_subtitle'] ?></h5>
                                            <?php endif; ?>
                                                <?php foreach ($stepSubtitle['step_descriptions'] as $stepDes): ?>
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
                <?php $index++; endforeach; ?>
            <?php endif; ?>

            <table>
                <tbody>
                    <tr>
                        <th>STEP2</th>
                        <td>
                            <h4 class="flow-title">決算予測・決算対策</h4>
                            <p class="c-checkMark">
                                決算月の2ヶ月前頃に決算予測を行い、今期の業績を予想します。業績予想から、適切な節税方法の提案や納税準備のための資金繰り等、決算を迎えるための事前準備を行います。</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <th>STEP3</th>
                        <td>
                            <h4 class="flow-title">決算報告・決算後対策</h4>
                            <p class="c-checkMark">決算書類・申告書類作成後に、最終の業績及び財務状況、納税額を報告させていただきます。</p>
                            <p class="c-checkMark">今期の業績分析を行い、現状の課題の抽出し、今後の方針等を検討します。
                                同時に来期の業績予想を行い、役員報酬等の見直し等、適切な税務対応を実施します。</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <th>STEP4</th>
                        <td>
                            <h4 class="flow-title">年末調整等の年次業務</h4>
                            <p class="c-checkMark">
                                年末調整、給与支払報告書・法定調書・償却資産税申告書の作成と、通常の月次・決算業務の他に年１回義務付けられている法定業務についても、サポートいたします。
                                給与計算・各種社会保険の手続きについては【ひかり社会保険労務士法人】がお手伝いさせていただきます。<br>ひかり社会保険労務士法人 <a
                                    href="#">http://labor.hikari-advisor.com/</a></p>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <div class="p-service__division">
        <div class="l-container">
            <h3 class="p-service__subtitle">関連サービス</h3>
            <ul class="division-list c-flex">
                <li class="small-12 medium-4">
                    <a href="http://www.hikari-tax.com/services/s07">
                        <p class="img"><img src="assets/img/1.jpg"></p>
                        <p class="text"><span class="arrow">経理改善</span></p>
                    </a>
                </li>
                <li class="small-12 medium-4">
                    <a href="http://www.hikari-tax.com/services/s20">
                        <p class="img"><img src="assets/img/1.jpg" alt="1.jpg"></p>
                        <p class="text"><span class="arrow">会計顧問</span></p>
                    </a>
                </li>
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