<?php
class ModelMangaManga extends Model {

    /**
     * 获得相应的漫画列表
     *
     */
    public function getDirectory( $data ){
        $sql = "SELECT
  m.manga_id,
  md.`title`
FROM
  dc_manga AS m
  LEFT JOIN " . DB_PREFIX . "manga_description AS md
    ON m.`manga_id` = md.`manga_id`
WHERE m.`status` = '1'";

        if( !empty($data['letter']) ){
            $sql .= " AND md.`title` LIKE '" . $data['letter'] . "%'";
        }

        $query = $this->db->query( $sql );
        if( $query->num_rows > 0 ){
            return $query->rows;
        }else{
            return array();
        }

    }

}