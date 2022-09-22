<?php
/*-----------------------------------------------------------------------------------*/
/* サイトURL取得
/*-----------------------------------------------------------------------------------*/
//[home_url_dir]
function home_url_dir(){
    return home_url();
}
add_shortcode( 'home_url_dir', 'home_url_dir');


/*-----------------------------------------------------------------------------------*/
/* テーマ内ファイル取得用
/*-----------------------------------------------------------------------------------*/
//[out_file_dir]
function out_file_dir(){
    //return get_template_directory_uri();
    return '';
}
add_shortcode( 'out_file_dir', 'out_file_dir');


function out_file_dir_recruit(){
    //return get_template_directory_uri();
    return '/recruit';
}
add_shortcode( 'out_file_dir_recruit', 'out_file_dir_recruit');


function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file.php");
    return ob_get_clean();
}
add_shortcode('myphp', 'Include_my_php');

?>