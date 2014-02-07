<?php
class ModelMangaChapter extends Model {

    /**
     * 获得章节目录
     * @return array
     */
    public function getChapters( $data = array() ){

        $sql = "SELECT
  cpt.`chapter_id`,
  mg.`image`,
  mg.`status`,
  cpt.`num`,
  cptd.`title` AS chapter_title,
  cpt.`date_added` AS create_date,
   mgd.`title` AS manga_title,
   mgd.`description`,
   mgd.`author`,

   GROUP_CONCAT(gend.`title`) AS genre_title
FROM
  " . DB_PREFIX . "chapter AS cpt
  LEFT JOIN " . DB_PREFIX . "chapter_description AS cptd
      ON cpt.`chapter_id`=cptd.`chapter_id`

  LEFT JOIN " . DB_PREFIX . "manga AS mg
    ON cpt.`manga_id` = mg.`manga_id`

LEFT JOIN " . DB_PREFIX . "manga_description AS mgd
    ON mg.`manga_id`=mgd.`manga_id`

    LEFT JOIN " . DB_PREFIX . "manga_to_genre AS mtg
    ON mtg.`manga_id` = mg.`manga_id`

    LEFT JOIN " . DB_PREFIX . "genre AS gen
    ON gen.`genre_id`=mtg.`genre_id`

    LEFT JOIN " . DB_PREFIX . "genre_description AS gend
    ON gend.`genre_id`=gen.`genre_id`";

    if( !empty($data['mangaName']) ){
        $sql .= " where mgd.title='" . $data['mangaName'] . "' ";
    }


    $sql .= " GROUP BY cpt.`chapter_id`
ORDER BY cpt.date_added DESC ";

        $query = $this->db->query( $sql );
        if( $query->num_rows > 0){
            return $query->rows;
        }else{
            return array();
        }
    }

    /**
     * 通过漫画名称获得 章节
     */
    public function getChapterByManga( $data ){

        $sql = "SELECT
  c.num,
  cd.title
FROM
  " . DB_PREFIX . "chapter AS c
  LEFT JOIN " . DB_PREFIX . "chapter_description AS cd
    ON c.`chapter_id` = cd.`chapter_id`
  LEFT JOIN " . DB_PREFIX . "manga AS m
    ON m.`manga_id` = c.`manga_id`
  LEFT JOIN " . DB_PREFIX . "manga_description AS md
    ON md.`manga_id` = m.`manga_id`
WHERE md.`title` = '" . $data['manga'] . "'
ORDER BY c.`date_added` DESC ;";
        $query = $this->db->query( $sql );
        if( $query->num_rows > 0){
            return $query->rows;
        }else{
            return array();
        }


    }

    /**
     * 格式化数据
     */
    public function refactorChapter( $chapters ){
        $this->load->model('tool/image');
        foreach($chapters as $key=>$chapter ){

            $timeAgo = time() - strtotime( $chapter['create_date']);
            $chapters[$key]['timeAgo'] = date('H', $timeAgo) .' hours';

            if( is_file(DIR_IMAGE . $chapter['image']) ){
                $chapters[$key]['image'] = $this->model_tool_image->resize( $chapter['image'], 50, 100);
            }else{
                $chapters[$key]['image'] = $this->model_tool_image->resize( DEFAULT_IMAGE, 100, 100);

            }
            $chapters[$key]['href'] = $this->url->link('manga/manga', 'manga=' . $chapter['manga_title'] . '&chapter=' . $chapter['num']);
        }
        return $chapters;

    }
}




