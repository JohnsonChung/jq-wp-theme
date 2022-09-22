<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <?php
        if(is_front_page()){
            $id = get_option( 'page_on_front' );
        } else if(is_archive()){
            $post_type = esc_html(get_query_var('post_type'));
            $page_id = get_page_by_path($post_type);
            $id =  $page_id->ID;
        } else {
            $id = $post->ID;
        }
        $tdk_title = "";
        $tdk_description = "";
        $tdk_keywords = "";
        $tdk_title = getting_title($id);
        $tdk_description = getting_description($id);
        $tdk_keywords = getting_keywords($id);
    ?>
    <title><?php echo $tdk_title; ?></title>
    <meta name="description" content="<?php echo $tdk_description; ?>">
    <link rel="shortcut icon" href="/assets/img/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="/assets/img/apple-touch-icon.png" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="ENEOSジェイクエスト">
    <meta property="og:title" content="<?php echo $tdk_title; ?>" />
    <meta property="og:description" content="<?php echo $tdk_description; ?>" />
    <meta property="og:image" content="<?php echo out_file_dir_recruit(); ?>/assets/img/og-image.jpg" />
    <meta property="og:image:secure_url" content="<?php echo out_file_dir_recruit(); ?>/assets/img/og-image.jpg" />
    <meta property="og:url" content="<?php echo esc_url( home_url() ); ?>/recruit/" />
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="ENEOSジェイクエスト" />

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo out_file_dir_recruit(); ?>/assets/css/common.css" media="screen,print">
    <?php wp_head(); ?>
</head>
<body>
    <header <?php if(!is_page('recruit')) { ?>class="fixed"<?php } ?>>
        <?php if(is_page('recruit')) { ?>
        <h1 class="logo">
            <a href="<?php echo esc_url( home_url() ); ?>/recruit/">
                <svg xmlns="http://www.w3.org/2000/svg" width="212.987" height="19.144" viewBox="0 0 212.987 19.144">
                    <g id="group_5543" data-name="group5543" transform="translate(19381.754 -159.88)">
                    <path id="path_10929" data-name="path10929" d="M122.081-77.661c0,2.506.008,5.029.047,8.19a.236.236,0,0,1,0,.027.134.134,0,0,0,.052.006h5.081v-7.632l.376.253c.06.047,6.816,5.061,11.3,7.8a.307.307,0,0,1,.009-.059q.056-4.786.049-8.768c0-3.555-.03-6.611-.049-9.139a.529.529,0,0,1-.009-.084h-5.161v7.678l-.367-.251c-.077-.045-7.107-5.23-11.286-7.846-.026,3.935-.047,6.87-.047,9.819" transform="translate(-19486.682 247.789)" />
                    <path id="path_10930" data-name="path10930" d="M179.4-78.33a9.323,9.323,0,0,0,9.606,9.457,9.412,9.412,0,0,0,9.6-9.426,9.338,9.338,0,0,0-9.6-9.465A9.312,9.312,0,0,0,179.4-78.33m5.252-.037a4.091,4.091,0,0,1,4.354-4.293,4.051,4.051,0,0,1,4.355,4.293,4.224,4.224,0,0,1-4.355,4.471,4.137,4.137,0,0,1-4.354-4.471" transform="translate(-19508.281 247.896)" />
                    <path id="path_10931" data-name="path10931" d="M212.4-81.193c0,3.1,2.968,4.731,5.075,4.894l.941.141c1.8.213,2.709.886,2.709,1.994s-.862,1.792-2.309,1.792a3.183,3.183,0,0,1-2.888-1.889c-.388.144-1.662.621-3.843,1.437a.4.4,0,0,1,.016.044c1.052,2.519,3.514,3.908,6.939,3.908,4.637,0,7.75-2.674,7.75-6.652,0-1.506-1.047-4.248-4.958-4.969l-1.228-.2c-1.584-.242-3.057-.641-3.057-1.968,0-.392.156-1.683,2.169-1.683a2.742,2.742,0,0,1,2.779,1.652c.568-.21,3.26-1.207,3.678-1.355a.446.446,0,0,1-.009-.046c-.5-2.3-2.834-3.672-6.231-3.672-4.784,0-7.534,2.4-7.534,6.571" transform="translate(-19520.596 247.896)" />
                    <path id="path_10932" data-name="path10932" d="M108.526-72.928h-8.477v-3.085h8.467v-4.076h-8.467V-83.28h8.477v-3.564H94.556V-69.18h13.97Z" transform="translate(-19476.311 247.549)" />
                    <path id="path_10933" data-name="path10933" d="M167.79-72.928h-8.477v-3.085h8.467v-4.076h-8.467V-83.28h8.477v-3.564H153.82V-69.18h13.97Z" transform="translate(-19498.643 247.549)" />
                    <path id="path_10934" data-name="path10934" d="M248.515-77.09a25.207,25.207,0,0,0-5.705-2.392l1.1-2.568a21.05,21.05,0,0,1,5.823,2.2Zm-4.549,3.471c6.294-.569,10.1-2.177,12.47-9.862l2.706,1.96c-2.8,7.627-6.98,10.314-14.49,11.275Zm6.294-8.2a28.941,28.941,0,0,0-5.9-2.235l1.118-2.529a25.35,25.35,0,0,1,6.039,2.02Zm5.451-6.313a16.436,16.436,0,0,1,1.843,3.765l-1.608.784a16.32,16.32,0,0,0-1.745-3.843Zm3.118-.039a17.225,17.225,0,0,1,1.745,3.824l-1.628.745a15.524,15.524,0,0,0-1.647-3.882Z" transform="translate(-19532.176 248.048)" />
                    <path id="path_10935" data-name="path10935" d="M281.21-70.351h5.432v2.745H272.974v-2.745h5.353v-6.313H273.6V-79.39h12.333v2.726H281.21Z" transform="translate(-19543.541 244.74)" />
                    <path id="path_10936" data-name="path10936" d="M308.558-69.615h-3.334v-7.824a32.612,32.612,0,0,1-6.274,2.824l-1.569-2.765A29.2,29.2,0,0,0,311.342-86.6l2.764,1.941a34.928,34.928,0,0,1-5.549,5.039Z" transform="translate(-19552.738 247.455)" />
                    <path id="path_10937" data-name="path10937" d="M325.44-71.605c3.726-.608,10.177-2.628,11.451-10.471h-5.627a15.359,15.359,0,0,1-4.863,4.9l-2-2.293a12.014,12.014,0,0,0,4.823-5.49H340.5c-.765,11.862-8.176,15.157-13.784,16.235Z" transform="translate(-19562.92 246.838)" />
                    <path id="path_10938" data-name="path10938" d="M362.932-72.912H369.5v3.059H353.226v-3.059h6.451v-8h-5.509v-3.039h14.391v3.039h-5.627Z" transform="translate(-19573.781 246.459)" />
                    <path id="path_10939" data-name="path10939" d="M396.957-84.8a19.793,19.793,0,0,1-3.372,8.2,51.688,51.688,0,0,1,6.2,5.294l-2.627,2.569a60.336,60.336,0,0,0-5.49-5.529,23.345,23.345,0,0,1-7.451,5.411l-1.765-2.607a19.916,19.916,0,0,0,6.745-4.588,16.2,16.2,0,0,0,3.627-5.784H383.6V-84.8Z" transform="translate(-19584.793 246.779)" />
                    <path id="path_10940" data-name="path10940" d="M427.123-74.391a35.884,35.884,0,0,0-7.431-3.96v8.921h-3.373V-86.155h3.373v4.53a43.8,43.8,0,0,1,9.1,3.98Z" transform="translate(-19597.557 247.289)" />
                    </g>
                </svg>
      
                <span>RECRUITING SITE</span>
            </a>
        </h1>
        <?php } else { ?>
        <div class="logo">
            <a href="<?php echo esc_url( home_url() ); ?>/recruit/">
                <svg xmlns="http://www.w3.org/2000/svg" width="212.987" height="19.144" viewBox="0 0 212.987 19.144">
                    <g id="group_5543" data-name="group5543" transform="translate(19381.754 -159.88)">
                    <path id="path_10929" data-name="path10929" d="M122.081-77.661c0,2.506.008,5.029.047,8.19a.236.236,0,0,1,0,.027.134.134,0,0,0,.052.006h5.081v-7.632l.376.253c.06.047,6.816,5.061,11.3,7.8a.307.307,0,0,1,.009-.059q.056-4.786.049-8.768c0-3.555-.03-6.611-.049-9.139a.529.529,0,0,1-.009-.084h-5.161v7.678l-.367-.251c-.077-.045-7.107-5.23-11.286-7.846-.026,3.935-.047,6.87-.047,9.819" transform="translate(-19486.682 247.789)" />
                    <path id="path_10930" data-name="path10930" d="M179.4-78.33a9.323,9.323,0,0,0,9.606,9.457,9.412,9.412,0,0,0,9.6-9.426,9.338,9.338,0,0,0-9.6-9.465A9.312,9.312,0,0,0,179.4-78.33m5.252-.037a4.091,4.091,0,0,1,4.354-4.293,4.051,4.051,0,0,1,4.355,4.293,4.224,4.224,0,0,1-4.355,4.471,4.137,4.137,0,0,1-4.354-4.471" transform="translate(-19508.281 247.896)" />
                    <path id="path_10931" data-name="path10931" d="M212.4-81.193c0,3.1,2.968,4.731,5.075,4.894l.941.141c1.8.213,2.709.886,2.709,1.994s-.862,1.792-2.309,1.792a3.183,3.183,0,0,1-2.888-1.889c-.388.144-1.662.621-3.843,1.437a.4.4,0,0,1,.016.044c1.052,2.519,3.514,3.908,6.939,3.908,4.637,0,7.75-2.674,7.75-6.652,0-1.506-1.047-4.248-4.958-4.969l-1.228-.2c-1.584-.242-3.057-.641-3.057-1.968,0-.392.156-1.683,2.169-1.683a2.742,2.742,0,0,1,2.779,1.652c.568-.21,3.26-1.207,3.678-1.355a.446.446,0,0,1-.009-.046c-.5-2.3-2.834-3.672-6.231-3.672-4.784,0-7.534,2.4-7.534,6.571" transform="translate(-19520.596 247.896)" />
                    <path id="path_10932" data-name="path10932" d="M108.526-72.928h-8.477v-3.085h8.467v-4.076h-8.467V-83.28h8.477v-3.564H94.556V-69.18h13.97Z" transform="translate(-19476.311 247.549)" />
                    <path id="path_10933" data-name="path10933" d="M167.79-72.928h-8.477v-3.085h8.467v-4.076h-8.467V-83.28h8.477v-3.564H153.82V-69.18h13.97Z" transform="translate(-19498.643 247.549)" />
                    <path id="path_10934" data-name="path10934" d="M248.515-77.09a25.207,25.207,0,0,0-5.705-2.392l1.1-2.568a21.05,21.05,0,0,1,5.823,2.2Zm-4.549,3.471c6.294-.569,10.1-2.177,12.47-9.862l2.706,1.96c-2.8,7.627-6.98,10.314-14.49,11.275Zm6.294-8.2a28.941,28.941,0,0,0-5.9-2.235l1.118-2.529a25.35,25.35,0,0,1,6.039,2.02Zm5.451-6.313a16.436,16.436,0,0,1,1.843,3.765l-1.608.784a16.32,16.32,0,0,0-1.745-3.843Zm3.118-.039a17.225,17.225,0,0,1,1.745,3.824l-1.628.745a15.524,15.524,0,0,0-1.647-3.882Z" transform="translate(-19532.176 248.048)" />
                    <path id="path_10935" data-name="path10935" d="M281.21-70.351h5.432v2.745H272.974v-2.745h5.353v-6.313H273.6V-79.39h12.333v2.726H281.21Z" transform="translate(-19543.541 244.74)" />
                    <path id="path_10936" data-name="path10936" d="M308.558-69.615h-3.334v-7.824a32.612,32.612,0,0,1-6.274,2.824l-1.569-2.765A29.2,29.2,0,0,0,311.342-86.6l2.764,1.941a34.928,34.928,0,0,1-5.549,5.039Z" transform="translate(-19552.738 247.455)" />
                    <path id="path_10937" data-name="path10937" d="M325.44-71.605c3.726-.608,10.177-2.628,11.451-10.471h-5.627a15.359,15.359,0,0,1-4.863,4.9l-2-2.293a12.014,12.014,0,0,0,4.823-5.49H340.5c-.765,11.862-8.176,15.157-13.784,16.235Z" transform="translate(-19562.92 246.838)" />
                    <path id="path_10938" data-name="path10938" d="M362.932-72.912H369.5v3.059H353.226v-3.059h6.451v-8h-5.509v-3.039h14.391v3.039h-5.627Z" transform="translate(-19573.781 246.459)" />
                    <path id="path_10939" data-name="path10939" d="M396.957-84.8a19.793,19.793,0,0,1-3.372,8.2,51.688,51.688,0,0,1,6.2,5.294l-2.627,2.569a60.336,60.336,0,0,0-5.49-5.529,23.345,23.345,0,0,1-7.451,5.411l-1.765-2.607a19.916,19.916,0,0,0,6.745-4.588,16.2,16.2,0,0,0,3.627-5.784H383.6V-84.8Z" transform="translate(-19584.793 246.779)" />
                    <path id="path_10940" data-name="path10940" d="M427.123-74.391a35.884,35.884,0,0,0-7.431-3.96v8.921h-3.373V-86.155h3.373v4.53a43.8,43.8,0,0,1,9.1,3.98Z" transform="translate(-19597.557 247.289)" />
                    </g>
                </svg>
      
                <span>RECRUITING SITE</span>
            </a>
        </div>
        <?php } ?>
        <div class="spBtn">
            <span class="spBtn__line"></span>
            <span class="spBtn__txt">Menu</span>
        </div>
        <nav>
            <ul class="megamenu">
                <li class="megamenu__child--hasCat">
                    <span class="megamenu__menuTtl">会社を知る</span>
                    <div class="megamenu__cat">
                        <div class="megamenu__catInner">
                            <div class="megamenu__catTop"><p>会社を知る</p><span>About</span></div>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/message/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu02.jpg);" alt="代表メッセージ"></div>
                                <p>代表メッセージ</p>
                            </a>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/mission/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu03.jpg" alt="ミッション"></div>
                                <p>ミッション</p>
                            </a>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/business/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu01.jpg" alt="事業紹介"></div>
                                <p>事業紹介</p>
                            </a>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/keyword/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu04.jpg" alt="キーワードで見る"></div>
                                <p>キーワードで知る</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="megamenu__child--hasCat">
                    <span class="megamenu__menuTtl">人と仕事を知る</span>
                    <div class="megamenu__cat">
                        <div class="megamenu__catInner">
                            <div class="megamenu__catTop"><p>人と仕事を知る</p><span>Work</span></div>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/career-step/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu05.jpg);" alt="キャリアステップ"></div>
                                <p>キャリアステップ</p>
                            </a>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/interview/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu06.jpg" alt="社員インタビュー"></div>
                                <p>社員インタビュー</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="megamenu__child--hasCat">
                    <span class="megamenu__menuTtl">サポート</span>
                    <div class="megamenu__cat">
                        <div class="megamenu__catInner">
                            <div class="megamenu__catTop"><p>サポート</p><span>About</span></div>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/welfare/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu07.jpg);" alt="福利厚生"></div>
                                <p>環境・制度</p>
                            </a>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/faq/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu08.jpg" alt="よくある質問"></div>
                                <p>よくある質問</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="megamenu__child--hasCat">
                    <span class="megamenu__menuTtl">募集要項</span>
                    <div class="megamenu__cat">
                        <div class="megamenu__catInner">
                            <div class="megamenu__catTop"><p>募集要項</p><span>Entry</span></div>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/requirements/newgraduate/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu09.png);" alt="新卒採用"></div>
                                <p>新卒採用</p>
                            </a>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/requirements/career/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu10.png" alt="中途採用"></div>
                                <p>中途採用</p>
                            </a>
                            <a href="<?php echo esc_url( home_url() ); ?>/recruit/requirements/comeback/" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu11.png" alt="カムバック採用"></div>
                                <p>カムバック採用</p>
                            </a>
                            <a href="https://j-quest-job.jp/" target="_blank" class="megamenu__catSingle">
                                <div class="megamenu__catSingleImg"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/head_menu12.png" alt="パート・アルバイト採用"></div>
                                <p>パート・アルバイト採用</p>
                            </a>
                        </div>
                    </div>
                </li>				
            </ul>


			
            <a href="<?php echo esc_url( home_url() ); ?>/recruit/entry/" class="entryBtnNav sp">エントリーする</a>
        </nav>
        <a href="<?php echo esc_url( home_url() ); ?>/recruit/entry/" class="entryBtn">
            <span class="pc">エントリーする</span>
            <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/mail.svg" alt="Entry" class="sp">
            <span class="entryBtn__txt sp">Entry</span>
        </a>
    </header> 