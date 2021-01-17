<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NoticeModel
 *
 * @author nagatayorinobu
 */
class NoticeModel extends BaseModel {
    public function get_notice_data_id($id){
        $data = [];
        try {
            $sql= "SELECT * FROM notice WHERE id = :id limit 1";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':id', $id, PDO::PARAM_INT );
            $stmh->execute();
            $data = $stmh->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return $data;
    }

    public function modify_notice($notice_data){
        try {
            $this->pdo->beginTransaction();
            $sql = "UPDATE  notice 
                    SET 
                        subject = :subject, 
                        body = :body, 
                        reg_date = now() 
                    WHERE id = :id";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':subject',$notice_data['subject'], PDO::PARAM_STR );
            $stmh->bindValue(':body',   $notice_data['body'],    PDO::PARAM_STR );
            $stmh->bindValue(':id',     $notice_data['id'],      PDO::PARAM_INT );
            $stmh->execute();
            $this->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            print "エラー：" . $Exception->getMessage();
        }
    }    
    
}
