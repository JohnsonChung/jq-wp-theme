<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>


    <div class="contentWrapper notFoundPage">
        <main>
            <div class="contentMain">
                <h1>404<span>NOT FOUND</span></h1>
                <p class="read">お探しのページが<br class="sp">見つかりませんでしたので<br>下記のページからお選びください。</p>
                <div class="sitemap">
                    <ul class="sitemap__box">
                        <li class="sitemap__boxList">
                            <p class="sitemap__boxTitle"><a href="<?php echo esc_url( home_url() ); ?>/service-station/">店舗検索</a></p>
                        </li>
                        <li class="sitemap__boxList">
                            <p class="sitemap__boxTitle"><a href="<?php echo esc_url( home_url() ); ?>/service/">サービス</a></p>
                            <ul class="sitemap__boxDetails">
                                <li><a href="<?php echo esc_url( home_url() ); ?>/self-refueling/">セルフ給油方法</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/car-wash/">ドライブスルー洗車</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/faq/">よくある質問</a></li>
                            </ul>
                        </li>
                        <li class="sitemap__boxList">
                            <p class="sitemap__boxTitle"><a href="<?php echo esc_url( home_url() ); ?>/company/">企業情報</a></p>
                            <ul class="sitemap__boxDetails">
                                <li><a href="<?php echo esc_url( home_url() ); ?>/new-company-name/">新社名について</a></li>
                            </ul>
                        </li>
                        <li class="sitemap__boxList">
                            <p class="sitemap__boxTitle"><a href="<?php echo esc_url( home_url() ); ?>/information/">お知らせ</a></p>
                            <ul class="sitemap__boxDetails">
                                <li><a href="<?php echo esc_url( home_url() ); ?>/information_cat/notices/">重要なお知らせ</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/information_cat/campaign/">キャンペーン情報</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/information_cat/pressrelease/">プレスリリース</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/information_cat/store-opening-information/">出店情報</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/information_cat/recruit/">採用情報</a></li>
                            </ul>
                        </li>
                        <li class="sitemap__boxList">
                            <ul class="sitemap__boxDetails">
                                <li><a href="https://www.j-quest.jp/recruit/" target="_blank">リクルートサイト</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/privacy-policy/">個人情報保護方針</a></li>
                                <li><a href="<?php echo esc_url( home_url() ); ?>/operational-policy/">SNS運用ポリシー</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>


<?php get_footer(); ?>