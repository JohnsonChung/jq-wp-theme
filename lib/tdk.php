<?php

/*-----------------------------------------------------------------------------------*/
/* TDK
/*-----------------------------------------------------------------------------------*/
//title取得
function getting_title($post_id) {
    global $wp_query,$post;
    $return = "";
    if(($_SERVER['REQUEST_URI'] == '/contact.php?p=consumer&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=company&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=company&submit_success=1&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=consumer&submit_success=1&agree=y')) {
        if(($_SERVER['REQUEST_URI'] == '/contact.php?p=consumer&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=consumer&submit_success=1&agree=y')){
            $return = "お問い合わせ （個人のお客様）| ENEOSジェイクエスト";
        } else {
            $return = "お問い合わせ （法人のお客様）| ENEOSジェイクエスト";
        }

    }elseif(is_404()){ 
        $return = "Page not found";
        
    }elseif(is_search()){ 
        $tmp_search_value = isset($_GET['s']) ? $_GET['s'] : "";
        $return = "検索結果 | ENEOSジェイクエスト";
    }elseif(is_tax()){ 
        $term_object = get_queried_object();
        $current_term_name = single_term_title("", false);
        $title_txt = get_field('sc_seo_title', $term_object->taxonomy.'_'.$term_object->term_id);
        if(empty($title_txt)){
            $title_txt = $current_term_name.' | ENEOSジェイクエスト';
        }
        $return = $title_txt;
    } elseif(is_post_type_archive('recruit_interview')) {
        $return = "社員インタビュー | 採用情報 | ENEOSジェイクエスト";
    } elseif(is_singular('recruit_interview')) {
        $title_txt = get_post_meta($post_id , 'sc_seo_title' , TRUE);
        if(empty($title_txt)){
            $title_txt = get_the_title($post_id).' | 社員インタビュー | 採用情報 | ENEOSジェイクエスト';
        }
        $return = $title_txt;
    }else{
        $title_txt = get_post_meta($post_id , 'sc_seo_title' , TRUE);
        if(empty($title_txt)){
            $title_txt = get_the_title($post_id).' | ENEOSジェイクエスト';
        }
        $return = $title_txt;
        
    }
    return $return;
}

//description取得
function getting_description($post_id) {
    global $wp_query;
    $return = "";
    
    if(($_SERVER['REQUEST_URI'] == '/contact.php?p=consumer&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=company&agree=y')) {
        $return = "お問い合わせをご案内いたします。";
    }elseif(is_404()){ 
        $return = "お探しのページは見つかりません。一時的にアクセスできない状態か、移動もしくは削除された可能性があります。";
        
    }elseif(is_search()){ 
        $return = "サイト内検索の検索結果をご案内いたします。";
    
    }elseif(is_tax()){ 
        $term_object = get_queried_object();
        $title_txt = get_field('sc_seo_description', $term_object->taxonomy.'_'.$term_object->term_id);
        $return = $title_txt;
        
    }else{
        $title_txt = get_post_meta($post_id , 'sc_seo_description' , TRUE);
        $return = $title_txt;
        
    }
    return $return;
}

//keywords取得
function getting_keywords($post_id) {
    global $wp_query;
    $return = "";
    
    if(is_404()){ 
        $return = "";
        
    }elseif(is_search()){ 
        $return = "";
        
    }else{
        $title_txt = get_post_meta($post_id , 'sc_seo_keywords' , TRUE);
        $return = $title_txt;
        
    }
    return $return;
}
?>