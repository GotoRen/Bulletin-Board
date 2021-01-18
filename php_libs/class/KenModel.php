<?php

/**
 * Contents: KenModel.php
 * Feature: 県 DB操作
 * @author r0719en@pluslab.org
 */

class KenModel extends BaseModel {
    
    // 県名リストの取得
    public function get_ken_data() {

        $ken_array = [];
        
        try {
            $sql= "SELECT * FROM ken";
            $stmh = $this->pdo->query($sql);
            while ($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                $ken_array[$row['id']] = $row['ken'];
            }

        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return $ken_array;
    }
    
}
