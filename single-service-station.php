<?php
    get_header();
    $prefectures_terms = wp_get_object_terms($post->ID, 'prefectures');
    foreach($prefectures_terms as $term){
        $termSlug = $term->slug;
        $termName = $term->name;
        $parent = get_term_by('id', $term->parent, 'prefectures');
        $parentSlug = $parent->slug;
    }
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



                <div class="shopNewsBlock">
                    <div class="shopNewsBlock__inner">
                        <p class="shopNewsBlock__title">ENEOSジェイクエスト<?php the_title(); ?>店からのお知らせ</p>
                        <div class="shopNewsBlock__main">
                            <?php
                                $field = get_field_object('shopInfo');
                                $shopInfoArray = get_field('shopInfo');
                                if(!empty($shopInfoArray[0]['shopInfoTitle'])) {
                                    $loopcounter = 0;
                                    foreach ($shopInfoArray as $shopInfo) {
                                        $category = $shopInfo['shopInfoCategory'];
                                        if( ($shopInfo['shopInfoEnd'] == '') || ($shopInfo['shopInfoEnd'] >= date_i18n("Y-m-d")) ) {
                            ?>
                            <article class="shopNewsBlock__single">
                                <div class="shopNewsBlock__newsDay"><?php echo $shopInfo['shopInfoCreationDate']; ?><span class="news__category--campaign"><?php echo $field['sub_fields'][1]['choices'][ $category ]; ?></span></div>
                                <p class="shopNewsBlock__newsTitle"><?php echo $shopInfo['shopInfoTitle']; ?></p>
                                <div class="shopNewsBlock__newsText"><?php echo $shopInfo['shopInfoBody']; ?></div>
                                <?php if($shopInfo['shopInfoFlyer']) { ?><p class="shopNewsBlock__newsLink"><a href="<?php echo $shopInfo['shopInfoFlyer']; ?>" target="_blank">チラシ画像を開く</a></p><?php } ?>
                            </article>
                            <?php
                                        $loopcounter++;
                                        }
                                    }
                            ?>
                            <?php } else { ?>
                                <p class="shopNewsBlock__newsNone">ただいま掲載するお知らせはございません。</p>
                            <?php
                                }
                            ?>
                        </div>
                        <?php if($loopcounter > 3) { ?>
                        <a class="shopBottomBtn btn--grd" href="/information/">もっと見る</a>
                        <?php } ?>
                    </div>
                </div>
                <?php
                    $bannerArray = get_field('banner');
                    if(!empty($bannerArray[0]['bannerImage'])) {
                ?>
                <aside class="bannerArea">
                    <ul>
                        <?php
                            foreach ($bannerArray as $banner) {
                        ?>
                        <li><a href="<?php echo $banner['bannerUrl']; ?>" <?php if($banner['bannerBlank']) { ?>target="_blank"<?php } ?>><img src="<?php echo $banner['bannerImage']; ?>" alt=""></a></li>
                        <?php } ?>
                    </ul>
                </aside>                    
                <?php } ?>
            </div>


<P style="margin: 6.5rem 0 1.8rem;"></P>


                <div class="contentMain__inner">
                    <div class="shopDetails">
                        <table>
                            <tr>
                                <th>住所</th>
                                <td>
                                    <?php if(get_field('postalCode')) { ?>〒<?php echo get_field('postalCode'); ?><br><?php } ?>
                                    <?php echo get_field('address'); ?>                                
                                </td>
                                <th>営業時間<br>定休日</th>
                                <td>
                                    <?php echo nl2br(get_field('businessHours')); ?>
                                    <?php echo nl2br(get_field('regularHoliday')); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td><a href="tel:<?php echo get_field('tel'); ?>"><?php echo get_field('tel'); ?></a></td>
                                <th>店舗形態</th>
                                <td><?php echo nl2br(get_field('storeStyle')); ?></td>
                            </tr>
                        </table>
                        <?php if(get_field('handlingService')) { ?>
                        <p class="shopDetails__title">取扱サービス</p>
                        <div class="shopDetails__titleLogo">
                            <?php
                                $handlingServiceArray = get_field('handlingService');
                                foreach ($handlingServiceArray as $handlingService) {
                                    if($handlingService == 'handlingService02'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_04.png" alt="">';
                                    }
                                    if($handlingService == 'handlingService09'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_09.png" alt="">';
                                    }
                                    if($handlingService == 'handlingService03'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_02.png" alt="">';
                                    }
                                    if($handlingService == 'handlingService04'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_01.png" alt="">';
                                    }
                                    if($handlingService == 'handlingService05'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_03.png" alt="">';
                                    }
                                    if($handlingService == 'handlingService06'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_08.png" alt="">';
                                    }
                                    if($handlingService == 'handlingService07'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_07.png" alt="">';
                                    }
                                    if($handlingService == 'handlingService10'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_10.png" alt="">';
                                    }
                                    if($handlingService == 'handlingService08'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_05.png" alt="">';
                                    }
                                    if($handlingService == 'handlingService01'){
                                        echo '<img src="'.out_file_dir().'/assets/img/serviceStation/service_06.png" alt="">';
                                    }

                                }
                            ?>
                        </div>
                        <div class="payment__typeText--small">
                            <?php echo nl2br(get_field('handlingServiceFree')); ?>
                        </div>
                        <?php } ?>
                        <p class="shopDetails__title">お支払い方法</p>
                        <div class="payment">
                            <dl class="payment__type">
                                <dt class="payment__typeTitle">クレジットカード</dt>
                                <dd class="payment__typeDetails">
                                    <?php
                                        $paymentMethods = get_field('paymentMethods');
                                        foreach ($paymentMethods['creditCard'] as $creditCard) {
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
                            <dl class="payment__type">
                                <dt class="payment__typeTitle">法人カード</dt>
                                <dd class="payment__typeDetails">
                                    <?php
                                        foreach ($paymentMethods['corporateCard'] as $corporateCard) {
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
                                <dt class="payment__typeTitle">電子マネー</dt>
                                <dd class="payment__typeDetails">
                                    <?php
                                        foreach ($paymentMethods['e-money'] as $e_money) {
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
                            <?php /*
                            <dl class="payment__type">
                                <dt class="payment__typeTitle">ENEOSプリカ／QUOカード</dt>
                                <dd class="payment__typeDetails"><?php echo $paymentMethods['ENEOS_PLICA_QUO_card']; ?></dd>
                            </dl>
                            */ ?>
                            <dl class="payment__type">
                                <dt class="payment__typeTitle">EneKey/スピードパス/トクタスメール</dt>
                                <dd class="payment__typeDetails">
                                    <?php
                                        foreach ($paymentMethods['enekey'] as $enekey) {
                                            if($enekey == 'enekey01'){
                                                echo '<img src="'.out_file_dir().'/assets/img/serviceStation/enekey_01.svg" alt="">';
                                            }
                                        }
                                    ?>
                                </dd>
                            </dl>
                            <dl class="payment__type">
                                <dt class="payment__typeTitle">Tカード</dt>
                                <dd class="payment__typeDetails">
                                <?php
                                    foreach ($paymentMethods['tCard'] as $tCard) {
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
                            </dl>
                            <p class="payment__bottomText">
                                <?php echo $paymentMethods['note']; ?>                                        
                            </p>

                        </div>
                        
                                           <div class="map">
                        <div class="mapBox">
                            <?php echo get_field('googlemap'); ?>
                        </div>
                        <?php if(get_field('routeUpToStore')) { ?><a href="<?php echo get_field('routeUpToStore'); ?>" class="btn--grd mapBtn" target="_blank">店舗までのルートを調べる</a><?php } ?>
                    </div>
 

                        
                        <a class="shopBottomBtn btn--grd" href="javascript:history.back();">一覧へ戻る</a>
                    </div>
                </div>
        </main>
    </div>

<?php get_footer(); ?>