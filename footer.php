    <footer>
        <div class="footer__inner">
            <div class="footer__top">
                <div class="footer__logo">
                    <a class="footer__logoLink" href="<?php echo esc_url( home_url() ); ?>/"><img class="footer__logoImg" src="<?php echo out_file_dir(); ?>/assets/img/logo_black.svg" alt="ジェイクエスト"></a>
                </div>
                <nav class="footer__menu">
                    <ul class="footer__list--main">
                        <li><a href="<?php echo esc_url( home_url() ); ?>/service-station/">店舗検索</a></li>
                        <li><a href="<?php echo esc_url( home_url() ); ?>/service/">サービス</a></li>
                        <li><a href="<?php echo esc_url( home_url() ); ?>/faq/">よくある質問</a></li>
                        <li><a href="<?php echo esc_url( home_url() ); ?>/information_cat/campaign/">キャンペーン情報</a></li>
                        <li><a href="<?php echo esc_url( home_url() ); ?>/company/">企業情報</a></li>
                        <li><a href="<?php echo esc_url( home_url() ); ?>/information/">お知らせ</a></li>
                        <li><a href="<?php echo esc_url( home_url() ); ?>/contact/">お問い合わせ</a></li>
                    </ul>
                    <ul class="footer__list--sub">
                        <li><a href="https://www.j-quest.jp/recruit/" target="_blank">リクルートサイト </a></li>
                        <li><a href="<?php echo esc_url( home_url() ); ?>/privacy-policy/">個人情報保護方針</a></li>
                        <li><a href="<?php echo esc_url( home_url() ); ?>/operational-policy/">SNS運用ポリシー</a></li>
                        <li><a href="<?php echo esc_url( home_url() ); ?>/sitemap/">サイトマップ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <small class="footer__copy">Copyright &copy; 2020 ENEOS J-Quest</small>
    </footer>
    <!--JS File-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/object-fit-images/3.2.3/ofi.js" defer></script>
    <script src="<?php echo out_file_dir(); ?>/assets/js/swiper-bundle.min.js" defer></script>
    <script src="<?php echo out_file_dir(); ?>/assets/js/custom.js" defer></script>

    <?php if(($_SERVER['REQUEST_URI'] == '/contact.php?p=consumer&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=company&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=company&submit_success=1&agree=y') || ($_SERVER['REQUEST_URI'] == '/contact.php?p=consumer&submit_success=1&agree=y') || get_queried_object_id() === 1180 || get_queried_object_id() === 1235) { ?>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var gTelephone = $(".group-telephone"),
                gEmail = $(".group-email");

            var telephone = $("input[name=telephone_number]")
              , email1 = $("#email1")
              , email2 = $("#email2");

            $(".star", gTelephone).hide();
            $(".star", gEmail).hide();

            $("input[name=contact_method]").change(function() {
                switch(this.value) {
                    case 'telephone':
                        telephone.attr('required', true);
                        $(".star", gTelephone).show();
                        email1.attr('required', false);
                        email2.attr('required', false);
                        $(".star", gEmail).hide();
                        break;

                    case 'mail':
                        telephone.attr('required', false);
                        $(".star", gTelephone).hide();
                        email1.attr('required', true);
                        email2.attr('required', true);
                        $(".star", gEmail).show();
                        break;

                    default:
                        telephone.attr('required', false);
                        email1.attr('required', false);
                        email2.attr('required', false);
                        $(".star", gTelephone).hide();
                        $(".star", gEmail).hide();
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var email1 = document.getElementById("email1")
              , email2 = document.getElementById("email2");

            function validateEmail(){
              if(email1.value != email2.value) {
                email2.setCustomValidity("確認のため再度ご入力ください。");
              } else {
                email2.setCustomValidity('');
              }
            }

            email1.onchange = validateEmail;
            email2.onkeyup = validateEmail;
		});
    </script>
    <?php } ?>
    <?php wp_footer(); ?>
<!--
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
-->
</body>
</html>