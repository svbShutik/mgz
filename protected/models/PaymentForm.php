<?php

class PaymentForm extends CFormModel
{
    public $order;

    public function rules() {
        return array(
            array('order', 'required'),
            array('order', 'numerical', 'integerOnly'=>true, 'message'=>'<strong>Внимание.</strong> Указаное значение не является номером заказа.'),
        );
    }

    /*public function safeAttributes() {
        return array('order',);
    }*/

}