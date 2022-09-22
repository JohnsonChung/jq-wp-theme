<?php

/*-----------------------------------------------------------------------------------*/
/* エントリー
/*-----------------------------------------------------------------------------------*/
function my_exam_validation_rule( $Validation, $data, $Data ) {
    $Validation->set_rule( 'year', 'noEmpty', array( 'message' => '生年月日の年を選択してください。' ) );
    $Validation->set_rule( 'month', 'noEmpty', array( 'message' => '生年月日の月を選択してください。' ) );
    $Validation->set_rule( 'day', 'noEmpty', array( 'message' => '生年月日の日を選択してください。' ) );
    $Validation->set_rule( 'name', 'noEmpty', array( 'message' => 'お名前を入力してください。' ) );
    $Validation->set_rule( 'tel', 'noEmpty', array( 'message' => '電話番号を入力してください。' ) );
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-308', 'my_exam_validation_rule', 10, 3 );

?>