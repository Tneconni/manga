<?php  
class ControllerProductProduct extends Controller {
	private $error = array(); 
	
	public function index() {

        $this->document->setTitle('The detail page');

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/product.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/product/product.tpl';
        } else {
            $this->template = 'default/template/product/product.tpl';
        }

        $this->children = array(
            'common/column_left',
            'common/column_right',
            'common/content_top',
            'common/content_bottom',
            'common/footer',
            'common/header'
        );

        $this->response->setOutput($this->render());

  	}
}
?>