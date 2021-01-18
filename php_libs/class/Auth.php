<?php

/**
 * Contents: Auth.php
 * Feature: 認証
 * @author r0719en@pluslab.org
 */

class Auth {

    private $authname; // 認証情報の格納先名
    private $sessname; // セッション名

    public function __construct() {

    }

    public function set_authname($name) {
        $this->authname = $name;
    }
    
    public function get_authname() {
        return $this->authname;
    }

    public function set_sessname($name) {
        $this->sessname = $name;
    }
    
    public function get_sessname() {
        return $this->sessname;
    }

    // セッション情報の確認
    public function start() {
        // セッションが既に開始している場合は何もしない
        if (session_status() ===  PHP_SESSION_ACTIVE) {
            return;
        }
        if ($this->sessname != "") {
            session_name($this->sessname);
        }
        // セッション開始
        session_start();
    }

    // 認証情報の確認
    public function check() {
        if (!empty($_SESSION[$this->get_authname()]) && $_SESSION[$this->get_authname()]['id'] >= 1) {
            // 20分以上経過した場合は、自動ログアウト処理を実行
            if (!empty($_SESSION[$this->get_authname()]['logintime'])) {
                if (time() >= $_SESSION[$this->get_authname()]['logintime'] + 20 * 60) {
                    $this->logout();
                    return false;
                }
            }
            return true;
        }
    }

    // パスワードのハッシュ化
    public function get_hashed_password($password) {
        $cost = 10; // コストパラメータ (04 ~ 31)
        $salt = strtr(base64_encode(random_bytes(16)), '+', '.'); // ランダムな文字列を生成
        $salt = sprintf("$2y$%02d$", $cost) . $salt; // ソルトを生成
        $hash = crypt($password, $salt); // 文字列のハッシュ化
        
        return $hash;
    }
    
    // 認証処理
    public function check_password($password, $hashed_password) {
        // パスワードが一致したらtrueを返す
        if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
            return true;
        }
    }
    
    // 認証情報の取得
    public function auth_ok($userdata) {
        session_regenerate_id(true);
        $_SESSION[$this->get_authname()] = $userdata;
        $_SESSION[$this->get_authname()]['logintime'] = time(); // auth_okメソッドによって認証が通った場合にセッション変数logintimeに今の時間を保存
    }

    // 認証失敗時
    public function auth_no() {
        return 'ユーザ名かパスワードが間違っています。'."\n";
    }
    
    // 認証情報を破棄
    public function logout(){

		$_SESSION = []; // セッション変数を空にする

        // クッキーを削除
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // セッションを破壊
        session_destroy();
    }
    
}
