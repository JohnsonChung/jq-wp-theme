<?php get_header(); ?>


    <div class="contentWrapper topPage">
        <main>
            <div class="mainVisual">
                <div class="mainVisual__catch">
                    <p class="mainVisual__catch--text01 fadeText">
                        Brandnew <br class="sp">Value and
                    </p>
                    <p class="mainVisual__catch--text02 fadeText">
                        Experience.
                    </p>
                    <p class="mainVisual__catch--text03 fadeText">
                        新しい価値と体験を。
                    </p>
                </div>
                <div class="swiper-container-mv">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide mainVisual__item">
                            <img src="<?php echo out_file_dir(); ?>/assets/img/index/mv01.jpg" class="slide-img" alt="イメージ画像">
                            <!-- <img src="<?php echo out_file_dir(); ?>/assets/img/index/mv01_sp.png" class="slide-img sp" alt="イメージ画像"> -->
                        </li>
                        <li class="swiper-slide mainVisual__item">
                            <img src="<?php echo out_file_dir(); ?>/assets/img/index/mv02.jpg" class="slide-img" alt="イメージ画像">
                            <!-- <img src="<?php echo out_file_dir(); ?>/assets/img/index/mv01_sp.png" class="slide-img sp" alt="イメージ画像"> -->
                        </li>
                        <li class="swiper-slide mainVisual__item">
                            <img src="<?php echo out_file_dir(); ?>/assets/img/index/mv03.jpg" class="slide-img" alt="イメージ画像">
                            <!-- <img src="<?php echo out_file_dir(); ?>/assets/img/index/mv01_sp.png" class="slide-img sp" alt="イメージ画像"> -->
                        </li>
                    </ul>
                </div>
            </div>
            <section class="newsArea2" id="newsAreaPoint">
                <div class="newsSide fadein">
                    <h2>INFORMATION<span>お知らせ</span></h2>
                    <!-- コロナ以外 -->
                    <div class="newsTab__content">
                        <?php
                            $args = array(
                                'post_type'      => 'information',
                                'post_status'    => 'publish',
                                'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'information_cat',
                                        'field' => 'slug',
                                        'terms' => 'covid-19',
                                        'operator' => 'NOT IN',
                                    ),
                                ),
                            );
                            $postslist = new WP_Query($args);
                            if ( $postslist->have_posts() ) :
                                while ( $postslist->have_posts() ) : $postslist->the_post();
                                    $my_terms = get_the_terms($post->ID, 'information_cat');
                                    $url = '';
                                    $target = '';
                                    $linkType = get_field('linkType');
                                    if($linkType == 'linkType01'){
                                        $url = get_permalink();
                                    } else {
                                        if(!empty(get_field('linkUrl'))){
                                            $url = get_field('linkUrl');
                                        } else {
                                            $url = get_field('linkFile');
                                        }
                                        if($linkType == 'linkType03'){
                                            $target = 'target="_blank"';
                                        }
                                    }
                        ?>
                        <a href="<?php echo $url; ?>" <?php echo $target; ?> class="news__link">
                            <dl class="news__box">
                                <dt class="news__day"><?php echo get_post_time( 'Y.m.d', false, null, false ); ?><span class="news__category--<?php echo $my_terms[0]->description; ?>"><?php echo $my_terms[0]->name; ?></span></dt>
                                <dd class="news__details"><p><?php the_title(); ?></p></dd>
                            </dl>
                        </a>
                        <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        ?>

                    </div>
                    <!-- /コロナ以外 -->
                </div>
                <div class="covidSide fadein">
                    <h2>COVID-19<span>新型コロナウイルス関連</span></h2>
                    <!-- 新型コロナウイルス関連 -->
                    <div class="newsTab__content">
                        <?php
                            $args = array(
                                'post_type'      => 'information',
                                'post_status'    => 'publish',
                                'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'information_cat',
                                        'field' => 'slug',
                                        'terms' => 'covid-19',
                                    ),
                                ),
                            );
                            $postslist = new WP_Query($args);
                            if ( $postslist->have_posts() ) :
                                while ( $postslist->have_posts() ) : $postslist->the_post();
                                    $my_terms = get_the_terms($post->ID, 'information_cat');
                                    $url = '';
                                    $target = '';
                                    $linkType = get_field('linkType');
                                    if($linkType == 'linkType01'){
                                        $url = get_permalink();
                                    } else {
                                        if(!empty(get_field('linkUrl'))){
                                            $url = get_field('linkUrl');
                                        } else {
                                            $url = get_field('linkFile');
                                        }
                                        if($linkType == 'linkType03'){
                                            $target = 'target="_blank"';
                                        }
                                    }
                        ?>
                        <a href="<?php echo $url; ?>" <?php echo $target; ?> class="news__link">
                            <dl class="news__box">
                                <dt class="news__day"><?php echo get_post_time( 'Y.m.d', false, null, false ); ?></dt>
                                <dd class="news__details"><p><?php the_title(); ?></p></dd>
                            </dl>
                        </a>
                        <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        ?>
                    </div>
                    <!-- /新型コロナウイルス関連 -->
                </div>
                <p class="newsLinkBtn fadein">
                    <a class="btn--circle" href="<?php echo esc_url( home_url() ); ?>/information/"><span>お知らせ一覧を見る</span></a>
                </p>
            </section>
            <?php /*
            <section class="newsArea" id="newsAreaPoint">
                <h2 class="fadein">INFORMATION<span>お知らせ</span></h2>
                <div class="newsTab">
                    <ul class="newsTab__choice fadein">
                        <li id="newsTab1" class="select">全て</li>
                        <?php
                            $i = 1;
                            $information_cat = get_terms('information_cat','hide_empty=0');
                            foreach ( $information_cat as $term ) {
                                echo '<li id="newsTab'.$i.'">'.$term->name.'</li>';
                                $i++;
                            }
                        ?>
                    </ul>
                    <div class="newsTab__content fadein delay1">
                        <?php
                            $args = array(
                                'post_type'      => 'information',
                                'post_status'    => 'publish',
                                'posts_per_page' => 3,
                            );
                            $postslist = new WP_Query($args);
                            if ( $postslist->have_posts() ) :
                                while ( $postslist->have_posts() ) : $postslist->the_post();
                                    $my_terms = get_the_terms($post->ID, 'information_cat');
                                    $url = '';
                                    $target = '';
                                    $linkType = get_field('linkType');
                                    if($linkType == 'linkType01'){
                                        $url = get_permalink();
                                    } else {
                                        if(!empty(get_field('linkUrl'))){
                                            $url = get_field('linkUrl');
                                        } else {
                                            $url = get_field('linkFile');
                                        }
                                        if($linkType == 'linkType03'){
                                            $target = 'target="_blank"';
                                        }
                                    }
                        ?>
                        <a href="<?php echo $url; ?>" <?php echo $target; ?> class="news__link">
                            <dl class="news__box">
                                <dt class="news__day"><?php echo get_post_time( 'Y.m.d', false, null, false ); ?><span class="news__category--<?php echo $my_terms[0]->description; ?>"><?php echo $my_terms[0]->name; ?></span></dt>
                                <dd class="news__details"><p><?php the_title(); ?></p></dd>
                            </dl>
                        </a>
                        <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        ?>
                    </div>
                    <?php
                        $information_cat = get_terms('information_cat','hide_empty=0');
                        foreach ( $information_cat as $term ) {
                    ?>
                    <div class="newsTab__content">
                        <?php
                            $args = array(
                                'post_type'      => 'information',
                                'post_status'    => 'publish',
                                'posts_per_page' => 3,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'information_cat',
                                        'field' => 'slug',
                                        'terms' => $term->slug,
                                    ),
                                ),
                            );
                            $postslist = new WP_Query($args);
                            if ( $postslist->have_posts() ) :
                                while ( $postslist->have_posts() ) : $postslist->the_post();
                                    $my_terms = get_the_terms($post->ID, 'information_cat');
                                    $url = '';
                                    $target = '';
                                    $linkType = get_field('linkType');
                                    if($linkType == 'linkType01'){
                                        $url = get_permalink();
                                    } else {
                                        if(!empty(get_field('linkUrl'))){
                                            $url = get_field('linkUrl');
                                        } else {
                                            $url = get_field('linkFile');
                                        }
                                        if($linkType == 'linkType03'){
                                            $target = 'target="_blank"';
                                        }
                                    }
                        ?>
                        <a href="<?php echo $url; ?>" <?php echo $target; ?> class="news__link">
                            <dl class="news__box">
                                <dt class="news__day"><?php echo get_post_time( 'Y.m.d', false, null, false ); ?><span class="news__category--<?php echo $my_terms[0]->description; ?>"><?php echo $my_terms[0]->name; ?></span></dt>
                                <dd class="news__details"><p><?php the_title(); ?></p></dd>
                            </dl>
                        </a>
                        <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        ?>
                    </div>
                    <?php } ?>
                </div>
                <p class="newsLinkBtn fadein delay2">
                    <a class="btn--circle" href="<?php echo esc_url( home_url() ); ?>/information/"><span>お知らせ一覧を見る</span></a>
                </p>
            </section>
            */ ?>
            <!--<aside class="coronaBanner fadein" style="margin-bottom: 3rem;">
                <a href="<?php echo esc_url( home_url() ); ?>/information/%e3%80%90%e5%85%a8%e5%ba%97%e5%af%be%e8%b1%a1%e3%80%91goto%e3%83%88%e3%83%a9%e3%83%99%e3%83%ab%e3%82%ad%e3%83%a3%e3%83%b3%e3%83%9a%e3%83%bc%e3%83%b3%e2%80%bc/">
                    <img class="pc" src="<?php echo out_file_dir(); ?>cms/wp-content/uploads/2020/11/bnr_goto_pc.png" alt="gotoトラベル">
                    <img class="sp" src="<?php echo out_file_dir(); ?>cms/wp-content/uploads/2020/11/bnr_goto_sp.png" alt="gotoトラベル">
                </a>
            </aside>-->
            <aside class="coronaBanner fadein">
                <a href="<?php echo esc_url( home_url() ); ?>/corona-measures/">
                    <img class="pc" src="<?php echo out_file_dir(); ?>/assets/img/index/corona_banner.jpg" alt="新型コロナウイルス対策">
                    <img class="sp" src="<?php echo out_file_dir(); ?>/assets/img/index/SP_corona.png" alt="新型コロナウイルス対策">
                </a>
            </aside>
 
            <section class="ourServiceArea">
                <div class="backFont">
                    <h2 class="backFont__bg fadein">
                        <span class="backFont__text"><img src="<?php echo out_file_dir(); ?>/assets/img/index/ourService_title.svg" alt="OUR SERVICE"></span>
                        <span class="backFont__textSub">ENEOSジェイクエストのサービス</span>
                    </h2>
                </div>
                <div class="ourService__top">
                    <p class="ourService__catch fadein delay1">
                    給油も洗車もお買い物も<br>
                    お客様になくてはならない存在を目指し<br>
                    期待された以上の価値を<br>
                    提供することを探求（Quest）します。
                    </p>
                    <img class="ourService__mainPhoto fadein delay2" src="<?php echo out_file_dir(); ?>/assets/img/index/ourService_photo01.jpg" alt="給油もお買い物も。ショッピングモール併設型サービスステーション。">
                    <div class="ourService__pickBox fadein delay2">
                        <dl class="pickBox fadein delay3">
                            <dt class="pickBox__head">
                                <span class="pickBox__headNum">01</span>
                                <p class="pickBox__headTitle">セルフガソリンスタンド</p>
                            </dt>
                            <dd class="pickBox__details">
                                <p class="pickBox__detailsText">全国に91店舗のショッピングモール併設型ガソリンスタンドを運営するENEOSジェイクエスト。ENEOSグループの一員として、お客様に確かな製品・サービスをお届けします。</p>
                                <a class="btn--grd" href="<?php echo esc_url( home_url() ); ?>/service-station/">お近くの店舗を調べる</a>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="ourService__bottom stairs">
                    <div class="stairs__single fadein">
                        <a class="stairs__link" href="<?php echo esc_url( home_url() ); ?>/nihonbashibakery/" target="_blank">
                            <div class="stairs__photo">
                                <img src="<?php echo out_file_dir(); ?>/assets/img/index/ourService_photo02.jpg" alt="NIHONBASHI bakery">
                            </div>
                            <div class="stairs__details">
                                <dl class="pickBox">
                                    <dt class="pickBox__head">
                                        <span class="pickBox__headNum">02</span>
                                        <p class="pickBox__headTitle">NIHONBASHI bakery</p>
                                    </dt>
                                    <dd class="pickBox__details">
                                        <p class="pickBox__detailsText">ガソリンスタンド併設のパン屋さん。しあわせをBakeryにのせてお客様にお届けいたします。</p>
                                        <div class="pickBox__linkBtn">
                                            <p class="btn--circle"><span>詳しく見る</span></p>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </a>
                    </div>
                    <div class="stairs__single fadein delay1">
                        <a class="stairs__link" href="<?php echo esc_url( home_url() ); ?>/service/#shop">
                            <div class="stairs__photo">
                                <img src="<?php echo out_file_dir(); ?>/assets/img/index/ourService_photo03.jpg" alt="SHOPS｜コンビニ">
                            </div>
                            <div class="stairs__details">
                                <dl class="pickBox">
                                    <dt class="pickBox__head">
                                        <span class="pickBox__headNum">03</span>
                                        <p class="pickBox__headTitle">SHOPS｜コンビニ</p>
                                    </dt>
                                    <dd class="pickBox__details">
                                        <p class="pickBox__detailsText">種類豊富なドリンク・お菓子・たばこなどを給油ついでにお気軽にお買い求めいただけます。</p>
                                        <div class="pickBox__linkBtn">
                                            <p class="btn--circle"><span>詳しく見る</span></p>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </a>
                    </div>
                    <div class="stairs__single fadein delay">
                        <a class="stairs__link" href="https://www.eneos.co.jp/laundry/" target="_blank">
                            <div class="stairs__photo">
                                <img src="<?php echo out_file_dir(); ?>/assets/img/index/ourService_photo05.jpg" alt="ENEOS Laundry">
                            </div>
                            <div class="stairs__details">
                                <dl class="pickBox">
                                    <dt class="pickBox__head">
                                        <span class="pickBox__headNum">04</span>
                                        <p class="pickBox__headTitle">ENEOS Laundry</p>
                                    </dt>
                                    <dd class="pickBox__details">
                                        <p class="pickBox__detailsText">
                                            いつでも気軽に、安心してご利用いただける。<br>
                                            忙しい日常からちょっとだけ開放されて、ホッとした時間を過ごせる。<br class="sp">
                                            ENEOS Laundryは、ただ洗濯をするためだけの「ランドリー」じゃなく<br class="sp">
                                            気持ちまでリセットできるような場所を目指しています。
                                        </p>
                                        <div class="pickBox__linkBtn">
                                            <p class="btn--circle"><span>詳しく見る</span></p>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </a>
                    </div>
                    <div class="stairs__single fadein delay1">
                        <a class="stairs__link" href="<?php echo esc_url( home_url() ); ?>/car-wash/">
                            <div class="stairs__photo">
                                <img src="<?php echo out_file_dir(); ?>/assets/img/index/ourService_photo04.jpg" alt="ドライブスルー洗車">
                            </div>
                            <div class="stairs__details">
                                <dl class="pickBox">
                                    <dt class="pickBox__head">
                                        <span class="pickBox__headNum">05</span>
                                        <p class="pickBox__headTitle">ドライブスルー洗車</p>
                                    </dt>
                                    <dd class="pickBox__details">
                                        <p class="pickBox__detailsText">『簡単・キレイ・スピーディー』にお手軽価格で高性能ドライブスルー洗車機をご利用いただけます。</p>
                                        <div class="pickBox__linkBtn">
                                            <p class="btn--circle"><span>詳しく見る</span></p>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <section class="featursArea">
                <div class="backFont">
                    <h2 class="backFont__bg fadein">
                        <span class="backFont__text"><img src="<?php echo out_file_dir(); ?>/assets/img/index/featurs_title.svg" alt="FEATURS"></span>
                        <span class="backFont__textSub">ENEOSジェイクエストの特徴</span>
                    </h2>
                </div>
                <ul class="featurs">
                    <!-- <li class="featurs__single list01 fadein delay1">
                        <a href="<?php echo esc_url( home_url() ); ?>/information_cat/campaign/" class="featurs__link">
                            <p class="featurs__title"><span>Campaign</span></p>
                            <div class="featurs__details">
                                <p class="featurs__detailsText--top">Campaign</p>
                                <p class="featurs__detailsText--middle">キャンペーン情報</p>
                                <p class="featurs__detailsText--small">各店舗で実施中のお得なキャンペーン情報をご紹介。</p>
                                <div class="featurs__detailsLinkBtn">
                                    <p class="btn--circle white"><span>詳しく見る</span></p>
                                </div>
                            </div>
                        </a>
                    </li> -->
                    <li class="featurs__single list02 fadein delay1">
                        <a href="<?php echo esc_url( home_url() ); ?>/service-station/" class="featurs__link">
                            <p class="featurs__title"><span>Gas station</span></p>
                            <div class="featurs__details">
                                <p class="featurs__detailsText--top">Gas station</p>
                                <p class="featurs__detailsText--middle">店舗検索</p>
                                <p class="featurs__detailsText--small">お近くの店舗の地図、営業時間、電話番号などをご案内。</p>
                                <div class="featurs__detailsLinkBtn">
                                    <p class="btn--circle white"><span>詳しく見る</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="featurs__single list03 fadein delay2">
                        <a href="<?php echo esc_url( home_url() ); ?>/self-refueling/" class="featurs__link">
                            <p class="featurs__title"><span>How to Use</span></p>
                            <div class="featurs__details">
                                <p class="featurs__detailsText--top">How to Use</p>
                                <p class="featurs__detailsText--middle">セルフ給油方法</p>
                                <p class="featurs__detailsText--small">初めての方でも安心してご利用いただけます。ご利用方法をご紹介。</p>
                                <div class="featurs__detailsLinkBtn">
                                    <p class="btn--circle white"><span>詳しく見る</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="featurs__single list04 fadein delay3">
                        <a href="<?php echo esc_url( home_url() ); ?>/faq/	" class="featurs__link">
                            <p class="featurs__title"><span>Questions</span></p>
                            <div class="featurs__details">
                                <p class="featurs__detailsText--top">Questions</p>
                                <p class="featurs__detailsText--middle">よくある質問</p>
                                <p class="featurs__detailsText--small">セルフ給油のご利用方法などサービスに関するFAQをご紹介。</p>
                                <div class="featurs__detailsLinkBtn">
                                    <p class="btn--circle white"><span>詳しく見る</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="featurs__single list05 fadein delay4">
                        <a href="<?php echo esc_url( home_url() ); ?>/service/#card" class="featurs__link">
                            <p class="featurs__title"><span>ENEOS Card</span></p>
                            <div class="featurs__details">
                                <p class="featurs__detailsText--top">ENEOS Card</p>
                                <p class="featurs__detailsText--middle">ENEOSカード</p>
                                <p class="featurs__detailsText--small">ガソリン入れるなら！ENEOSカードがだんぜんお得！おすすめは、人気NO.1「ENEOSカードS」</p>
                                <div class="featurs__detailsLinkBtn">
                                    <p class="btn--circle white"><span>詳しく見る</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="featurs__single list06 fadein delay5">
                        <a href="<?php echo esc_url( home_url() ); ?>/service/#EneKey" class="featurs__link">
                            <p class="featurs__title"><span>EneKey</span></p>
                            <div class="featurs__details">
                                <p class="featurs__detailsText--top">EneKey</p>
                                <p class="featurs__detailsText--middle">エネキー</p>
                                <p class="featurs__detailsText--small">ENEOSセルフのサービスステーションで使える便利な新スピード決済ツールです。</p>
                                <div class="featurs__detailsLinkBtn">
                                    <p class="btn--circle white"><span>詳しく見る</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </section>
            <section class="companyArea">
                <div class="backFont">
                    <h2 class="backFont__bg fadein">
                        <span class="backFont__text"><img src="<?php echo out_file_dir(); ?>/assets/img/index/company_title.svg" alt="COMPANY"></span>
                        <span class="backFont__textSub">ENEOSジェイクエストについて</span>
                    </h2>
                </div>
                <div class="company__main">
                    <div class="company__text fadein delay1">
                        <p>全国に91店舗のガソリンスタンドを運営するENEOSジェイクエスト。<br class="pc">グループの一員として、お客様に確かな製品・サービスをお届けします。</p>
                    </div>
                    <ul class="company__listBox fadein delay1">
                        <li class="list01"><a href="<?php echo esc_url( home_url() ); ?>/company/"><p>COMPANY<span>企業情報</span></p></a></li>
                        <li class="list02"><a href="<?php echo esc_url( home_url() ); ?>/company/#missionArea"><p>MISSION<span>企業ミッション</span></p></a></li>
                        <li class="list03"><a href="<?php echo esc_url( home_url() ); ?>/service/"><p>SERVICE<span>サービス</span></p></a></li>
                        <li class="list04"><a href="<?php echo esc_url( home_url() ); ?>/company/new-company-name/"><p>COMPANY NAME<span>新社名について</span></p></a></li>
                    </ul>
                </div>
            </section>
            <section class="recruitArea">
                <h2 class="recruit__head fadein delay1"><img src="<?php echo out_file_dir(); ?>/assets/img/index/recruit_title.svg" alt="RECRUIT"></h2>
                <img class="recruit__photo fadein pc" src="<?php echo out_file_dir(); ?>/assets/img/index/recruit_photo01.png" alt="RECRUIT">
                <img class="recruit__photo fadein sp" src="<?php echo out_file_dir(); ?>/assets/img/index/recruit_photo01_sp.png" alt="RECRUIT">
                <div class="recruit__details fadein delay2">
                    <div class="recruit__detailsInner fadein delay3">
                        <p class="recruit__detailsTitle">RECRUIT<span>採用情報</span></p>
                        <p class="recruit__detailsText">
                            自分の手でお客様の「ありがとう」の言葉を生み出せるのがサービス業の魅力。<br class="pc">「お客様に喜んでいただきたい」「人が好き」そんな社員が多く活躍しております。                     
                        </p>
                        <a href="/recruit/" target="_blank" class="btn--grd">リクルートサイトを見る</a>
                    </div>
                </div>
            </section>
        </main>

    </div>
    

<?php get_footer(); ?>
