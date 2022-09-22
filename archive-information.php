<?php get_header(); ?>

    <div class="contentWrapper informationPage">
        <main>
            <div class="underHead big">
                <h1 class="underHead__text">INFORMATION<span>お知らせ</span></h1>
                <p>ENEOSジェイクエストのキャンペーン情報や出店情報などのお知らせです。</p>
            </div>
            <nav class="pnkz">
                <ul class="pnkz__list">
                    <li><a href="<?php echo esc_url( home_url() ); ?>/"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_home.svg" alt="HOME"></a></li>
					<li><a href="<?php echo esc_url( home_url() ); ?>/information/">お知らせ</a></li>
                </ul>
            </nav>
            <div class="contentMain">
                <div class="newsMain">
                    <ul class="newsTab__choice">
                        <li class="select"><a href="/information/">全て</a></li>
                        <?php
                            $information_cat = get_terms('information_cat','hide_empty=0');
                            foreach ( $information_cat as $term ) {
                                echo '<li><a href="'.get_term_link($term->slug,'information_cat').'">'.$term->name.'</li>';
                            }
                        ?>
                    </ul>
                    <div class="newsTab__content">
                        <?php
                            $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;   
                            $args = array(
                                'post_type'      => 'information',
                                'post_status'    => 'publish',
                                'posts_per_page' => 20,
                                'paged'          => $paged,
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
                </div>
                <div class="pageingBox">
                    <div class="pageingOperation">
                        <?php
                            $paged = get_query_var('paged') - 1;
                            $unit = get_query_var('posts_per_page');
                            $count = $wp_query->post_count;
                            $num = 0;
                            if(0 < $unit){
                                $total = $wp_query->found_posts;
                                if(0 < $paged)
                                    $num = $paged * $unit;
                            }
                            $case1 = 1 < $count ? ($num + 1) : '';
                            $case2 = $num + $count;
                            echo '<p class="pageingOperation__page"><span>'.$total.'</span>件中<span>'.$case1.'</span>件&nbsp;-&nbsp;<span>'.$case2.'</span>件を表示</p>';
                        ?>
                    </div>
                    <nav class="pageing">
                        <ul class="pageing__list">
                        <?php
                            $big = 999999999;
                            $arrPaging = array();
                            $arrPaging = paginate_links(
                                array(
                                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format'    => '?paged=%#%',
                                    'current'   => max( 1, get_query_var('paged') ),
                                    'total'     => $postslist->max_num_pages,
                                    'prev_text' => '前のページへ',
                                    'next_text' => '次のページへ',
                                    'type'      => 'array'
                                )
                            );
                            foreach((array)$arrPaging as $paging) {
                                echo '<li>'.$paging.'</li>';
                            }
                        ?>
                        </ul>
                    </nav>
                </div>

            </div>
        </main>
    </div>


<?php get_footer(); ?>