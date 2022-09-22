<?php
get_header();
?>
<style>
  .premium__detailsText span a:not(:last-child)::after {
    content: '、';
    white-space: nowrap;
    text-decoration: none;
    display: inline-block;
    margin-right: -0.5rem;
  }

  .premium__detailsText>span>span:first-child {
    white-space: nowrap;
  }

  .carWashBox--textMiddle {
    margin-right: 120px;
    padding: 0 125px 125px;
    max-width: 102rem;
    margin: 0 auto;
  }

  @media screen and (max-width: 1100px) and (min-width: 768px){
    .carWashBox--textMiddle {
      padding: 0 45px 125px;
    }
  }
  
</style>
<div class="contentWrapper carWashPage">
  <div class="underHead alone">
    <h1 class="underHead__text"><span>ドライブスルー洗車</span></h1>
  </div>
  <!-- header -->
  <nav class="pnkz">
    <ul class="pnkz__list">
      <li><a href="<?php echo get_home_url(); ?>"><img src="<?php echo out_file_dir() ?>/assets/img/icon_home.svg" alt="HOME"></a></li>
      <li>ドライブスルー洗車</li>
    </ul>
  </nav>
  <div class="contentMain">
    <?php if (have_rows('services_test', 'acf_options_carwash_test')) : ?>
      <?php while (have_rows('services_test', 'acf_options_carwash_test')) : the_row();
        $service = get_sub_field('service');
        $image = get_sub_field('image');
        $index = get_row_index();
      ?>
        <section class="
      <?php
        if (!$image) {
          echo 'carWashBox--textMiddle';
        } else if ($service['image_positioning'] === "image_left") {
          echo 'carWashBox--textLeft';
        } else {
          echo 'carWashBox--textRight';
        }
      ?> 
      ">
          <?php
          if ($image) {
            echo '<img class="carWashBox__photo" src="' . esc_url($image) . '" alt="">';
          }
          ?>
          <div class="pickBox">
            <div class="pickBox__head">
              <span class="pickBox__headNum"><?php echo $service['header']; ?></span>
              <h2 class="pickBox__headTitle"><?php echo $service['title']; ?></h2>
            </div>
            <div class="pickBox__details">
              <p class="pickBox__detailsText">
                <?php echo $service['content']; ?>
              </p>
            </div>
          </div>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>

    <section class="carWashBox--premium">
      <!-- ACF Hero Slogen -->
      <?php
      $hero = get_field('hero_slogen_test', 'acf_options_carwash_test');
      if ($hero) : ?>
        <div class="premium__head" style="
      <?php
        if ($hero['image']) {
          echo  "background: no-repeat center rgba(0, 0, 0, .45) url('" . esc_url($hero['image']) . "');";
          echo  "background-blend-mode: darken;";
          echo  "background-size: cover;";
        }
      ?>">
          <h2><?php echo $hero['header']; ?></h2>
          <p>
            <?php echo $hero['content']; ?>
          </p>
        </div>
      <?php endif; ?>

      <!-- ACF repeater premium part -->
      <div class="premium__main">
        <?php if (have_rows('premium_single_test', 'acf_options_carwash_test')) : ?>
          <?php while (have_rows('premium_single_test', 'acf_options_carwash_test')) : the_row();
            $provider_image = get_sub_field('provider_image') ?: 404;
            $store_objs = get_sub_field('store_obj') ?: (object)[];
            $information = get_sub_field('information');
            $store_by_city = (object)[];
            
            foreach ($store_objs as $store) {
              $city = get_the_terms($store, 'prefectures')[0]->name;
              isset($store_by_city->$city) ?
                array_push($store_by_city->$city, $store) : $store_by_city->$city = array($store);
            }
          ?>
            <div class="premium__single">
              <div class="premium__photo">
                <img src="<?php echo wp_get_attachment_url($provider_image); ?>">
                <p>
                  <?php echo $information['image_caption']; ?>
                </p>
              </div>
              <div class="premium__details">
                <p class="premium__detailsTitle">
                  <?php echo $information['service_title'];

                  ?>
                </p>
                <p class="premium__detailsList">
                  <?php echo $information['services']; ?>
                </p>
                <p class="premium__detailsTitle">ご利用できる店舗</p>
                <p class="premium__detailsText">

                  <?php foreach ($store_by_city as $city => $stores) : ?>
                    <span>
                      <span><?php echo '【' . $city . '】' ?></span>
                      <span>
                        <?php foreach ($stores as $store) : ?>
                          <a href="<?php echo  esc_url('\/service-station/' . $store->post_title); ?>"><?php echo $store->post_title ?>店</a>
                        <?php endforeach; ?>
                      </span>
                    </span>
                  <?php endforeach; ?>

                </p>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </section>

  </div>
</div>
<?php
get_footer();
?>