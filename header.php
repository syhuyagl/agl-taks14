<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <?php wp_head(); ?>
</head>

<body>
    <header class="c-header">
        <div class="l-container">
            <h1 class="c-logo"><a href="<?php echo get_site_url(); ?>"><img
                        src="<?php echo get_template_directory_uri(); ?>/img/logo.png"" alt=" Allgrow Labo"></a></h1>
            <?php task14_menu('primary'); ?>
        </div>
    </header><!-- /header -->