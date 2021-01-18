<?php

/**
 * Contents: SystemModel.php
 * Feature: 管理者ページ DB操作
 * @author r0719en@pluslab.org
 */

class SystemModel extends BaseModel {
    
    // 管理者情報の検索（ユーザ名 a.k.a メールアドレス）
    public function get_authinfo($username) { // $username = メールアドレス
        $data = [];
        try {
            $sql= "SELECT * FROM system WHERE username = :username limit 1";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':username',  $username,  PDO::PARAM_STR );
            $stmh->execute();
            $data = $stmh->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return $data;
    }
    
}
