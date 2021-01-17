<?php
/* 編集済み */

/**
 * Description of KenModel
 *
 * @author nagatayorinobu
 */
class KenModel extends BaseModel {
    //----------------------------------------------------
    // 県名の取得
    //----------------------------------------------------
    /*** Checked by Ren ***/
    public function get_ken_data(){
        $ken_array = [];
        try {
            $sql= "SELECT * FROM ken";
            $stmh = $this->pdo->query($sql); // プリペアドステートメント(prepareメソッド)を使用しない場合、queryメソッドを使用する
            while ($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                $ken_array[$row['id']] = $row['ken'];
            }

        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return $ken_array;
    }
}
