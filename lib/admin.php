<?php
// ヘッダーにある不要なタグを削除する
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');

/* フロント画面アドミンバー非表示 */
add_filter('show_admin_bar', '__return_false');

/*-----------------------------------------------------------------------------------*/
/* エディタ・スタイルシートを読み込む
/*-----------------------------------------------------------------------------------*/
add_editor_style();


/*-----------------------------------------------------------------------------------*/
/* 管理画面の不要な入力項目を削除します。
/*-----------------------------------------------------------------------------------*/
function remove_default_post_screen_metaboxes() {
    global $menu, $current_user;
    remove_menu_page( 'edit.php' );
    if($current_user->ID != 1) {
        remove_menu_page( 'index.php' );
        remove_menu_page( 'edit.php?post_type=acf-field-group' );
        remove_menu_page( 'edit.php?post_type=page' );
        remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'themes.php' );
        remove_menu_page( 'plugins.php' );
        remove_menu_page( 'users.php' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'options-general.php' );
    }

    remove_meta_box( 'postcustom','post','normal' ); // カスタムフィールド
    remove_meta_box( 'postexcerpt','post','normal' ); // 抜粋
    remove_meta_box( 'commentstatusdiv','post','normal' ); // ディスカッション
    remove_meta_box( 'commentsdiv','post','normal' ); // コメント
    remove_meta_box( 'trackbacksdiv','post','normal' ); // トラックバック
    remove_meta_box( 'authordiv','post','normal' ); // 作成者
    remove_meta_box( 'slugdiv','post','normal' ); // スラッグ
    remove_meta_box( 'revisionsdiv','post','normal' ); // リビジョン
}
add_action('admin_menu','remove_default_post_screen_metaboxes');


/*-----------------------------------------------------------------------------------*/
/* 管理画面のアドレスバー項目を削除します。
/*-----------------------------------------------------------------------------------*/
function remove_wp_nodes()
{
    global $wp_admin_bar, $current_user;
    if($current_user->ID != 1) {
        $wp_admin_bar->remove_node( 'new-page' ); //新規固定ページ
        $wp_admin_bar->remove_node( 'comments' ); // コメント
        $wp_admin_bar->remove_node( 'updates' ); //更新通知アイコン
    }
}
add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );
//add_filter("pre_site_transient_update_core", "__return_null");

/*-----------------------------------------------------------------------------------*/
/* 管理画面の不要な入力項目を削除します。
/*-----------------------------------------------------------------------------------*/
function my_unregister_taxonomies(){
    global $wp_taxonomies;

    //投稿機能から「カテゴリー」を削除
    if (!empty($wp_taxonomies['category']->object_type)) {
        foreach ($wp_taxonomies['category']->object_type as $i => $object_type) {
            if ($object_type == 'post') {
                unset($wp_taxonomies['category']->object_type[$i]);
            }
        }
    }

    //投稿機能から「タグ」を削除
    if (!empty($wp_taxonomies['post_tag']->object_type)) {
        foreach ($wp_taxonomies['post_tag']->object_type as $i => $object_type) {
            if ($object_type == 'post') {
                unset($wp_taxonomies['post_tag']->object_type[$i]);
            }
        }
    }
    return true;
}
add_action('init', 'my_unregister_taxonomies');


/*-----------------------------------------------------------------------------------*/
/* 管理画面スタイル
/*-----------------------------------------------------------------------------------*/
function custom_admin_style() {
    ?><style>
        /* カテゴリーの2段組を解除 */
        ul.acf-radio-list li input, ul.acf-checkbox-list li input {
            vertical-align: top;
        }
    </style><?php
}
add_action( 'admin_head', 'custom_admin_style' );


/*-----------------------------------------------------------------------------------*/
/* アイキャッチ画象のサイズ設定
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 196, 9999, false );  //基本的なサムネイルのサイズ
add_image_size( 'main-thumbnail', 540, 360, true );// 幅 160 ピクセル 切り抜きなしモード
add_image_size( 'list_image', 246, 246 , true);


/*-----------------------------------------------------------------------------------*/
/* デバッグ用関数
/*-----------------------------------------------------------------------------------*/
/*function vd($data) {
    echo "<pre>\n";
    var_dump($data);
    echo "\n</pre>\n";
}*/


/*-----------------------------------------------------------------------------------*/
/* 画象ファイルからsrcのパスのみ取得します。
/*-----------------------------------------------------------------------------------*/
function thumb_src($attachment_id, $size = 'thumbnail', $icon = false) {
    $image = wp_get_attachment_image_src($attachment_id, $size, $icon);
    if ( $image ) {
        list($src, $width, $height) = $image;
    }
    return $src;
}

function thumb_src_height($attachment_id, $size = 'thumbnail', $icon = false) {
    $image = wp_get_attachment_image_src($attachment_id, $size, $icon);
    if ( $image ) {
        list($src, $width, $height) = $image;
    }
    return $height;
}

function thumb_src_width($attachment_id, $size = 'thumbnail', $icon = false) {
    $image = wp_get_attachment_image_src($attachment_id, $size, $icon);
    if ( $image ) {
        list($src, $width, $height) = $image;
    }
    return $width;
}


/*-----------------------------------------------------------------------------------*/
/* サイドバーにアップデート可能なプラグインの数値を消す
/*-----------------------------------------------------------------------------------*/
function remove_counts(){
    global $menu,$submenu;
    $menu[65][0] = 'プラグイン';
    $submenu['index.php'][10][0] = 'Updates';
}
add_action('admin_menu', 'remove_counts');


/*-----------------------------------------------------------------------------------*/
/* 管理画面をSSLで保護する
/*-----------------------------------------------------------------------------------*/
if(!defined('FORCE_SSL_ADMIN')) {
    define('FORCE_SSL_ADMIN', true);
}


/*-----------------------------------------------------------------------------------*/
/* SVGファイルをアップロードできるようにする
/*-----------------------------------------------------------------------------------*/
function my_upload_mimes($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'my_upload_mimes');


/*-----------------------------------------------------------------------------------*/
/* 管理画面サイドメニューの位置変更
/*-----------------------------------------------------------------------------------*/
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order'       , 'pm_menu_order' );

function pm_menu_order( $menu_order ) {
    $menu = array();

    foreach ( $menu_order as $key => $val ) {
        if ( 0 === strpos( $val, 'edit.php' ) )
        break;

        $menu[] = $val;
        unset( $menu_order[$key] );
    }

    foreach ( $menu_order as $key => $val ) {
        if ( 0 === strpos( $val, 'edit.php' ) ) {
            $menu[] = $val;
            unset( $menu_order[$key] );
        }
    }

    return array_merge( $menu, $menu_order );
}


/*-----------------------------------------------------------------------------------*/
/* カスタム投稿
/*-----------------------------------------------------------------------------------*/
function cptui_register_my_cpts01() {
    $labels = array(
        "name" => "お知らせ",
        "singular_name" => "information",
        "menu_name" => "お知らせ",
        "all_items" => "すべてのお知らせ",
        "add_new" => "新規追加",
        "add_new_item" => "新規追加",
        "edit" => "編集",
        "edit_item" => "編集",
        "new_item" => "新規項目",
        "view" => "表示",
        "view_item" => "項目を表示",
        "search_items" => "検索",
        "not_found" => "見つかりません",
        "not_found_in_trash" => "ゴミ箱にはありません。",
        "parent" => "親",
    );
    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "query_var" => true,
        'show_in_rest' => true,
        "supports" => array('title','editor','thumbnail'),
        "menu_position" => 4,
        "menu_icon" => "dashicons-edit"
    );
    register_post_type("information", $args );
    register_taxonomy(
        "information_cat",
        "information",
        array(
            "hierarchical" => true,
            "update_count_callback" => "_update_post_term_count",
            "labels" => array( "name" => "カテゴリー"),
            "public" => true,
            "show_ui" => true,
            'show_in_rest' => true,
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'cptui_register_my_cpts01' );

function cptui_register_my_cpts02() {
    $labels = array(
        "name" => "店舗検索",
        "singular_name" => "service-station",
        "menu_name" => "店舗検索",
        "all_items" => "すべての店舗検索",
        "add_new" => "新規追加",
        "add_new_item" => "新規追加",
        "edit" => "編集",
        "edit_item" => "編集",
        "new_item" => "新規項目",
        "view" => "表示",
        "view_item" => "項目を表示",
        "search_items" => "検索",
        "not_found" => "見つかりません",
        "not_found_in_trash" => "ゴミ箱にはありません。",
        "parent" => "親",
    );
    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "query_var" => true,
        'show_in_rest' => true,
        "supports" => array('title','editor','thumbnail'),
        "menu_position" => 4,
        "menu_icon" => "dashicons-store"
    );
    register_post_type("service-station", $args );
    register_taxonomy(
        "prefectures",
        "service-station",
        array(
            "hierarchical" => true,
            "update_count_callback" => "_update_post_term_count",
            "labels" => array( "name" => "エリア"),
            "public" => true,
            "show_ui" => true,
            'show_in_rest' => true,
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'cptui_register_my_cpts02' );

function cptui_register_my_cpts03() {
    $labels = array(
        "name" => "よくある質問",
        "singular_name" => "faq",
        "menu_name" => "よくある質問",
        "all_items" => "すべてのよくある質問",
        "add_new" => "新規追加",
        "add_new_item" => "新規追加",
        "edit" => "編集",
        "edit_item" => "編集",
        "new_item" => "新規項目",
        "view" => "表示",
        "view_item" => "項目を表示",
        "search_items" => "検索",
        "not_found" => "見つかりません",
        "not_found_in_trash" => "ゴミ箱にはありません。",
        "parent" => "親",
    );
    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "query_var" => true,
        'show_in_rest' => true,
        "supports" => array('title','editor','thumbnail'),
        "menu_position" => 4,
        "menu_icon" => "dashicons-format-status"
    );
    register_post_type("faq", $args );
    register_taxonomy(
        "faq_cat",
        "faq",
        array(
            "hierarchical" => true,
            "update_count_callback" => "_update_post_term_count",
            "labels" => array( "name" => "カテゴリー"),
            "public" => true,
            "show_ui" => true,
            'show_in_rest' => true,
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'cptui_register_my_cpts03' );

function cptui_register_my_cpts04() {
    $labels = array(
        "name" => "社員インタビュー",
        "singular_name" => "recruit_interview",
        "menu_name" => "社員インタビュー",
        "all_items" => "すべてのよくある質問",
        "add_new" => "新規追加",
        "add_new_item" => "新規追加",
        "edit" => "編集",
        "edit_item" => "編集",
        "new_item" => "新規項目",
        "view" => "表示",
        "view_item" => "項目を表示",
        "search_items" => "検索",
        "not_found" => "見つかりません",
        "not_found_in_trash" => "ゴミ箱にはありません。",
        "parent" => "親",
    );
    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "query_var" => true,
        'show_in_rest' => true,
        "supports" => array('title','editor','thumbnail'),
        "menu_position" => 4,
        "menu_icon" => "dashicons-businessman",
        'rewrite' => array( 'slug' => 'recruit/interview', 'with_front' => false),
    );
    register_post_type("recruit_interview", $args );
    register_taxonomy(
        "recruit_interview_cat",
        "recruit_interview",
        array(
            "hierarchical" => true,
            "update_count_callback" => "_update_post_term_count",
            "labels" => array( "name" => "カテゴリー"),
            "public" => true,
            "show_ui" => true,
            'show_in_rest' => true,
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'cptui_register_my_cpts04' );

function cptui_register_my_cpts05() {
    $labels = array(
        "name" => "募集要項",
        "singular_name" => "recruit_requirements",
        "menu_name" => "募集要項",
        "all_items" => "すべてのよくある質問",
        "add_new" => "新規追加",
        "add_new_item" => "新規追加",
        "edit" => "編集",
        "edit_item" => "編集",
        "new_item" => "新規項目",
        "view" => "表示",
        "view_item" => "項目を表示",
        "search_items" => "検索",
        "not_found" => "見つかりません",
        "not_found_in_trash" => "ゴミ箱にはありません。",
        "parent" => "親",
    );
    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "query_var" => true,
        'show_in_rest' => true,
        "supports" => array('title','editor'),
        "menu_position" => 4,
        "menu_icon" => "dashicons-groups",
        'rewrite' => array( 'slug' => 'recruit/requirements', 'with_front' => false),
    );
    register_post_type("recruit_requirements", $args );
    register_taxonomy(
        "recruit_requirements_cat",
        "recruit_requirements",
        array(
            "hierarchical" => true,
            "update_count_callback" => "_update_post_term_count",
            "labels" => array( "name" => "カテゴリー"),
            "public" => true,
            "show_ui" => true,
            'show_in_rest' => true,
        )
    );
    flush_rewrite_rules();
}
add_action( 'init', 'cptui_register_my_cpts05' );


/*-----------------------------------------------------------------------------------*/
/* ACF Custom Option Pages
/*-----------------------------------------------------------------------------------*/
function acf_op_init_01() {
    if( function_exists('acf_add_options_page') ) {
        
        acf_add_options_page(array(
            'page_title' 	=> 'ドライブスルー洗車・ページ・エディター',
            'menu_title'	=> '洗車(ページ)',
            'menu_slug' 	=> 'acf-options-carwash',
            'capability'	=> 'edit_pages',
            'redirect'		=> false,
            'position'      => '6',
            'icon_url'      => 'dashicons-car',
            'update_button' => 'ページ更新',
            'updated_message' => '" ドライブスルー洗車 " ページを更新しました。',
        ));
		acf_add_options_sub_page(array(
            'page_title' 	=> '洗車テスト用ページ',
            'menu_title'	=> 'テストページ',
            'menu_slug' => 'acf-options-carwash-test',
            'parent_slug'	=> 'acf-options-carwash',
            'post_id' => 'acf_options_carwash_test',
        ));
    }
}
add_action('acf/init', 'acf_op_init_01');


/*-----------------------------------------------------------------------------------*/
/* 特定の投稿タイプで無効化
/*-----------------------------------------------------------------------------------*/
add_filter( 'use_block_editor_for_post_type', 'disable_block_editor', 10, 2 );
function disable_block_editor( $use_block_editor, $post_type ) {
  if ( $post_type === 'recruit_requirements' ) return false;
  return $use_block_editor;
}
/*-----------------------------------------------------------------------------------*/
/* ファビコン
/*-----------------------------------------------------------------------------------*/
add_action( 'do_faviconico', 'wp_favicon_remover');
function wp_favicon_remover() {
    exit;
}


/*-----------------------------------------------------------------------------------*/
/* パーマリンク変更
/*-----------------------------------------------------------------------------------*/
function custom_rewrite_rule() {
    $prefectures = get_terms('prefectures', array('hide_empty' => 0));
    foreach ($prefectures as $term) {
        if($term->parent == 0){
            add_rewrite_rule('^'.$term->slug.'/([^/]+)/?$', 'index.php?prefectures=$matches[1]', 'top');
        }
    }
}
add_action('init', 'custom_rewrite_rule');



/*-----------------------------------------------------------------------------------*/
/* CSVインポート
/*-----------------------------------------------------------------------------------*/
add_action('admin_menu', 'additional_menu_page');
function additional_menu_page() {
  add_submenu_page('edit.php?post_type=service-station', 'CSVインポート', 'CSVインポート', 'read', 'csv_service_station', 'csv_service_station');
}
function csv_service_station() {
    include 'csv_service_station.php';
}


?>