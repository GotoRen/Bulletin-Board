# Bulletin-Board
## ✏️ Name
<img alt="タイトル" width="700" src="https://user-images.githubusercontent.com/63791288/105495061-0974d680-5cff-11eb-9a29-3dc96741d879.png" />

## 💡 Overview
- 2020後期 Webプログラミング及び演習 自由課題 として掲示板（なんちゃって2ch）アプリを制作
- ユーザ登録と掲示板への書き込み、みんなの投稿を見ることができる
  - ユーザはサインアップまたはサインインによりサービスを利用  
- 掲示板の管理人はサイト全体の管理（掲示板への全体通知メッセージの投稿、会員全体の情報を管理、編集など）ができる

## 📝 Description
- 環境
  - XAMPP（MAMP） + Apache Web Server + MariaDB（MySQL）
    - XAMPP: 7.4.9-0
    - PHP: 7.4.9
    - Server version: 10.4.14-MariaDB
    - Smarty version: 3.1.30
  - WHOAMI：`localhost`
  - Loopback ADDR：`127.0.0.1`
- DB構築
  - `/Applications/XAMPP/xamppfiles/bin`配下
  - `$ mysql -u root -p`  
    - ユーザ：root
    - パスワード：password
  - データベース
    - `create database bulletin_db character set utf8 collate utf8_general_ci;`
  - テーブル
    - 会員テーブル
      ```sql
      CREATE TABLE member (
          id          MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
          username    VARCHAR(50),
          password    VARCHAR(128),
          last_name   VARCHAR(50),
          first_name  VARCHAR(50),
          birthday    CHAR(8),
          ken         SMALLINT,
          reg_date    DATETIME,
          cancel      DATETIME,
          PRIMARY KEY(id)
      );
      ```    
    - 仮会員テーブル
      ```sql
      CREATE TABLE premember (
          id          MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
          username   	VARCHAR(50),
          password   	VARCHAR(128),
          last_name  	VARCHAR(50),
          first_name  VARCHAR(50),
          birthday   	CHAR(8),
          ken         SMALLINT,
          link_pass  	VARCHAR(128),
          reg_date   	DATETIME,
          PRIMARY KEY (id)
      );
      ```    
    - 管理者テーブル
      ```sql
      CREATE TABLE system (
          id          MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
          username   	VARCHAR(50),
          password   	VARCHAR(128),
          PRIMARY KEY (id)
      );
      ```    
    - 通知メッセージ
      ```sql
      CREATE TABLE notice (
          id          MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
          subject   	VARCHAR(256),
          body   	    TEXT,
          reg_date   	DATETIME,
          PRIMARY KEY (id)
      );
      ```   
    - 県管理テーブル
      ```sql
      CREATE TABLE ken (
          id          SMALLINT,
          ken         VARCHAR(10),
          PRIMARY KEY (id)
      );
      ```    
    - 掲示板投稿管理テーブル
      ```sql
      CREATE TABLE post (
          title       TEXT NOT NULL,
          date        DATATIME NOT NULL,
          name        TEXT NOT NULL,
          body        TEXT NOT NULL
      );
      ```
- DB接続
  ```php
  <?php
  
  class BaseModel {
  
      protected $pdo;
              
      public function __construct() {
          $this->db_connect();
      }
  
      //----------------------------------------------------
      // データベース接続
      //----------------------------------------------------
      private function db_connect() {
          try {
            $this->pdo = new PDO(_DSN, _DB_USER, _DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          } catch(PDOException $Exception) {
            die('エラー :' . $Exception->getMessage());
          }
      }  
      
  }
  ```