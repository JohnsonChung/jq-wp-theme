<?php

/*-----------------------------------------------------------------------------------*/
/* �G���g���[
/*-----------------------------------------------------------------------------------*/
function my_exam_validation_rule( $Validation, $data, $Data ) {
    $Validation->set_rule( 'year', 'noEmpty', array( 'message' => '���N�����̔N��I�����Ă��������B' ) );
    $Validation->set_rule( 'month', 'noEmpty', array( 'message' => '���N�����̌���I�����Ă��������B' ) );
    $Validation->set_rule( 'day', 'noEmpty', array( 'message' => '���N�����̓���I�����Ă��������B' ) );
    $Validation->set_rule( 'name', 'noEmpty', array( 'message' => '�����O����͂��Ă��������B' ) );
    $Validation->set_rule( 'tel', 'noEmpty', array( 'message' => '�d�b�ԍ�����͂��Ă��������B' ) );
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-308', 'my_exam_validation_rule', 10, 3 );

?>