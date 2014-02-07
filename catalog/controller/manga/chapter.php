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
        $this->load->model('manga/manga');
        $data = array(
            'mangaName' => $mangaName
        );
        $chapters = $this->model_manga_chapter->getChapters( $data );
        $this->data['mangaDesc'] = $this->getMangaDescription( $chapters );
        $this->data['chapters'] = $this->model_manga_chapter->refactorChapter( $chapters );

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/manga/chapter.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/manga/chapter.tpl';
        } else {
            $this->template = 'default/template/manga/chapter.tpl';
        }



        $this->children = array(

            'common/footer',
            'common/header'
        );

        $this->response->setOutput($this->render());

    }

    public function getMangaDescription( $chapters ){

        $mangaDesc = array();
        $chapter = $chapters[0];

        $this->load->model('tool/image');
        $this->load->model('manga/manga');

        if( is_file(DIR_IMAGE . $chapter['image']) ){
            $mangaDesc['image'] = $this->model_tool_image->resize( $chapter['image'], '200', '250');
        }else{
            $mangaDesc['image'] = $this->model_tool_image->resize( DEFAULT_IMAGE, '200', '250');
        }
        $mangaDesc['author'] = $chapter['author'];
        $mangaDesc['status'] = $this->model_manga_manga->getMangaStatus( $chapter['status'] );

        $mangaDesc['title'] = $chapter['manga_title'];
        $mangaDesc['genre'] = $chapter['genre_title'];

        $mangaDesc['chaptersNum'] = '';
        foreach( $chapters as $chapter){
            $mangaDesc['chaptersNum'] .= $chapter['num'] . ',';
        }
        $mangaDesc['chaptersNum'] = rtrim( $mangaDesc['chaptersNum'], ',' );
        $mangaDesc['description'] = html_entity_decode( $chapter['description'] );
        return $mangaDesc;

    }

}
?>