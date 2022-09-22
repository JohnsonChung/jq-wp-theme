<?php
/*
    Template Name: リクルートテンプレート
*/
    get_header('recruit');

    if(is_page('recruit')){
    $page_ID = get_page_by_path('recruit');
?>

    <main class="toppage">
        <div class="mainV">
            <div class="mainV__txt">
                <h2><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/mvTxt.svg" alt="Be Necessary"></h2>
                <p class="mainV__txtLead">～ 誰かの「なくてはならない」に<br class="sp">なるために ～</p>
                <a href="/recruit/mission/" class="mainV__txtLink"><span>私たちのミッション</span></a>
            </div>

            <ul class="mainV__slide">
                <li class="mainV__slide01"></li>
                <li class="mainV__slide02"></li>
                <li class="mainV__slide03"></li>
                <li class="mainV__slide04"></li>
            </ul>

            <?php
                if(have_rows('recruit_info')) {
                    echo '<div class="newestBlock">
                            <dl class="newestBlock__inner">
                                <dt>Information</dt>
                                <dd>
                                    <ul>
                    ';
                    while(have_rows('recruit_info')): the_row();
            ?>
                        <?php if(!empty(get_sub_field('url'))) { ?>
                            <li>
                                <a href="<?php the_sub_field('url'); ?>" <?php if(get_sub_field('type') == 'type02') { echo 'target="_blank"'; } ?> class="newestBlock__inner">
                                    <?php
                                        if(mb_strlen(get_sub_field('title'))>41){
                                            $text= mb_substr(strip_tags(get_sub_field('title')), 0, 41);
                                            echo $text.'…';
                                        }else{
                                            echo strip_tags(get_sub_field('title'));
                                        }
                                    ?>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <?php
                                    if(mb_strlen(get_sub_field('title'))>41){
                                        $text= mb_substr(strip_tags(get_sub_field('title')), 0, 41);
                                        echo $text.'…';
                                    }else{
                                        echo strip_tags(get_sub_field('title'));
                                    }
                                ?>
                            </li>
                        <?php } ?>
            <?php
                    endwhile;
                    echo '
                                </ul>
                                <div id="arrow"></div>
                            </dd>
                        </dl>
                    </div>';
                }
            ?>
            <div class="mainV__scroll"><span>Scroll</span></div>
        </div>

        <div class="intro">
            <ul>
                <li class="fadeIn">
                    <a href="/recruit/entry/newgraduate/" class="intro__single01">
                        <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/introIcon01.svg" alt="">
                        <span>新卒採用</span>
                    </a>
                </li>
                <li class="fadeIn">
                    <a href="/recruit/entry/career/" class="intro__single02">
                        <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/introIcon02.svg" alt=""><span>中途採用</span>
                    </a>
                </li>
                <li class="fadeIn">
                    <a href="/recruit/entry/comeback/" class="intro__single03">
                        <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/introIcon03.svg" alt="">
                        <span>カムバック<br>採用</span>
                    </a>
                </li>
                <li class="fadeIn">
                    <a href="https://j-quest-job.jp/" class="intro__single04" target="_blank">
                        <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/introIcon04.svg" alt="">
                        <span>パート<br>アルバイト</span>
                    </a>
                </li>
            </ul>
        </div>

        <section class="message">
            <div class="message__ttl fadeIn">
                <h2>代表挨拶と社員インタビュー</h2>
                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/interview_eng.svg" alt="Message&amp;Interview" class="message__ttlEng pc">
                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/interview_eng_sp.svg" alt="Message&amp;Interview" class="message__ttlEng sp">
            </div>

            <section class="message__list sp">
                <a href="/recruit/message/" class="message__single interview03 fadeIn">
                    <div class="message__singleImg"></div>
                    <p class="message__singlePosition">代表取締役社長</p>
                    <h3>山下 正浩</h3>
                </a>
            </section>
            <section class="message__list">
                <?php
                    $count = 1;
                    $args = array(
                        'post_type'      => 'recruit_interview',
                        'post_status'    => 'publish',
                        'posts_per_page' => 2,
                    );
                    $postslist = new WP_Query($args);
                    if ( $postslist->have_posts() ) :
                        while ( $postslist->have_posts() ) : $postslist->the_post();
                ?>
                <style>
                    .toppage .message__single.interview0<?php echo $count; ?> .message__singleImg {
                        background-image: url(<?php echo get_field('interview_list_image'); ?>);
                    }
                    .toppage .message__single.interview0<?php echo $count; ?>:hover .message__singleImg {
                        background-image: url(<?php echo get_field('interview_list_image_hover'); ?>);
                    }
                </style>
                <a href="<?php echo get_permalink(); ?>" class="message__single interview0<?php echo $count; ?> fadeIn">
                    <div class="message__singleImg"></div>
                    <p class="message__singlePosition"><?php echo get_field('interview_division'); ?></p>
                    <h3><?php echo get_field('interview_name'); ?></h3>
                </a>
                <?php
                        $count++;
                        endwhile;
                    endif;
                    wp_reset_query();
                ?>
                <a href="/recruit/message/" class="message__single interview03 pc fadeIn">
                    <div class="message__singleImg"></div>
                    <p class="message__singlePosition">代表取締役社長</p>
                    <h3>山下 正浩</h3>
                </a>
                <?php
                    $count = 4;
                    $args = array(
                        'post_type'      => 'recruit_interview',
                        'post_status'    => 'publish',
                        'posts_per_page' => 2,
                        'offset'         => 2,
                    );
                    $postslist = new WP_Query($args);
                    if ( $postslist->have_posts() ) :
                        while ( $postslist->have_posts() ) : $postslist->the_post();
                ?>
                <style>
                    .toppage .message__single.interview0<?php echo $count; ?> .message__singleImg {
                        background-image: url(<?php echo get_field('interview_list_image'); ?>);
                    }
                    .toppage .message__single.interview0<?php echo $count; ?>:hover .message__singleImg {
                        background-image: url(<?php echo get_field('interview_list_image_hover'); ?>);
                    }
                </style>
                <a href="<?php echo get_permalink(); ?>" class="message__single interview0<?php echo $count; ?> fadeIn">
                    <div class="message__singleImg"></div>
                    <p class="message__singlePosition"><?php echo get_field('interview_division'); ?></p><h3><?php echo get_field('interview_name'); ?></h3>
                </a>
                <?php
                        $count++;
                        endwhile;
                    endif;
                    wp_reset_query();
                ?>
            </section>
        </section>


        <section class="keyword">
            <div class="keyword__ttl fadeIn">
                <h2>11個のキーワードで知る<br class="sp">ENEOSジェイクエスト</h2>
                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_eng.svg" alt="Keywords Of J-Quest" class="keyword__ttlEng pc">
                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_eng_sp.svg" alt="Keywords Of J-Quest" class="keyword__ttlEng sp">
            </div>
            
            <div class="keyword__sliderWrap fadeIn">
                <ul class="keyword__slider">
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_01">
                            <div class="keyword__sliderSingleNum"><span>01</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph01.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt01.svg" alt="創業20年">
                                <p class="keyword__sliderSingleLead">創業20年</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_01">
                            <div class="keyword__sliderSingleNum"><span>02</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph02.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt02.svg" alt="店舗数91店">
                                <p class="keyword__sliderSingleLead">店舗数91店</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_01">
                            <div class="keyword__sliderSingleNum"><span>03</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph03.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt03.svg" alt="売上高779億円">
                                <p class="keyword__sliderSingleLead">売上高779億円</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_02">
                            <div class="keyword__sliderSingleNum"><span>04</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph04.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt04.svg" alt="1428人の会社">
                                <p class="keyword__sliderSingleLead">1428人の会社</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_02">
                            <div class="keyword__sliderSingleNum"><span>05</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph05.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt05.svg" alt="男女の割合">
                                <p class="keyword__sliderSingleLead">男女の割合</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_03">
                            <div class="keyword__sliderSingleNum"><span>06</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph06.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt06.svg" alt="月平均残業率">
                                <p class="keyword__sliderSingleLead">月平均残業時間</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_03">
                            <div class="keyword__sliderSingleNum"><span>07</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph07.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt07.svg" alt="有給取得率">
                                <p class="keyword__sliderSingleLead">有給取得率</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_03">
                            <div class="keyword__sliderSingleNum"><span>08</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph08.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt08.svg" alt="育児休暇取得率">
                                <p class="keyword__sliderSingleLead">育児休暇取得率</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_04">
                            <div class="keyword__sliderSingleNum"><span>09</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph09.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt09.svg" alt="日本橋ベーカリー">
                                <p class="keyword__sliderSingleLead">日本橋ベーカリー</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_04">
                            <div class="keyword__sliderSingleNum"><span>10</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph10.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt10.svg" alt="自分の考えが形になる">
                                <p class="keyword__sliderSingleLead">自分の考えが形になる</p>
                            </div>
                        </a>
                    </li>
                    <li class="keyword__sliderSingle">
                        <a href="/recruit/keyword/#keyword_04">
                            <div class="keyword__sliderSingleNum"><span>11</span></div>
                            <div class="keyword__sliderSingleImg" style="background-image:url(<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_ph11.jpg)"></div>
                            <div class="keyword__sliderSingleTxt">
                                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/keyword_txt11.svg" alt="クレンリネス">
                                <p class="keyword__sliderSingleLead">クレンリネス</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="keyword__more fadeIn">
                <a href="/recruit/keyword/">キーワードを詳しく見る</a>
            </div>
        </section>

        <section class="about fadeIn">
            <div class="about__inner fadeIn">
                <div class="about__txt">
                    <h2>会社を知る<span>About</span></h2>
                    <p>ENEOSジェイクエストは創業以来、<br class="pc">お客様にとって『なくてはならない存在』となることを<br class="pc">使命としています。<br>これからもよりよい会社、社会への貢献を目指し、<br>一緒に歩んでいける方を求めています。</p>

                    <ul>
                        <li><a href="/recruit/message/">代表メッセージ</a></li>
                        <li><a href="/recruit/mission/">ミッション</a></li>
                        <li><a href="/recruit/business/">事業紹介</a></li>
                    </ul>
                </div>
                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/about_ph.jpg" alt="" class="about__img">
            </div>
        </section>
        <section class="work fadeIn">
            <div class="work__inner fadeIn">
                <div class="work__txt">
                    <h2>人と仕事を知る<span>Work</span></h2>
                    <p>お客様が笑顔になり、<br class="pc">それを見て働くスタッフも笑顔になる。<br>
                        お客様と地域にとってなくてならない存在である<br class="pc">
                        ENEOSジェイクエストのお仕事をご紹介します。</p>

                    <ul>
                        <li><a href="/recruit/interview/">インタビュー</a></li>
                        <li><a href="/recruit/career-step/">キャリアステップ</a></li>
                    </ul>
                </div>
                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/work_ph.jpg" alt="" class="work__img">
            </div>
        </section>

        <div class="information">
            <div class="information__ttl fadeIn">
                <h2>スタッフのためのサポート制度と<br class="sp">採用の疑問を解消</h2>
                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/info_eng.svg" alt="Recruit Information" class="information__ttlEng pc">
                <img src="<?php echo out_file_dir_recruit(); ?>/assets/img/top/info_eng_sp.svg" alt="Recruit Information" class="information__ttlEng sp">
            </div>

            <ul>
                <li class="fadeIn">
                    <a href="/recruit/welfare/" class="information__welfare">
                        <dl>
                            <dt>環境・制度</dt>
                            <dd>スタッフをサポートする環境・制度についてのご紹介</dd>
                        </dl>
                    </a>
                </li>
                <li class="fadeIn">
                    <a href="/recruit/faq/" class="information__faq">
                        <dl>
                            <dt>よくある質問</dt>
                            <dd>採用に関するよくいただくご質問はこちら</dd>
                        </dl>
                    </a>
                </li>
            </ul>
        </div>

    </main>
    
<?php
    } else {
        while(have_posts()): the_post();
            the_content();
        endwhile;
    }
    get_footer('recruit');
?>