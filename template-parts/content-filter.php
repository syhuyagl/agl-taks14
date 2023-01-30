<?php
?>
<li class="c-column__item"><a href="<?php the_permalink(); ?>">
        <img src="<?php $icon = get_field('icon', $post->ID);
        echo esc_url($icon['url']); ?>" alt="<?php the_title(); ?>">
        <p>
            <?php the_title(); ?>
        </p>
    </a>
</li>