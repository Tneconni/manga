<?php
class ControllerMangaManga extends Controller {

    public function index(){

        $mangaName = '';
        if( isset($this->request->get['manga'])){
            $mangaName = $this->request->get['manga'];
        }else{

            $errorLink = $this->url->link('error/error');
            $this->redirect( $errorLink );

        }

        $chapterNum = '';
        if( isset($this->request->get['chapter'])){
            $chapterNum = $this->request->get['chapter'];
        }else{

            $errorLink = $this->url->link('error/error');
            $this->redirect( $errorLink );

        }

        $page = '';
        if( isset($this->request->get['page'])){

            $page = $this->request->get['page'];

        }else{

            $page = 1;

        }
        $this->data['currentPage'] = $page;

        $this->load->model('manga/manga');
        $sort = array(
            'mangaName'  => $mangaName,
            'mangaId'    => '',
            'chapterNum' => $chapterNum
        );
        $chapter = $this->model_manga_manga->getChapterByManga( $sort );
        $this->data['chapter'] = $this->refactorChapter( $chapter, $page );

        $this->load->library('pagination');
        $pagination = new Pagination();
        $pageData = array(
            'action' => 'manga/manga',
            'param' => array(
                'manga'   => $mangaName,
                'chapter' => $chapterNum
            ),
            'count' => $this->data['chapter']['imageCount'],
            'currentPage' => $page
        );
        $this->data['pages'] = $pagination::getPage( $pageData );

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/manga/manga.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/manga/manga.tpl';
        } else {
            $this->template = 'default/template/manga/manga.tpl';
        }

        $this->children = array(
            'common/column_left',
            'common/footer',
            'common/header'
        );

        $this->response->setOutput($this->render());

    }


    public function refactorChapter( &$chapter, $page ){
        $file = '';
        if( !empty( $chapter )){
            $file = DIR_IMAGE . 'data/'.$chapter['title'] .'/';
        }
        //便利该文件夹下的图片
        $path = DIR_IMAGE . 'data/' . $chapter['title'] . '/' . $chapter['num'] . '/*.jpg';

        $files = glob( $path );

        $chapter['imageCount'] = count( $files );

        $this->load->model('tool/image');
        if ($files) {
            foreach($files as $file) {
                $extension = basename($file, '.jpg');
                if( intval($page) - 1 == $extension ){
                    $staticPath = 'data/' . $chapter['title'] . '/' . $chapter['num'] . '/' . $extension . '.jpg';
                    $chapter['image'] = $this->model_tool_image->resize( $staticPath, '750', '500');
                }
            }

        }

        return $chapter;
    }


}