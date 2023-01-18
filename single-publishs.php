<?php

get_header();

$title = get_field('title', $post->ID);
$description = get_field('description', $post->ID);
$image = get_field('image', $post->ID);
$date = get_field('public_date', $post->ID);
$author = get_field('author', $post->ID);
$publisher = get_field('publisher', $post->ID);
$price = get_field('price', $post->ID);
$contents = get_field('contents', $post->ID);
?>

<main class="p-publish">
    <div class="c-breadcrumb">
        <div class="l-container">
            <a href="<?php echo get_site_url(); ?>">Home</a>
            <a href="<?php echo get_site_url(); ?>/publish">出版物</a>
            <span>社長に“もしものこと”があったときの手続きすべて</span>
        </div>
    </div>

    <div class="l-container">
        <div class="p-publish__single">
            <div class="feature_img">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $title ?>">
            </div>
            <div class="p-publish__info">
                <h2><?php echo $title ?></h2>
                <p class="datepost"><?php echo $date ?> 発行</p>
                <p class="author">
                    著者  : <?php echo $author ?><br>
                    出版社 : <?php echo $publisher ?>
                </p>
                <p class="price">¥<?php echo $price ?> (税別)</p>

                <div class="desc">
                    <p><?php echo $description ?></p>

                    <h4>目次</h4>
                    <p><?php echo $contents ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="l-btn">
            <div class="c-btn c-btn--small2">
                <a href="<?php echo get_site_url(); ?>/publish">出版物一覧へ</a>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>