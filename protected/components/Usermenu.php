<?php
class Usermenu extends CWidget {

    public $items = array() ;
    public $htmlOptions = array() ;

	public function run(){
        $this->renderMenu($this->items) ;
	}

    protected function renderMenu($items){
        if(count($items)) {
            echo "<div class='well' style='padding: 5px;'>" ;
            $this->renderItems($items) ;
            echo "</ul>" ;
        }
    }

    protected function renderItems($items) {
        foreach($items as $item) {
            echo CHtml::link($item['label'], $item['url'], $this->htmlOptions) ;
        }
    }
}
?>