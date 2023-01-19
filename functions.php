<?php if (!function_exists('task14_theme_setup')) {
    function task14_theme_setup()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('image', 'video', 'gallary', 'quote', 'link'));
        add_theme_support('title-tag');
        add_theme_support('automatic-feed-links');
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
function admin_bar()
{

    add_filter('show_admin_bar', '__return_true', 1000);
}
add_action('init', 'admin_bar');
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

add_filter('services_post_type_args', '_my_rewrite_slug'); // Here replace "your-post-type" with the actual post type, e.g., "cherry_services", "cherry-projects"
function _my_rewrite_slug($args)
{
    $args['rewrite']['slug'] = 'services'; // Replace "our-services" with your preferable slug
    return $args;
}

if (!function_exists('mytheme_scripts')) {
    function mytheme_scripts()
    {
        wp_deregister_script('jquery'); // deregisters the default WordPress jQuery  
        wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"), false);
        wp_enqueue_script('jquery');
        wp_enqueue_script('themes', get_template_directory_uri() . '/js/themes.js', array('jquery'));
        wp_localize_script(
            'themes',
            'ajax_object',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            )
        );
    }
}

if (!function_exists('mytheme_theme_setup')) {
    function mytheme_theme_setup()
    {
        add_action('wp_enqueue_scripts', 'mytheme_scripts');
    }
}
add_action('after_setup_theme', 'mytheme_theme_setup');
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
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'revisions',
            'custom-fields',
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
    register_post_type('publishs', $args);

}

add_action('init', 'publish_post_type', 0);
function service_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Services', 'Post Type General Name', 'task14'),
        'singular_name' => _x('Service', 'Post Type Singular Name', 'task14'),
        'menu_name' => __('Services', 'task14'),
        'parent_item_colon' => __('Parent Service', 'task14'),
        'all_items' => __('All Services', 'task14'),
        'view_item' => __('View Service', 'task14'),
        'add_new_item' => __('Add New Service', 'task14'),
        'add_new' => __('Add New', 'task14'),
        'edit_item' => __('Edit Service', 'task14'),
        'update_item' => __('Update Service', 'task14'),
        'search_items' => __('Search Service', 'task14'),
        'not_found' => __('Not Found', 'task14'),
        'not_found_in_trash' => __('Not found in Trash', 'task14'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label' => __('services', 'task14'),
        'description' => __('Service news and reviews', 'task14'),
        'labels' => $labels,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'revisions',
            'custom-fields',
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
    register_post_type('services', $args);

}

add_action('init', 'service_post_type', 0);
function get_category_color($category)
{
    if ($category == "お知らせ") {
        echo "#1bb7c5";
    }
    if ($category == "税の最新情報") {
        echo "#d6772a";
    }
    if ($category == "税制改正") {
        echo "#c4a021";
    }
    if ($category == "掲載情報") {
        echo "#416ad3";
    }
    if ($category == "バックナンバー") {
        echo "#ccc";
    }
}





function pagination($custom_query = null)
{
    global $wp_query;
    if ($custom_query)
        $main_query = $custom_query;
    else
        $main_query = $wp_query;
    $big = 999999999;
    $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
    if ($total > 1)
        echo '<div class="c-pagination">';
    echo paginate_links(
        array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $total,
            'mid_size' => '5',
            'prev_text' => __('', 'task14'),
            'next_text' => __('', 'task14'),
        )
    );
    if ($total > 1)
        echo '</div>';
}
function service_taxonomy()
{
    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
     */
    $labels = array(
        'name' => 'Service Taxonomy',
        'singular' => 'Service Taxonomy',
        'menu_name' => 'Service Taxonomy',
    );
    /* Biến $args khai báo các tham số trong custom taxonomy cần tạo
     */
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );


    /* Hàm register_taxonomy để khởi tạo taxonomy
     */
    register_taxonomy('service-taxonomy', 'services', $args);


}
// Hook into the 'init' action
add_action('init', 'service_taxonomy', 0);

function service_content_taxonomy()
{
    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
     */
    $labels = array(
        'name' => 'Service Content Taxonomy',
        'singular' => 'Service Content Taxonomy',
        'menu_name' => 'Service Content Taxonomy',
    );
    /* Biến $args khai báo các tham số trong custom taxonomy cần tạo
     */
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );


    /* Hàm register_taxonomy để khởi tạo taxonomy
     */
    register_taxonomy('service-content-taxonomy', 'services', $args);


}
// Hook into the 'init' action
add_action('init', 'service_content_taxonomy', 0);

function x_filter_by_category($query)
{
    if ($query->is_home() && $query->is_main_query() && isset($_GET['checkbox'])) {
        $query->set('cat', implode(',', $_GET['checkbox']));
    }
}
add_action('pre_get_posts', 'x_filter_by_category');

add_action('wp_ajax_call_post', 'call_post_init');
add_action('wp_ajax_nopriv_call_post', 'call_post_init');
function call_post_init()
{
    // Getting the ajax data:
    // An array of keys("name")/values of each "checked" checkbox
    $meta_query = array('relation' => 'OR');
    $choices = $_POST['choices'];
    foreach ($choices as $Key => $Value) {
        if (count($Value)) {
            foreach ($Value as $Inkey => $Invalue) {
                $meta_query[] = array('taxonomy' => $Key, 'field' => 'term_id', 'terms' => (int) $Invalue, 'include_children' => true);
            }

        }
    }

    $args = array(
        'post_type' => 'services',
        'tax_query' => $meta_query
    );

    $query = new WP_Query($args);
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
            get_template_part('template-parts/content', 'filter', $args);
        endwhile;
        wp_reset_query();
    else:
        wp_send_json($query->posts);
    endif;
    die();
}



?>