<?php
    get_header();
    $prefectures_terms = wp_get_object_terms($post->ID, 'prefectures');
    foreach($prefectures_terms as $term){
        $termSlug = $term->slug;
        $termName = $term->name;
        $parent = get_term_by('id', $term->parent, 'prefectures');
        $parentSlug = $parent->slug;
    }
    if (have_posts()):while(have_posts()):the_post();
?>

    <div class="contentWrapper serviceStationDetailsPage">
        <main>
            <div class="underHead">
                <h1 class="underHead__text"><span>店舗検索</span>ENEOSジェイクエスト<?php the_title(); ?></h1>
            </div>
            <nav class="pnkz">
                <ul class="pnkz__list">
                    <li><a href="<?php echo esc_url( home_url() ); ?>/"><img src="<?php echo out_file_dir(); ?>/assets/img/icon_home.svg" alt="HOME"></a></li>
                    <li><a href="<?php echo esc_url( home_url() ); ?>/service-station/">店舗検索</a></li>
                    <li><a href="<?php echo esc_url( home_url() ); ?>/<?php echo $parentSlug; ?>/<?php echo $termSlug; ?>/"><?php echo $termName; ?></a></li>
                    <li>ENEOSジェイクエスト <?php the_title(); ?></li>
                </ul>
            </nav>
            <div class="contentMain">
                <?php
                    $shopInfoArray = get_field('shopInfo');
                    if(!empty($shopInfoArray[0]['shopInfoTitle'])) {
                ?>
                <div class="shopNews">
                    <h2 class="shopNews__title"><?php the_title(); ?>からのお知らせ</h2>
                    <div class="shopNews__nwesBox">
                        <?php
                            foreach ((array)$shopInfoArray as $shopInfo) {
                        ?>
                        <dl class="shopNews__nwes">
                            <dt class="shopNews__nwesDay"><?php echo $shopInfo['shopInfoCreationDate']; ?></dt>
                            <dd class="shopNews__nwesDetails">
                                <?php if($shopInfo['shopInfoType'] == 'shopInfoType01') { ?>
                                    <?php echo $shopInfo['shopInfoTitle']; ?>
                                <?php } ?>
                                <?php if($shopInfo['shopInfoType'] == 'shopInfoType02') { ?>
                                    <a href="<?php echo $shopInfo['shopInfoUrl']; ?>"><?php echo $shopInfo['shopInfoTitle']; ?></a>
                                <?php } ?>
                                <?php if($shopInfo['shopInfoType'] == 'shopInfoType03') { ?>
                                    <a href="<?php echo $shopInfo['shopInfoUrl']; ?>" target="_blank"><?php echo $shopInfo['shopInfoTitle']; ?></a>
                                <?php } ?>
                            </dd>
                        </dl>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <div class="map">
                    <div class="mapBox">
                        <?php echo get_field('googlemap'); ?>
                    </div>
                    <?php if(get_field('routeUpToStore')) { ?><a href="<?php echo get_field('routeUpToStore'); ?>" class="btn--grd mapBtn" target="_blank">店舗までのルートを調べる</a><?php } ?>
                </div>
                <div class="shopDetails">
                    <table>
                        <tr>
                            <th>住所</th>
                            <td>
                                <?php if(get_field('postalCode')) { ?>〒<?php echo get_field('postalCode'); ?><br><?php } ?>
                                <?php echo get_field('address'); ?>                                
                            </td>
                            <th>定休日</th>
                            <td><?php echo nl2br(get_field('regularHoliday')); ?></td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td><a href="tel:<?php echo get_field('tel'); ?>"><?php echo get_field('tel'); ?></a></td>
                            <th>店舗形態</th>
                            <td><?php echo nl2br(get_field('storeStyle')); ?></td>
                        </tr>
                        <tr>
                            <th>営業時間</th>
                            <td><?php echo nl2br(get_field('businessHours')); ?></td>
                            <th>取扱サービス</th>
                            <td><?php echo nl2br(get_field('handlingService')); ?></td>
                        </tr>
                        <tr>
                            <th>支払方法</th>
                            <td colspan="3">
                                <div class="payment">
                                    <dl class="payment__type">
                                        <dt class="payment__typeTitle">クレジットカード</dt>
                                        <dd class="payment__typeDetails">
                                            <?php
                                                $paymentMethods = get_field('paymentMethods',get_the_ID());
                                                foreach ((array)$paymentMethods['creditCard'] as $creditCard) {
                                                    if($creditCard == 'creditCard01'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/credit_01.svg" alt="">';
                                                    }
                                                    if($creditCard == 'creditCard02'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/credit_02.svg" alt="">';
                                                    }
                                                    if($creditCard == 'creditCard03'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/credit_03.svg" alt="">';
                                                    }
                                                }
                                            ?>
                                        </dd>
                                    </dl>
                                    <?php /*
                                    <dl class="payment__type">
                                        <dt class="payment__typeTitle">ENEOSプリカ／QUOカード</dt>
                                        <dd class="payment__typeDetails">
                                            <?php echo $paymentMethods['ENEOS_PLICA_QUO_card']; ?>
                                        </dd>
                                    </dl>
                                    */ ?>
                                    <dl class="payment__type">
                                        <dt class="payment__typeTitle">法人カード</dt>
                                        <dd class="payment__typeDetails">
                                            <?php
                                                foreach ((array)$paymentMethods['corporateCard'] as $corporateCard) {
                                                    if($corporateCard == 'corporateCard01'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/corporation_01.svg" alt="">';
                                                    }
                                                    if($corporateCard == 'corporateCard02'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/corporation_02.svg" alt="">';
                                                    }
                                                    if($corporateCard == 'corporateCard03'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/corporation_03.svg" alt="">';
                                                    }
                                                    if($corporateCard == 'corporateCard04'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/corporation_04.svg" alt="">';
                                                    }
                                                    if($corporateCard == 'corporateCard05'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/corporation_05.svg" alt="">';
                                                    }
                                                    if($corporateCard == 'corporateCard06'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/corporation_06.svg" alt="">';
                                                    }
                                                    if($corporateCard == 'corporateCard07'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/corporation_07.svg" alt="">';
                                                    }
                                                }
                                            ?>
                                        </dd>
                                    </dl>
                                    <dl class="payment__type">
                                        <dt class="payment__typeTitle">EneKey/スピードパス/トクタスメール</dt>
                                        <dd class="payment__typeDetails">
                                            <?php
                                                foreach ((array)$paymentMethods['enekey'] as $enekey) {
                                                    if($enekey == 'enekey01'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/enekey_01.svg" alt="">';
                                                    }
                                                }
                                            ?>
                                        </dd>
                                    </dl>
                                    <dl class="payment__type">
                                        <dt class="payment__typeTitle">電子マネー</dt>
                                        <dd class="payment__typeDetails">
                                            <?php
                                                foreach ((array)$paymentMethods['e-money'] as $e_money) {
                                                    if($e_money == 'e-money01'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/electronic_01.svg" alt="">';
                                                    }
                                                    if($e_money == 'e-money02'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/electronic_02.svg" alt="">';
                                                    }
                                                    if($e_money == 'e-money03'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/electronic_03.svg" alt="">';
                                                    }
                                                    if($e_money == 'e-money04'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/electronic_04.svg" alt="">';
                                                    }
                                                    if($e_money == 'e-money05'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/electronic_05.svg" alt="">';
                                                    }
                                                    if($e_money == 'e-money06'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/electronic_06.svg" alt="">';
                                                    }
                                                }
                                            ?>
                                            <p class="payment__typeText--small">
                                                店舗によって電子マネーで購入可能な商品が異なる<br class="pc">場合がありますので、詳細は各店舗にお問い合わせください。
                                            </p>
                                        </dd>
                                    </dl>
                                    <dl class="payment__type">
                                        <dt class="payment__typeTitle">Tカード</dt>
                                        <dd class="payment__typeDetails">
                                            <?php
                                                foreach ((array)$paymentMethods['tCard'] as $tCard) {
                                                    if($tCard == 'tCard01'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/tcard_01.svg" alt="">';
                                                    }
                                                    if($tCard == 'tCard02'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/tcard_02.svg" alt="">';
                                                    }
                                                    if($tCard == 'tCard03'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/tcard_03.svg" alt="">';
                                                    }
                                                    if($tCard == 'tCard04'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/tcard_04.svg" alt="">';
                                                    }
                                                    if($tCard == 'tCard05'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/tcard_05.svg" alt="">';
                                                    }
                                                    if($tCard == 'tCard06'){
                                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/tcard_06.svg" alt="">';
                                                    }
                                                }
                                                ?>
                                        </dd>
                                        <!--<p class="payment__typeText--small">
                                            ジェイクエストではモバイルTカードはご利用いただけません。<br class="pc">ご不便おかけして申し訳ございません。
                                        </p>-->
                                    </dl>
                                    <p class="payment__bottomText">
                                        <?php echo $paymentMethods['note']; ?>                                      
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <a class="shopBottomBtn btn--grd" href="javascript:history.back();">一覧へ戻る</a>
			
			</div>
        </main>
    </div>

<?php
    endwhile;endif;
    get_footer();
?>