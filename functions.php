<?php if (!function_exists('task14_theme_setup')) {
    function task14_theme_setup()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('image', 'video', 'gallary', 'quote', 'link'));
        add_theme_support('title-tag');
        $default_color = array('default-color' => '#cccccc');
        add_theme_support('custom-background', $default_color);
        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'task14'),
                'secondary' => __('Secondary Menu', 'task14'),
                'footer' => __('Footer Menu', 'task14')
            )
        );
        register_nav_menu('primary-menu', __('Primary Menu', 'task14'));

    }
    add_action('init', 'task14_theme_setup');
}
if (!function_exists('task14_menu')) {
    function task14_menu($slug)
    {
        $menu = array(
            'theme_location' => $slug,
            'menu_class' => $slug,
            'container' => 'nav',
            'container_class' => 'c-gnav',
        );
        wp_nav_menu($menu);
    }
}
if (!function_exists('task14_footermenu')) {
    function task14_footermenu($slug)
    {
        $menu = array(
            'theme_location' => $slug,
            'container' => 'ul',
            'menu_class' => $slug,
            'container_class' => $slug
        );
        wp_nav_menu($menu);
    }
}

function add_css()
{
    wp_register_style('style', get_template_directory_uri() . '/style.css', false, '1.1', 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'add_css');

?>