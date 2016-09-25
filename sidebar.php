<?php if($post->post_parent)
$children = wp_list_pages(array(
    'depth' => 1, 
    'show_date' => '',
    'date_format' => '',
    'child_of' => $post->post_parent, 
    'exclude' => '',
    'title_li' => '', 
    'echo' => 0,
    'authors' => '',
    'sort_column' => 'menu_order, post_title'));
else $children = wp_list_pages(array(
    'depth' => 1, 
    'show_date' => '',
    'date_format' => '',
    'child_of' => $post->ID, 
    'exclude' => '',
    'title_li' => '',
    'echo' => 0,
    'authors' => '',
    'sort_column' => 'menu_order, post_title'));
if ($children) { ?>
<?php } ?>


