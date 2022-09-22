<?php
    get_header('recruit');
    remove_filter( 'acf_the_content', 'wpautop' );
?>

    <main class="interview">
        <section class="headBlock--second">
            <div class="headBlock__txt">
                <p class="headBlock__copy"><?php echo get_field('interview_catch_copy'); ?></p>
                <h1><?php if(get_field('interview_joining')) { echo get_field('interview_joining').'年入社'; } ?><?php if(get_field('interview_job')) { echo get_field('interview_job').'職'; } ?><span><?php echo get_field('interview_name'); ?></span></h1>
                <p><?php echo get_field('interview_body'); ?></p>
            </div>
            <div class="headBlock__img" style="background-image:url(<?php echo get_field('interview_detail_image'); ?>);" alt=""></div>
            <div class="pankuzuBlock">
                <ul>
                    <li><a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/pankuzu_icon02.svg" alt="TOP"></a></li>
                    <li>社員インタビュー</li>
                </ul>
            </div>
        </section>

        <div class="interview__cont">
            <?php if(get_field('interview_qa')): ?>
            <?php while(the_repeater_field('interview_qa')):?>
            <section class="interview__block<?php if(get_sub_field('reordering_order') == 'order02') { echo '--wide'; } ?>">
                <?php if(get_sub_field('interview_qa_image')) { ?><div class="interview__blockImg sp"><img src="<?php the_sub_field('interview_qa_image'); ?>" alt=""></div><?php } ?>
                <div class="interview__blockTxt">
                    <p class="interview__blockQ"><?php the_sub_field('interview_qa_question'); ?></p>
                    <h2><?php the_sub_field('interview_qa_answer_title'); ?></h2>
                    <?php if(get_sub_field('reordering_order') == 'order02') { ?>
                        <?php echo nl2br(get_sub_field('interview_qa_answer')); ?>
                    <?php } ?>
                </div>
                <?php if(get_sub_field('reordering_order') != 'order02') { ?>
                <div>
                    <?php if(get_sub_field('interview_qa_image')) { ?><div class="interview__blockImg pc"><img src="<?php the_sub_field('interview_qa_image'); ?>" alt=""></div><?php } ?>
                    <?php echo nl2br(get_sub_field('interview_qa_answer')); ?>
                </div>
                <?php } else { ?>
                    <?php if(get_sub_field('interview_qa_image')) { ?><img src="<?php the_sub_field('interview_qa_image'); ?>" alt=""><?php } ?>
                <?php } ?>
            </section>
            <?php endwhile;?>
            <?php endif; ?>
            <a class="interview__backBtn" href="/recruit/interview/">一覧へ戻る</a>
        </div>
    </main>

<?php get_footer('recruit'); ?>