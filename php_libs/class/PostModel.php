<?php

/**
 * Contents: PostModel.php
 * Feature: 掲示板ページ DB操作
 * @author r0719en@pluslab.org
 */

class PostModel extends BaseModel {

    // 掲示板に投稿
    public function post($title, $name, $body) {
        try {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO post (date, title, name, body) VALUES (:date, :title, :name, :body)";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':date', date("Y-m-d H:i:s"), PDO::PARAM_STR);
            $stmh->bindValue(':title', $title, PDO::PARAM_STR);
            $stmh->bindValue(':name', $name, PDO::PARAM_STR);
            $stmh->bindValue(':body', $body, PDO::PARAM_STR);
            $stmh->execute();
            $this ->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            print "エラー：" . $Exception->getMessage();
        }
    }

    // 掲示板データの取得
    public function fetch_data() {
        try {
            $sql = "SELECT * FROM post ORDER BY date DESC";
            $stmh = $this->pdo->prepare($sql);
            $stmh->execute();
            //$data = $stmh->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        
        $data = array();
        while ($bbs = $stmh->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $bbs;
        }
        //echo var_dump($data);
    
        return $data;
    }
    
}