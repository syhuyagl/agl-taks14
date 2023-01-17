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

function publish_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Publishs', 'Post Type General Name', 'task14'),
        'singular_name' => _x('Publish', 'Post Type Singular Name', 'task14'),
        'menu_name' => __('Publishs', 'task14'),
        'parent_item_colon' => __('Parent Publish', 'task14'),
        'all_items' => __('All Publishs', 'task14'),
        'view_item' => __('View Publish', 'task14'),
        'add_new_item' => __('Add New Publish', 'task14'),
        'add_new' => __('Add New', 'task14'),
        'edit_item' => __('Edit Publish', 'task14'),
        'update_item' => __('Update Publish', 'task14'),
        'search_items' => __('Search Publish', 'task14'),
        'not_found' => __('Not Found', 'task14'),
        'not_found_in_trash' => __('Not found in Trash', 'task14'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('publishs', 'task14'),
        'description' => __('Publish news and reviews', 'task14'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',
        ),
        'taxonomies' => array('genres'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('Publishs', $args);

}

add_action('init', 'publish_post_type', 0);

function get_category_color ($category){
    if($category == "お知らせ"){
        echo "#1bb7c5";
    }
    if($category == "税の最新情報"){
        echo "#d6772a";
    }
    if($category == "税制改正"){
        echo "#c4a021";
    }
    if($category == "掲載情報"){
        echo "#416ad3";
    }
    if($category == "バックナンバー"){
        echo "#ccc";
    }
}
function pagination($custom_query = null)
{
    global $wp_query;
    if ($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $big = 999999999;
    $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
    if ($total > 1) echo '<div class="c-pagination">';
    echo paginate_links(array(
        'base'        => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'   => '?paged=%#%',
        'current'  => max(1, get_query_var('paged')),
        'total'    => $total,
        'mid_size' => '5',
        'prev_text'    => __('', 'task14'),
        'next_text'    => __('', 'task14'),
    ));
    if ($total > 1) echo '</div>';
}
?>