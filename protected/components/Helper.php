<?php
class Helper
{
    static public $active_list = array(
        0=>'Неактивно',
        1=>'Активно',
    ) ;

    static public $payment_list = array(
        '0'=>'<div class="red">Не оплачен</div>',
        '1'=>'<div class="green"><strong>Оплачен</strong></div>',
        '2'=>'Оплата при получении',
        '3'=>'Отменен',
        '4'=>'В обработке',
    ) ;

    static public function getPaymentList($id) {
        return Helper::$payment_list[$id] ;
    }

    static public function getActiveList($id) {
        return Helper::$active_list[$id] ;
    }

    //рекурсивное удаление директории вместе с содержимым
    static function removeDirectory($dir) {
        if ($objs = glob($dir."/*")) {
            foreach($objs as $obj) {
                is_dir($obj) ? Helper::removeDirectory($obj) : unlink($obj);
            }
        }
        rmdir($dir);
    }
}
