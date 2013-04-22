<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shutik
 * Date: 20.04.13
 * Time: 15:16
 * To change this template use File | Settings | File Templates.
 */
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$orders,
));
?>