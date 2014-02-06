<?php
class ModelMangaManga extends Model {

    /**
     * 获得热门漫画
     *
     */
    function getHotComics(){

        $sql = "SELECT m.manga_id, md.title, m.sort_order, m.image FROM " . DB_PREFIX . "manga AS m
        LEFT JOIN " . DB_PREFIX . "manga_description AS md
        ON m.manga_id = md.manga_id";

        $query = $this->db->query( $sql );
        if( $query->num_rows > 0){
            return $query->rows;
        }else{
            return array();
        }
    }

    /**
     * 根据条件 搜索
     * @param array $sorts(order, orderType)
     * @param array $limit(start, num)
     * @return array
     */
    function getComics( $sorts = null, $limit = null){

        $sql = "SELECT m.manga_id, md.title, m.sort_order FROM " . DB_PREFIX . "manga AS m
        LEFT JOIN " . DB_PREFIX . "manga_description AS md
        ON m.manga_id = md.manga_id";

        if( !empty( $sorts ) ){

            $sql .= " order by " . $sorts['order'] . ' ' . $sorts['orderType'];
        }

        if( !empty( $limit )){
            $sql .= " limit " . $limit['start'] . ', ' .$limit['num'];
        }


        $query = $this->db->query( $sql );
        if( $query->num_rows > 0){
            return $query->rows;
        }else{
            return array();
        }

    }

    /**
     * 通过 漫画名称 (或者漫画id)，章节号 获得章节
     *
     */
    public function getChapterByManga( $sort ){
        if( !empty($sort['mangaId'])){
            $sql = "SELECT
  c.*,
  md.`title` as `title`
FROM
  " . DB_PREFIX . "chapter AS c
  LEFT JOIN " . DB_PREFIX . "manga AS m
    ON c.`manga_id` = m.`manga_id`
  LEFT JOIN " . DB_PREFIX . "manga_description AS md
    ON m.`manga_id` = md.`manga_id`
    WHERE m.`manga_id`='" . $sort['mangaId'] . "' AND c.`num`='" . $sort['chapterNum'] . "' AND m.status='1'";
        }else{
            $sql = "SELECT
  c.*,
  md.`title` as `title`
FROM
  " . DB_PREFIX . "chapter AS c
  LEFT JOIN " . DB_PREFIX . "manga AS m
    ON c.`manga_id` = m.`manga_id`
  LEFT JOIN " . DB_PREFIX . "manga_description AS md
    ON m.`manga_id` = md.`manga_id`
    WHERE md.`title`='" . $sort['mangaName'] . "' AND c.`num`='" . $sort['chapterNum'] . "' AND m.status='1'";
        }

        $query = $this->db->query( $sql );
        if( $query->num_rows > 0){
            return $query->row;
        }else{
            return array();
        }

    }

}
?>