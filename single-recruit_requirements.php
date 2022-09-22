<?php
    get_header('recruit');
?>

    <main class="important">
        <section class="headBlock">
            <div class="headBlock__txt">
                <h1>募集要項　<?php the_title(); ?><span>Important</span></h1>
                <?php
                    while(have_posts()): the_post();
                        the_content();
                    endwhile;
                ?>
            </div>
            <div class="headBlock__img" style="background-image:url(/recruit/assets/img/requirements/h1Img.png);" alt="募集要項"></div>
            <div class="pankuzuBlock">
                <ul>
                    <li><a href="/"><img src="<?php echo out_file_dir_recruit(); ?>/assets/img/pankuzu_icon.svg" alt="TOP"></a></li>
                    <li>募集要項　<?php the_title(); ?></li>
                </ul>
            </div>
        </section>

        <div class="important__cont">
            <section class="important__single">
                <h2>募集要項</h2>
                <table>
                    <?php if(get_field('recruitingCount')) { ?>
                    <tr>
                        <th>募集人数</th>
                        <td><?php echo get_field('recruitingCount'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('jobCategory')) { ?>
                    <tr>
                        <th>職種</th>
                        <td><?php echo get_field('jobCategory'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('baseSalary')) { ?>
                    <tr>
                        <th>基本給</th>
                        <td><?php echo get_field('baseSalary'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('variousAllowance')) { ?>
                    <tr>
                        <th>諸手当</th>
                        <td><?php echo get_field('variousAllowance'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('salaryIncrease')) { ?>
                    <tr>
                        <th>昇給</th>
                        <td><?php echo get_field('salaryIncrease'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('bonus')) { ?>
                    <tr>
                        <th>賞与</th>
                        <td><?php echo get_field('bonus'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('treatmentWelfareBenefitsIn-companySystem')) { ?>
                    <tr>
                        <th>待遇・<br class="sp">福利厚生・<br>社内制度</th>
                        <td><?php echo get_field('treatmentWelfareBenefitsIn-companySystem'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('passiveSmoking')) { ?>
                    <tr>
                        <th>受動喫煙防止策</th>
                        <td><?php echo get_field('passiveSmoking'); ?></td>
                    </tr>
                    <?php } ?>					
					<?php if(get_field('holidayLeave')) { ?>
                    <tr>
                        <th>休日休暇</th>
                        <td><?php echo get_field('holidayLeave'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('workingPlace')) { ?>
                    <tr>
                        <th>勤務地</th>
                        <td><?php echo get_field('workingPlace'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('workingTimes')) { ?>
                    <tr>
                        <th>勤務時間</th>
                        <td><?php echo get_field('workingTimes'); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if(get_field('educationSystem')) { ?>
                    <tr>
                        <th>教育制度</th>
                        <td><?php echo get_field('educationSystem'); ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </section>
            <section class="important__single">
                <h2>採用フロー</h2>

                <div class="important__flow">
                    <div>説明会兼一次選考 (面接)</div>
                    <div>最終面接(個別面接)</div>
                    <div>内々定</div>
                </div>
            </section>
            <section class="important__single">
                <h2>採用担当からのメッセージ</h2>
                <p class="important__message"><?php echo get_field('messageFromRecruitmentResponsible'); ?></p>
            </section>
            <section class="important__single">
                <h2>採用に関するお問い合わせ</h2>
                <div class="important__contact"><a href="tel:0368651226" class="important__contactTel">03-6865-1226</a>
                    <div class="important__contactInfo"><dl><dt>受付時間</dt><dd>平日 9:00～18:00</dd></dl>
                        <dl><dt>担当</dt><dd>人事部採用グループ</dd>
                        </dl>
                    </div>
                    <a href="/recruit/contact/" class="important__contactMail"><span>メールで問い合わせる</span></a>
                </div>
            </section>
        </div>



        
        
<?php if(is_single('newgraduate')): ?>
        <div class="important__entry">
            <a href="/recruit/entry/newgraduate/"><span>エントリーはこちらから</span></a><br>
			<!--<a href="https://job.mynavi.jp/22/pc/search/corp205491/outline.html" target="_blank"><span>マイナビからのエントリーはこちらから</span></a>-->
        </div>
<?php elseif(is_single('career')): ?> 
        <div class="important__entry">
            <a href="/recruit/entry/career/"><span>エントリーはこちらから</span></a>
        </div>
<?php elseif(is_single('comeback')): ?> 
        <div class="important__entry">
            <a href="/recruit/entry/comeback/"><span>エントリーはこちらから</span></a>
        </div>
<?php endif; ?>





    </main>

<?php get_footer('recruit'); ?>