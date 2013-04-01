<?php
class cart extends CWidget {

	public function run(){
        Yii::app()->clientScript->registerScript(
            'cartTips',
            '$("html").click(function() {
                $("#cartLink").popover("hide");
             });',
            CClientScript::POS_READY
        ) ;

		$this->render('cart') ;
	}
}
?>