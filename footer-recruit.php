    <footer>
        <div class="gotopBlock"><a href="#" class="gotop"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/gotop.svg" alt="ページトップに戻る"></a></div>
        <div class="footer__inner">
            <div class="footer__menu">
                <dl>
                    <dt>会社を知る</dt>
                    <dd>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/message/">代表メッセージ</a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/mission/">ミッション</a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/business/">事業紹介</a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/keyword/">キーワードで知る</a></li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>人と仕事を知る</dt>
                    <dd>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/interview/">社員インタビュー</a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/career-step/">キャリアステップ</a></li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>サポート</dt>
                    <dd>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/welfare/">環境・制度</a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/faq/">よくある質問</a></li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>募集要項</dt>
                    <dd>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/requirements/newgraduate/">新卒採用</a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/requirements/career/">中途採用</a></li>
                            <li><a href="<?php echo esc_url( home_url() ); ?>/recruit/requirements/comeback/">カムバック採用</a></li>
                            <li><a href="https://j-quest-job.jp/" target="_blank">パート・アルバイト採用</a></li>
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="footer__inner">
            <small>Copyright ©︎ 2021 J-Quest Corporation</small>
            <ul class="footer__btmMenu">
                <li><a href="<?php echo esc_url( home_url() ); ?>/">コーポレートサイト </a></li>
                <li><a href="<?php echo esc_url( home_url() ); ?>/privacy-policy/">個人情報保護方針</a></li>
            </ul>
        </div>
    </footer>

    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo out_file_dir_recruit(); ?>/assets/js/jquery.inview.min.js"></script>
    <script src="<?php echo out_file_dir_recruit(); ?>/assets/js/slick.min.js"></script>
    <script src="<?php echo out_file_dir_recruit(); ?>/assets/js/custom.js"></script>

            <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-29774849-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
    </script>


<?php wp_footer(); ?>
</body>
</html>
