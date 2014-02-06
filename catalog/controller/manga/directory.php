<?php
class ControllerMangaDirectory extends Controller {

    public function index(){

        $this->load->model('manga/manga');


        if( isset($this->request->get['letter']) ){
            $letter = $this->request->get['letter'];
        }

        $data = array(
            'letter'=> isset($letter) ? $letter : ''
        );


        $directory = $this->model_manga_directory->getDirectory( $data );
        $this->data['directory'] = $this->refactorDirectory( $directory );

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


    public function refactorDirectory( $directory ){

        $directryResult = array();

        foreach( $directory as $key => $dir){
            $title = $dir['title'];
            $firstLetter = substr($title, 0, 1);

            $firstLetter = strtoupper( $firstLetter );
            if( $firstLetter <= 'Z' && $firstLetter >= 'A' ){
                $directryResult[ $firstLetter ][] = $title;
            }

        }

        return $directryResult;


    }


}
?>