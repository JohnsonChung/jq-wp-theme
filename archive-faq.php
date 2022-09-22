<?php get_header(); ?>

    <div class="contentWrapper faqPage">
        <main>
            <div class="underHead">
                <h1 class="underHead__text">FAQ<span>よくある質問</span></h1>
            </div>
            <nav class="pnkz">
                <ul class="pnkz__list">
                    <li><a href="<?php echo esc_url( home_url() ); ?>/"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_home.svg" alt="HOME"></a></li>
                    <li>よくある質問</li>
                </ul>
            </nav>
            <div class="contentMain">
                <section>
                    <?php
                        $faq_cat = get_terms('faq_cat','hide_empty=0');
                        foreach ( $faq_cat as $term ) {
                    ?>
                    <h2 class="headText"><?php echo $term->name; ?></h2>
                    <div class="faq__area">
                        <?php
                            $args = array(
                                'post_type'      => 'faq',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'faq_cat',
                                        'field' => 'slug',
                                        'terms' => $term->slug,
                                    ),
                                ),
                            );
                            $postslist = new WP_Query($args);
                            if ( $postslist->have_posts() ) :
                                while ( $postslist->have_posts() ) : $postslist->the_post();
                        ?>
                        <dl class="faq__box">
                            <dt class="faq__boxTitle"><p><?php the_title(); ?></p></dt>
                            <dd class="faq__boxDetails">
                                <?php the_content(); ?>
                            </dd>
                        </dl>
                        <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                        ?>
                    </div>
                    <?php } ?>
                    <!--<p class="faq__bottomText">
                        ※一部T-Pointが貯められない、使えないクレジットカードがございます。詳しくは店内の掲示物もしくはスタッフまでお問い合わせください。<br>
                        T-Pointが貯められない・使えないカード一覧
                    </p>-->
                </section>
            </div>
        </main>
    </div>

<?php get_footer(); ?>