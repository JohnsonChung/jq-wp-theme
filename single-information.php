<?php
    get_header();
    $my_terms = get_the_terms($post->ID, 'information_cat');
?>

    <div class="contentWrapper informationDetailsPage">
        <main>
            <div class="underHead">
                <h1 class="underHead__text">INFORMATION<span>お知らせ</span></h1>
            </div>
            <nav class="pnkz">
                <ul class="pnkz__list">
                    <li><a href="<?php echo esc_url( home_url() ); ?>/"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_home.svg" alt="HOME"></a></li>
                    <li><a href="<?php echo esc_url( home_url() ); ?>/information/">お知らせ</a></li>
                    <li><?php the_title(); ?></li>
                </ul>
            </nav>
            <div class="contentMain">
                <div class="news__head">
                    <h2><?php the_title(); ?></h2>
                    <div class="news__headdata">
                        <time><?php echo get_post_time( 'Y.m.d', false, null, false ); ?></time>
                        <span class="news__category--<?php echo $my_terms[0]->description; ?>"><?php echo $my_terms[0]->name; ?></span>
                    </div>
                </div>
                <article class="wp_cnt_block">
                    <?php while(have_posts()): the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                    <dl class="share">
                        <dt class="share__title">SHARE</dt>
                        <dd class="share__details">
                            <a class="share__icon--twitter" href="//twitter.com/share?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_permalink(); ?>" rel="nofollow" data-show-count="false" onclick="javascript:window.open(this.href, '','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_twitter.svg" alt="twitter"></a>
                            <a class="share__icon--facebook" href="//www.facebook.com/sharer.php?src=bm&amp;u=<?php echo get_permalink(); ?>&amp;t=<?php echo get_the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_facebook.svg" alt="facebook"></a>
                            <a class="share__icon--line" href="https://timeline.line.me/social-plugin/share?url=<?php echo get_permalink(); ?>" target="_blank"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_line.svg" alt="line"></a>
                        </dd>
                    </dl>
                </article>



                <nav class="pageing--details">
                    <ul class="pageing__list">
                        <?php
                            $prev_post  = get_previous_post();
                            $url = get_permalink( $prev_post ->ID );
                            if(!empty($prev_post)){
                                echo '<li><a class="prev" href="'.$url.'">前のページへ</a></li>';
                            }
                        ?>
                        <li><a class="btn--grd" href="<?php echo esc_url( home_url() ); ?>/information/">一覧に戻る</a></li>
                        <?php
                            $next_post = get_next_post();
                            $url = get_permalink( $next_post->ID );
                            if(!empty($next_post)){
                                echo '<li><a class="next" href="'.$url.'">次のページへ</a></li>';
                            }
                        ?>
                    </ul>
                </nav>

            </div>
        </main>
    </div>

<?php get_footer(); ?>