<?php
    acf_form_head();
    echo '
    <div id="poststuff">
        <div class="wrap">
            <h1 class="wp-heading-inline">店舗検索　CSVインポート</h1>
            <div id="edit-slug-box" class="hide-if-no-js"></div>
            <div class="postbox  acf-postbox">
                <h2 class="hndle ui-sortable-handle"><span>インポート</span></h2>
                <div class="inside acf-fields -top">
                    <div class="acf-field acf-field-group acf-field-5eddfb0c5786b">
                        <div class="acf-input">
                            <div class="acf-fields -top -border">
                                <div class="acf-field acf-field-file acf-field-5eddfb0c5786c" >
                                    <div class="acf-label"> <label for="acf-field_5eddfb0c5786b-field_5eddfb0c5786c">CSVファイル</label></div>
                                    <div class="acf-input">
                                        <form id="form" class="form_wrap" action="./edit.php?post_type=service-station&page=csv_service_station" method="POST" enctype="multipart/form-data">
                                            <input type="file" name="csv_file">
                                            <input type="hidden" name="key" value="00000000">
                                            <input type="submit" value="インポート" class="button button-primary button-large">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';

    //インサート処理
    $csv_datal['service_station'] =  array();

    if (is_uploaded_file($_FILES["csv_file"]["tmp_name"])) {
        $file_tmp_name = $_FILES["csv_file"]["tmp_name"];
        $file_name = $_FILES["csv_file"]["name"];
        if (pathinfo($file_name, PATHINFO_EXTENSION) != 'csv') {
            $err_msg = 'CSVファイルのみ対応しています。';
        } else {
            if (($file_data = file_get_contents($_FILES["csv_file"]["tmp_name"], "r")) !== false) {

                // CSVインポートファイルの文字エンコード
                $file_data = mb_convert_encoding($file_data, 'UTF-8', 'SJIS-win');
                // 名前をランダム
                $filename = $_FILES["csv_file"]["name"];
                // 保存するディレクトリ
                $import_csv = dirname(__FILE__)."/../../../csv/" .  $filename . '.csv';
                // ファイルの書き込み
                file_put_contents($import_csv, $file_data);
                chmod($import_csv, 0644);
                // ファイル読み込み
                $handle = fopen($import_csv, "r");
                // 変数の初期化
                $num = 1;
                $flag = false;
                // validateの切り替え（インポート用）
                // $this->Performance->validate = $this->Performance->validate_import;
                // CSVファイルの読み込み
                setlocale(LC_ALL,'ja_JP.UTF-8');
                
                while (($data = fgetcsv($handle)) !== false) {

                    // 1行目を無視
                    if ($flag == false) {
                        $flag = true;
                        continue;
                    }
                    $array['title']                = $data[0]; //タイトル
                    $array['category']             = $data[1]; //カテゴリー
                    $array['postalCode']           = $data[2]; //郵便番号
                    $array['address']              = $data[3]; //住所
                    $array['googlemap']            = $data[4]; //GoogleMap
                    $array['routeUpToStore']       = $data[5]; //店舗までのルートURL
                    $array['tel']                  = $data[6]; //電話番号
                    $array['businessHours']        = $data[7]; //営業時間
                    $array['regularHoliday']       = $data[8]; //定休日
                    $array['storeStyle']           = $data[9]; //店舗形態
                    $array['handlingService']      = $data[10]; //取扱サービス
                    $array['creditCard']           = $data[11]; //クレジットカード
                    $array['ENEOS_PLICA_QUO_card'] = $data[12]; //ENEOSプリカ／QUOカード
                    $array['corporateCard']        = $data[13]; //法人カード
                    $array['enekey']               = $data[14]; //EneKey/スピードパス/トクタスメール
                    $array['e-money']              = $data[15]; //電子マネー
                    $array['tCard']                = $data[16]; //Tカード
                    $array['note']                 = $data[17]; //備考


                    array_push($csv_datal['service_station'], $array);

                    $num++;
                }
                fclose($handle);
                unlink($import_csv);           
            }
        }
        foreach ($csv_datal['service_station'] as $i => $csv_data) {
            $post_value = array(
                'post_type'   => 'service-station',
                'post_title'  => $csv_data['title'],// 投稿のタイトル。
                'post_status' => 'publish' // 非公開（private）/下書き（draft）/承認待ち (pending)
            );
            $input_id = wp_insert_post($post_value);

            if($input_id != 0){
                $category = explode(",", $csv_data['category']);
                wp_set_post_terms($input_id, $category, 'prefectures');
                
                update_post_meta($input_id, 'postalCode', $csv_data['postalCode']);
                update_post_meta($input_id, 'address', $csv_data['address']);
                update_post_meta($input_id, 'googlemap', $csv_data['googlemap']);
                update_post_meta($input_id, 'routeUpToStore', $csv_data['routeUpToStore']);
                update_post_meta($input_id, 'tel', $csv_data['tel']);
                update_post_meta($input_id, 'businessHours', $csv_data['businessHours']);
                update_post_meta($input_id, 'regularHoliday', $csv_data['regularHoliday']);
                update_post_meta($input_id, 'storeStyle', $csv_data['storeStyle']);
                update_post_meta($input_id, 'handlingService', $csv_data['handlingService']);

                $creditCard = explode(",", $csv_data['creditCard']);
                update_field('paymentMethods_creditCard', $creditCard, $input_id);

                update_post_meta($input_id, 'paymentMethods_ENEOS_PLICA_QUO_card', $csv_data['ENEOS_PLICA_QUO_card']);

                $corporateCard = explode(",", $csv_data['corporateCard']);
                update_field('paymentMethods_corporateCard', $corporateCard, $input_id);

                $enekey = explode(",", $csv_data['enekey']);
                update_field('paymentMethods_enekey', $enekey, $input_id);

                $e_money = explode(",", $csv_data['e-money']);
                update_field('paymentMethods_e-money', $e_money, $input_id);

                $tCard = explode(",", $csv_data['tCard']);
                update_field('paymentMethods_tCard', $tCard, $input_id);

                update_post_meta($input_id, 'paymentMethods_note', $csv_data['note']);
            }
        }
        if(empty($err_msg)){
            echo 'インポート完了';
        }
    }
?>