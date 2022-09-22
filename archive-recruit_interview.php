<?php get_header('recruit'); ?>

    <main class="interview">
        <section class="headBlock">
            <div class="headBlock__txt">
                <h1>社員インタビュー<span>Interview</span></h1>
                <p>働く社員について、入社理由、仕事内容、やりがいなどのインタビューを掲載しています。</p>
            </div>
            <div class="headBlock__img" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/interview/h1Img.png);" alt=""></div>
            <div class="pankuzuBlock">
                <ul>
                    <li><a href="/"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/pankuzu_icon.svg" alt="TOP"></a></li>
                    <li>社員インタビュー</li>
                </ul>
            </div>
        </section>

        <div class="interview__list">
            <?php
                $args = array(
                    'post_type'      => 'recruit_interview',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                );
                $postslist = new WP_Query($args);
                if ( $postslist->have_posts() ) :
                    while ( $postslist->have_posts() ) : $postslist->the_post();
            ?>
            <div class="interview__listSingle">
                <img src="<?php echo get_field('interview_list_image'); ?>" alt="" class="interview__listImg">
                <div class="interview__listTxt">
                    <p class="interview__listLead"><?php if(get_field('interview_joining')) { echo get_field('interview_joining').'年入社'; } ?><?php if(get_field('interview_job')) { echo get_field('interview_job').'職'; } ?></p>
                    <h2><span><?php echo get_field('interview_en'); ?></span><?php echo get_field('interview_name'); ?></h2>
                    <p><?php echo get_field('interview_body'); ?></p>
                </div>
                <a class="interview__listBtn btn01" href="<?php echo get_permalink(); ?>">詳しく見る</a>
            </div>
            <?php
                    endwhile;
                endif;
                wp_reset_query();
            ?>
        </div>
    </main>

<?php get_footer('recruit'); ?>