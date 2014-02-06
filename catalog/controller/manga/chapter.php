<?php
class ControllerMangaChapter extends Controller {

    public function index(){

        if( isset($this->request->get['manga']) ){
            $mangaName = $this->request->get['manga'];
        }else{
            $url = $this->url->link('error/not_found');
            $this->redirect( $url );
        }

        $this->load->model('manga/chapter');
        $data = array(
            'manga' => $mangaName
        );
        $this->data['chapters'] = $this->model_manga_chapter->getChapterByManga( $data );
        print_r( $this->data['chapters'] );

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/manga/chapter.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/manga/chapter.tpl';
        } else {
            $this->template = 'default/template/manga/chapter.tpl';
        }



        $this->children = array(
            'common/column_left',
            'common/footer',
            'common/header'
        );

        $this->response->setOutput($this->render());

    }


}
?>