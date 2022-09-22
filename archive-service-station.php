<?php get_header(); ?>

    <div class="contentWrapper serviceStationPage">
        <main>
            <div class="underHead big">
                <h1 class="underHead__text">STORE<span>店舗検索</span></h1>
                <p>全国90店舗の中からお近くのガソリンスタンドを見つけられます。</p>
            </div>
            <nav class="pnkz">
                <ul class="pnkz__list">
                    <li><a href="<?php echo esc_url( home_url() ); ?>/"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_home.svg" alt="HOME"></a></li>
                    <li>店舗検索</li>
                </ul>
            </nav>
            <div class="contentMain">
                <div class="map">
                    <img class="map__img" src="<?php echo out_file_dir(); ?>/assets/img/serviceStation/map.png" alt="都道府県">
                    <div class="map__area--01">
                        <p class="map__areaName">東北エリア</p>
                        <ul class="map__areaDivision">
                            <?php
                                $children = get_terms('prefectures', array('parent' => 7, 'hide_empty' => 0));
                                foreach ( $children as $term ) {
                                    $parent = get_term($term->parent , 'prefectures');
                                    echo '<li><a href="'.esc_url( home_url() ).'/'.$parent->slug.'/'.$term->slug.'/">'.$term->name.'（'. $term->count .'）</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="map__area--02">
                        <p class="map__areaName">関東エリア</p>
                        <ul class="map__areaDivision">
                            <?php
                                $children = get_terms('prefectures', array('parent' => 8, 'hide_empty' => 0));
                                foreach ( $children as $term ) {
                                    $parent = get_term($term->parent , 'prefectures');
                                    echo '<li><a href="'.esc_url( home_url() ).'/'.$parent->slug.'/'.$term->slug.'/">'.$term->name.'（'. $term->count .'）</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="map__area--03">
                        <p class="map__areaName">中部エリア</p>
                        <ul class="map__areaDivision">
                            <?php
                                $children = get_terms('prefectures', array('parent' => 9, 'hide_empty' => 0));
                                foreach ( $children as $term ) {
                                    $parent = get_term($term->parent , 'prefectures');
                                    echo '<li><a href="'.esc_url( home_url() ).'/'.$parent->slug.'/'.$term->slug.'/">'.$term->name.'（'. $term->count .'）</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="map__area--04">
                        <p class="map__areaName">近畿エリア</p>
                        <ul class="map__areaDivision">
                            <?php
                                $children = get_terms('prefectures', array('parent' => 10, 'hide_empty' => 0));
                                foreach ( $children as $term ) {
                                    $parent = get_term($term->parent , 'prefectures');
                                    echo '<li><a href="'.esc_url( home_url() ).'/'.$parent->slug.'/'.$term->slug.'/">'.$term->name.'（'. $term->count .'）</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <!--
                <div class="banner">
                    <a href="">
                        <img class="pc" src="<?php echo out_file_dir(); ?>/assets/img/serviceStation/banner.png" alt="LINEでお得な情報やクーポンを配信中！">
                        <img class="sp" src="<?php echo out_file_dir(); ?>/assets/img/serviceStation/banner_sp.png" alt="LINEでお得な情報やクーポンを配信中！">
                    </a>
                </div>
                -->
                <div class="information">
                    <div class="information__contents contents01">
                        <p class="information__title">キャンペーン情報</p>
                        <?php
                            $args = array(
                                'post_type'      => 'information',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                                'meta_query' => array(
                                    array(
                                        'key' => 'campaignInformationTime',
                                        'value' => date('Y-m-d'),
                                        'compare' => '>=',
                                        'type' => 'DATE'
                                    ),
                                ),
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'information_cat',
                                        'field' => 'slug',
                                        'terms' => 'campaign',
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
                        <dl class="information__news">
                            <dt class="information__newsTitle"><?php echo get_post_time( 'Y.m.d', false, null, false ); ?></dt>
                            <dd class="information__newsDetails"><a href="<?php echo $url; ?>" <?php echo $target; ?>><?php the_title(); ?></a></dd>
                        </dl>
                        <?php
                                endwhile;
                            else:
                        ?>
                            <p class="information__newsNone">ただいま実施中のキャンペーンはございません。</p>
                        <?php
                            endif;
                            wp_reset_query();
                        ?>
                    </div>
                    <div class="information__contents contents02">
                        <p class="information__title">オープン・リニューアル情報</p>
                        <?php
                            $args = array(
                                'post_type'      => 'information',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                                'meta_query' => array(
                                    array(
                                        'key' => 'open_renewal',
                                        'value' => true,
                                        'terms' => '=',
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
                        <dl class="information__news">
                            <dt class="information__newsTitle"><?php echo get_post_time( 'Y.m.d', false, null, false ); ?></dt>
                            <dd class="information__newsDetails"><a href="<?php echo $url; ?>" <?php echo $target; ?>><?php the_title(); ?></a></dd>
                        </dl>
                        <?php
                                endwhile;
                            else:
                        ?>
                            <p class="information__newsNone">ただいま予定はございません。</p>
                        <?php
                            endif;
                            wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>


<?php get_footer(); ?>