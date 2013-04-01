<?php
class catalog_menu extends CWidget {

	public $data ;
	
	public function run(){
        $params = array() ;
        if(isset($_GET['cid'])) {
            $root = Category::model()->loadModel($_GET['cid']) ;
            if(!$root->isRoot()) {
                $parent = $root->parent()->find() ;
                $back = $parent->id ;
            } else {
                $back = "root" ;
            }
            $params = array('back'=>$back) ;
        }

        $params = $params + array('data'=>$this->data) ;

		$this->render('catalog_menu', $params) ;
	}
}
?>