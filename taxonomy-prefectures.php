<?php
    get_header();
    $term_object = get_queried_object();
    $current_term_name = single_term_title("", false);
    $current_term_slug = $term_object->slug;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;   
    $args = array(
        'post_type'      => 'service-station',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'paged'          => $paged,
        'tax_query' => array(
            array(
                'taxonomy' => 'prefectures',
                'field' => 'slug',
                'terms' => $current_term_slug,
            ),
        ),
    );
    $postslist = new WP_Query($args);
?>

    <div class="contentWrapper serviceStationDivisionPage">
        <main>
            <div class="underHead">
                <h1 class="underHead__text">STORE<span>店舗検索</span></h1>
            </div>
            <nav class="pnkz">
                <ul class="pnkz__list">
                    <li><a href="<?php echo esc_url( home_url() ); ?>/"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_home.svg" alt="HOME"></a></li>
                    <li><a href="<?php echo esc_url( home_url() ); ?>/service-station/">店舗検索</a></li>
                    <li><?php echo $current_term_name; ?></li>
                </ul>
            </nav>
            <div class="contentMain">
                <h2 class="headText"><?php echo $current_term_name; ?><span class="headText--big"><?php echo $postslist->found_posts; ?></span><span>店舗</span></h2>
                <div class="shop">
                    <ul class="shop__head pc">
                        <li class="item01">店名</li>
                        <li class="item02">店舗情報</li>
                        <!-- <li class="item06">LINE</li> -->

                        <!-- 
                        <li class="item01">店名</li>
                        <li class="item02">住所</li>
                        <li class="item03">TEL</li>
                        <li class="item04">営業時間</li>
                        <li class="item05">定休日</li>
                        <li class="item06">SNS</li>
                        -->
                    </ul>
                    <div class="shop__main">
                        <?php
                            if ( $postslist->have_posts() ) :
                                while ( $postslist->have_posts() ) : $postslist->the_post();
                        ?>
                        <div class="shop__box">
                            <p class="shop__name item01"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
                            <div class="shop__details">
                                <table class="shop__table">
                                    <tr class="item02">
                                        <td>
                                            <p>
                                                <?php echo get_field('address'); ?><br>
                                                [TEL]<a href="tel:<?php echo get_field('tel'); ?>"><?php echo get_field('tel'); ?></a><br class="sp">
                                                [営業時間]<?php echo nl2br(get_field('businessHours')); ?><br class="sp">
                                                [定休日]<?php echo nl2br(get_field('regularHoliday')); ?>
                                            </p>
                                            <p class="btn">
                                                <a class="btn--circle" href="<?php echo get_permalink(); ?>"><span>詳しく見る</span></a>
                                            </p>
                                        </td>
                                    </tr>
                                    <!-- 
                                    <tr class="item03">
                                        <td><a href="tel:<?php echo get_field('tel'); ?>"><?php echo get_field('tel'); ?></a></td>
                                    </tr>
                                    <tr class="item04">
                                        <td><?php echo nl2br(get_field('businessHours')); ?></td>
                                    </tr>
                                    <tr class="item05">
                                        <td><?php echo nl2br(get_field('regularHoliday')); ?></td>
                                    </tr>
                                    -->
                                    <!-- 
                                    <tr class="item06">
                                        <td>
                                            <?php if(!empty(get_field('sns')['qrCode'])) { ?>
                                            <p class="lineBtn"><span>友だち追加</span></p>
                                            <div class="modalBody">
                                                <p class="modalBtnClose">✕</p>
                                                <div class="modalMain">
                                                    <div class="line">
                                                        <p class="line__title">LINEの友だちを追加</p>
                                                        <img class="line__cord" src="<?php echo get_field('sns')['qrCode']; ?>" alt="コード">
                                                        <p class="line__text">
                                                            LINEアプリの友だちタブを開き、<br>
                                                            画面右上にある友だち追加ボタン＞[QRコード]を<br>
                                                            タップして、コードリーダーでスキャンしてください。                                                        
                                                        </p>
                                                        <ul class="line__banner">
                                                            <li class="line__banner--item01"><a href="https://apps.apple.com/jp/app/line/id443904275" target="_blank"><img src="<?php echo out_file_dir(); ?>/assets/img/serviceStation/line_app.png" alt="AppStore"></a></li>
                                                            <li class="line__banner--item02"><a href="https://play.google.com/store/apps/details?id=jp.naver.line.android" target="_blank"><img src="<?php echo out_file_dir(); ?>/assets/img/serviceStation/line_google.png" alt="GooglePlay"></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    -->
                                </table>
                            </div>
                        </div>
                        <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        ?>
                    </div>
                </div>

                <a class="shopBottomBtn btn--grd" href="<?php echo esc_url( home_url() ); ?>/service-station/">店舗検索TOPへ戻る</a>

            </div>
        </main>
    </div>

<?php get_footer(); ?>