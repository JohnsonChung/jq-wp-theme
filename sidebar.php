           <div class="blogPage__side">
                <dl class="blogPage__sideCatWrap">
                   <dt><span>記事カテゴリ</span></dt>
                   <dd>
                        <ul class="blogPage__sideCat">
                            <?php
                                $blog_category = get_terms( 'blog_category', 'hide_empty=0' );
                                foreach ($blog_category as $category) {
                                    echo '<li><a href="'.get_term_link($category).'">'.$category->name.'（'.$category->count.'）</a></li>';
                                }
                            ?>
                        </ul>
                   </dd>
               </dl>
               <dl class="blogPage__sideNewestWrap">
                <dt><span>最新5件</span></dt>
                <dd>
                    <?php
                        $args = array(
                            'post_type'      => 'blog',
                            'post_status'    => 'publish',
                            'posts_per_page' => 5,
                            'paged'          => $paged,
                        );
                        $postslist = new WP_Query($args);
                        if ( $postslist->have_posts() ) :
                            while ( $postslist->have_posts() ) : $postslist->the_post();
                                $blog_tag = get_the_terms($post->ID, 'blog_tag');
                                if(has_post_thumbnail()){
                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id, true);
                                    $thumb_url = $thumb_url[0];
                                }else{
                                    $thumb_url = esc_url( home_url() )."/assets/img/top/product06.jpg";
                                }
                    ?>
                    <a href="<?php echo get_permalink(); ?>" class="blogPage__newest">
                        <div class="blogPage__newestImg" style="background-image: url(<?php echo $thumb_url; ?>);"></div>
                        <div class="blogPage__newestTxt">
                            <?php
                                $blog_category = get_the_terms($post->ID, 'blog_category');
                                foreach ($blog_category as $category) {
                                    echo '<span class="blogPage__newestCat">'.$category->name.'</span>';
                                }
                            ?>
                            <div class="blogPage__newestDate"><?php echo get_post_time( 'Y.m.d', false, null, false ); ?></div>
                            <p><?php the_title(); ?></p>
                        </div>
                    </a>
                    <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                </dd>
            </dl>
               <div class="blogPage__stickyWrap">
                    <dl>
                        <dt><span>人気記事ランキング</span></dt>
                        <dd>
                            <?php
                                $args = array(
                                    'post_type'      => 'blog',
                                    'post_status'    => 'publish',
                                    'meta_key' => 'post_views_count',
                                    'orderby' => 'meta_value_num',
                                    'order' => 'DESC',
                                    'posts_per_page' => 5,
                                );
                                $postslist = new WP_Query($args);
                                if ( $postslist->have_posts() ) :
                                    while ( $postslist->have_posts() ) : $postslist->the_post();
                                        $blog_tag = get_the_terms($post->ID, 'blog_tag');
                                        if(has_post_thumbnail()){
                                            $thumb_id = get_post_thumbnail_id();
                                            $thumb_url = wp_get_attachment_image_src($thumb_id, true);
                                            $thumb_url = $thumb_url[0];
                                        }else{
                                            $thumb_url = esc_url( home_url() )."/assets/img/top/product06.jpg";
                                        }
                                        $rankingCunt = $postslist->current_post + 1;
                                        if($rankingCunt == 1) {
                                            $class = 'blogPage__rankingNum--one';
                                        }
                                        if($rankingCunt == 2) {
                                            $class = 'blogPage__rankingNum--two';
                                        }
                                        if($rankingCunt == 3) {
                                            $class = 'blogPage__rankingNum--three';
                                        } 
                                        if($rankingCunt >= 4) {
                                            $class = 'blogPage__rankingNum';
                                        }
                            ?>
                            <a href="<?php echo get_permalink(); ?>" class="blogPage__ranking">
                                <span class="<?php echo $class ?>"><?php echo $rankingCunt; ?></span>
                                <div class="blogPage__rankingImg" style="background-image: url(<?php echo $thumb_url; ?>);"></div>
                                <div class="blogPage__rankingTxt">
                                    <?php
                                        $blog_category = get_the_terms($post->ID, 'blog_category');
                                        foreach ($blog_category as $category) {
                                            echo '<span class="blogPage__newestCat">'.$category->name.'</span>';
                                        }
                                    ?>
                                    <div class="blogPage__rankingDate"><?php echo get_post_time( 'Y.m.d', false, null, false ); ?></div>
                                    <p><?php the_title(); ?></p>
                                </div>
                            </a>
                            <?php
                                    endwhile;
                                endif;
                                wp_reset_query();
                            ?>
                        </dd>
                    </dl>
                    <div class="blogPage__sideTag">
                        <?php
                            $blog_tag = get_terms( 'blog_tag', 'hide_empty=0' );
                            foreach ($blog_tag as $tag) {
                                echo '<a href="'.get_term_link($tag).'">'.$tag->name.'</a>';
                            }
                        ?>
                    </div>
                </div>
           </div>
