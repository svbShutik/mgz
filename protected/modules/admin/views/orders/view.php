
<?php
if(isset($user)) {
    $this->renderPartial('_user') ;
} elseif(isset($guest)) {
    $this->renderPartial('_guest') ;
}
?>