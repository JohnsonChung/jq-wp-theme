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
    <link rel="canonical" href="<?php echo esc_url( home_url() ); ?>">
    <link rel="shortcut icon" href="<?php echo out_file_dir(); ?>/assets/img/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo out_file_dir(); ?>/assets/img/apple-touch-icon.png" />
    <!-- OGP/twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="ENEOSジェイクエスト">
    <meta property="og:title" content="<?php echo $tdk_title; ?>" />
    <meta property="og:description" content="<?php echo $tdk_description; ?>" />
    <meta property="og:image" content="<?php echo out_file_dir(); ?>/assets/img/og-image.jpg" />
    <meta property="og:image:secure_url" content="<?php echo out_file_dir(); ?>/assets/img/og-image.jpg" />
    <meta property="og:url" content="<?php echo esc_url( home_url() ); ?>" />
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="ENEOSジェイクエスト" />
    <!--CSS File-->
    <link rel="stylesheet" href="<?php echo out_file_dir(); ?>/assets/css/common.css" media="screen,print">
    <link rel="stylesheet" href="<?php echo out_file_dir(); ?>/assets/css/swiper-bundle.min.css" media="all">
    <?php if(($_SERVER['REQUEST_URI'] == '/contact.php?p=consumer&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=company&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=company&submit_success=1&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=consumer&submit_success=1&agree=y')) { ?>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <!-- flickity -->
    <link rel="stylesheet" media="screen" href="bower_components/flickity/css/flickity.css">
    <link href="bower_components/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet">
    <style>
        body{
            font-family: "Yu Gothic Medium", "游ゴシック Medium", YuGothic, "游ゴシック体", "ヒラギノ角ゴ Pro W3", "メイリオ", sans-serif;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment-with-locales.min.js"></script>

    <!-- bootstrap -->
    <script type="text/javascript" src="bower_components/flickity/dist/flickity.pkgd.min.js"></script>
    <script src="js/rollover2.js"></script>
    <script src="php/hbs.js"></script>
    <script src="php/script.js?20191003"></script>
    <script src="js/script.js"></script>
    <script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php if(isProduction()) { ?>
        window.isProduction = true;
        <?php } else { ?>
        window.isProduction = false;
        <?php } ?>
    </script>
    <?php } ?>
    <?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-29774849-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-29774849-1');
    </script>
	</head>
<body>
    <a id="TOP"></a>
    <header>
        <?php if(is_front_page()) { ?>
        <a href="<?php echo esc_url( home_url() ); ?>/"><h1 class="siteName"><span class="siteName__inner"><img class="siteName__img" src="<?php echo out_file_dir(); ?>/assets/img/logo.svg" alt="ENEOSジェイクエスト"></span></h1></a>
        <?php } else { ?>
        <a href="<?php echo esc_url( home_url() ); ?>/"><div class="siteName"><span class="siteName__inner"><img class="siteName__img" src="<?php echo out_file_dir(); ?>/assets/img/logo.svg" alt="ENEOSジェイクエスト"></span></div></a>
        <?php } ?>
        <nav class="navi__menu">
            <div class="navi__btn">
                <div class="navi__btnLine">
                    <p class="navi__btnLine--top"><span></span></p>
                    <p class="navi__btnLine--middle"><span></span></p>
                    <p class="navi__btnLine--bottom"><span></span></p>
                </div>
                <p class="navi__btnTitle">MENU</p>
            </div>
            <div class="navi__body">
                <div class="navi__inner">
                    <div class="navi__main">
                        <ul class="navi__list--main">
                            <li><a href="<?php echo esc_url( home_url() ); ?>/">TOP<span>トップページ</span></a></li>
							<li><a href="<?php echo esc_url( home_url() ); ?>/service-station/">STORE<span>店舗検索</span></a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/service/">SERVISE<span>サービス</span></a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/self-refueling/">SELF REFUELING<span>セルフ給油方法</span></a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/car-wash/">CAR WASH<span>ドライブスルー洗車</span></a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/faq/">FAQ<span>よくある質問</span></a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/information_cat/campaign/">CAMPAIGN<span>キャンペーン情報</span></a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/company/">COMPANY<span>企業情報</span></a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/information/">INFORMATION<span>お知らせ</span></a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/contact/">CONTACT<span>お問い合わせ</span></a></li>
                            <li class="pick"><a href="https://www.j-quest.jp/recruit/" target="_blank">RECRUIT<span>リクルートサイト</span></a></li>
                        </ul>
                        <div class="navi__menuBottom">
                            <ul class="navi__list--sub">
                                <li><a href="<?php echo esc_url( home_url() ); ?>/privacy-policy/">個人情報保護方針</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/operational-policy/">SNS運用ポリシー</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/sitemap/">サイトマップ</a></li>
                            </ul>
                            <!--<ul class="navi__sns">
                                <li><a href="<?php echo esc_url( home_url() ); ?>/" target="_blank"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_line.svg" alt="Line"></a></li>
                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navi__side">
            <ul class="navi__sidelist">
                <li><a href="<?php echo esc_url( home_url() ); ?>/service-station/">店舗検索</a></li>
                <li><a href="<?php echo esc_url( home_url() ); ?>/contact/">お問い合わせ</a></li>
                <li><a href="https://www.j-quest.jp/recruit/" target="_blank">リクルートサイト</a></li>
            </ul>
            <ul class="navi__sns">
                <!--<li><a href="<?php echo esc_url( home_url() ); ?>/" target="_blank"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_line.svg" alt="Line"></a></li>-->
            </ul>
            <div class="pageScroll">
                <?php if(is_front_page()) { ?>
                <a href="#newsAreaPoint"><span>SCROLL</span></a>
                <?php } else { ?>
                    <a href="#TOP"><span>PAGETOP</span></a>
                <?php } ?>
            </div>
        </nav>
    </header>