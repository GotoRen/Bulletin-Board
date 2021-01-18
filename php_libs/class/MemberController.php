<?php

/**
 * Contents: MemberController.php
 * Feature: 会員ページ操作
 * @author r0719en@pluslab.org
 */

class MemberController extends BaseController {
    
    //----------------------------------------------------
    // 会員用メニュー
    //----------------------------------------------------
    public function run() {
        // セッション開始
        $this->auth = new Auth();
        $this->auth->set_authname(_MEMBER_AUTHINFO);
        $this->auth->set_sessname(_MEMBER_SESSNAME);
        $this->auth->start();

        if ($this->auth->check()) {
            // 認証済み
            $this->menu_member();
        } else {
            // 未認証
            $this->menu_guest();
        }
    }

    // 会員用メニュー
    public function menu_member() {
        switch ($this->type) {
            case "logout":
                $this->auth->logout();
                $this->screen_login();
                break;
            case "modify":
                $this->screen_modify();
                break;
            case "delete":
                $this->screen_delete();
                break;
            default:
                $this->screen_top();
        }
    }

    // ゲスト用メニュー
    public function menu_guest() {
        switch ($this->type) {
            case "regist":
                $this->screen_regist();
                break;
            case "authenticate":
                $this->do_authenticate();
                break;
            default:
                $this->screen_login();
        }
    }
    
    // ログイン画面表示
    public function screen_login() {
        $this->form->addElement('text', 'username',     ['size' => 15, 'maxlength' => 50], [ 'label' => 'ユーザ名']);
        $this->form->addElement('password', 'password', ['size' => 15, 'maxlength' => 50], [ 'label' => 'パスワード']);
        $this->form->addElement('submit', 'submit', ['value' =>'ログイン']);
        $this->title = 'ログイン画面';
        $this->next_type = 'authenticate';
        $this->file = "login.tpl";
        $this->view_display();
    }

    // ログイン処理
    public function do_authenticate() {

        // DB参照
        $MemberModel = new MemberModel();
        $userdata = $MemberModel->get_authinfo($_POST['username']);

        if (!empty($userdata['password']) && $this->auth->check_password($_POST['password'], $userdata['password'])) {
            $this->auth->auth_ok($userdata);
            $this->screen_top();
        } else {
            $this->auth_error_mess = $this->auth->auth_no();
            $this->screen_login();
        }
    }

    // トップ画面
    public function screen_top() {

        // 通知機能を表示
        $NoticeModel = new NoticeModel;
        $noticedata = $NoticeModel->get_notice_data_id('1');
        $this->view->assign('subject', $noticedata['subject']);
        $this->view->assign('body',    $noticedata['body']);
        $this->view->assign('reg_date',$noticedata['reg_date']);

        // メッセージを表示（時間帯によって変更）
        $hour = date("H");
        if ($hour >= 0 && $hour < 10 ) {
            $this->message = 'おはようございます。今日も一日頑張りましょう！';
        } else if ($hour >= 10 && $hour < 18) {
            $this->message = 'こんにちは。元気にお過ごしですか？';
        } else {
            $this->message = 'こんばんは。今日も一日お疲れ様でした...';
        }

        // 掲示板投稿画面
        $PostModel = new PostModel();

        $title = $_POST['title'];
        $name = $_POST['name'];
        $body = $_POST['body'];
        $error_message = array();

        if (isset($_POST['save'])) {
            if (!strlen($_POST['title'])) {
                $error_message[] = "タイトルが未入力です。";
            }
            if (!strlen($_POST['body'])) {
                $error_message[] = "本文を入力してください。";
            }
            if (!count($error_message)) {
                $PostModel->post($title, $name, $body); // 投稿DB操作
            }
        }

        // 掲示板データの取得
        $bbs_list = $PostModel->fetch_data();
        
        $this->view->assign('last_name', $_SESSION[_MEMBER_AUTHINFO]['last_name']);
        $this->view->assign('first_name', $_SESSION[_MEMBER_AUTHINFO]['first_name']);
        $this->view->assign("error_message", $error_message);
        $this->view->assign("bbs_list", $bbs_list);
        $this->title = '会員トップ画面';
        $this->file = 'member_top.tpl';
        $this->view_display();
    }

    // INSERT: 会員情報登録
    public function screen_regist($auth = "") {
        $btn = "";
        $btn2 = "";
        $this->file = "memberinfo_form.tpl";

        // フォーム要素のデフォルト値を設定
        $date_defaults = [
            'Y' => date('Y'),
            'm' => date('m'),
            'd' => date('d'),
        ];

        $this->form->addDataSource(new HTML_QuickForm2_DataSource_Array(['birthday' => $date_defaults]));
        $this->make_form_controle();

        // フォームの妥当性検証
        if (!$this->form->validate()) {
            $this->action = "form";
        }

        if ($this->action == "form") {
            $this->title = '新規登録画面';
            $this->next_type = 'regist';
            $this->next_action = 'confirm';
            $btn = '確認画面へ';
        } else {
            if ($this->action == "confirm") {
                $this->title = '確認画面';
                $this->next_type = 'regist';     // hiddenタグに埋め込む
                $this->next_action = 'complete'; // hiddenタグに埋め込む
                $this->form->toggleFrozen(true); // toggleFrozen(true): 入力欄を消して入力値のみを表示する
                $btn = '登録する';
                $btn2 = '戻る';
            } else {
                if ($this->action == "complete" && isset($_POST['submit2']) && $_POST['submit2'] == '戻る') {
                    $this->title = '新規登録画面';
                    $this->next_type = 'regist';
                    $this->next_action = 'confirm';
                    $btn = '確認画面へ';
                } else {
                    if ($this->action == "complete" && isset($_POST['submit']) && $_POST['submit'] == '登録する') {
                        $PrememberModel = new PrememberModel();
                        $MemberModel = new MemberModel();

                        $userdata = $this->form->getValue();
                        if ($MemberModel->check_username($userdata) || $PrememberModel->check_username($userdata)) {
                            $this->title = '新規登録画面';
                            $this->message = "メールアドレスは登録済みです。";
                            $this->next_type = 'regist';
                            $this->next_action = 'confirm';
                            $btn = '確認画面へ';
                        } else {
                            // 管理者側から登録する場合に使用
                            if ($this->is_system && is_object($auth)) {
                                $userdata['password'] = $auth->get_hashed_password($userdata['password']);
                            } else {
                                $userdata['password'] = $this->auth->get_hashed_password($userdata['password']);
                            }
                            $userdata['birthday'] = sprintf("%04d%02d%02d",
                                $userdata['birthday']['Y'],
                                $userdata['birthday']['m'],
                                $userdata['birthday']['d']);
                            // memberテーブルにデータをINSERTする（登録完了）    
                            if ($this->is_system) { 
                                $MemberModel->regist_member($userdata);
                                $this->title = '登録完了画面';
                                $this->message = "登録を完了しました。";
                            // prememberテーブルにデータをINSERTする（データを一時的に登録して、メールを送信する）
                            } else {
                                // SHA256を使ってランダムなlink_passを生成
                                $userdata['link_pass'] = hash('sha256', uniqid(rand(), 1));
                                $PrememberModel->regist_premember($userdata);
                                $this->mail_to_premember($userdata);
                                $this->title = 'メール送信完了画面';
                                $this->message = "登録されたメールアドレスへ確認のためのメールを送信しました。<br>";
                                $this->message .= "メール本文に記載されているURLにアクセスして登録を完了してください。<br>";
                            }
                            $this->file = "message.tpl";
                        }
                    }
                }
            }
        }
        $this->form->addElement('submit', 'submit', ['value' =>$btn]);
        $this->form->addElement('submit', 'submit2', ['value' =>$btn2]);
        $this->form->addElement('reset', 'reset', ['value' =>'取り消し']);
        $this->view_display();
    }

    // UPDATE: 会員情報修正
    public function screen_modify($auth = "") {
        $btn = "";
        $btn2 = "";
        $this->file = "memberinfo_form.tpl";

        $MemberModel = new MemberModel();
        $PrememberModel = new PrememberModel(); 
        // 管理者側から登録データを確認する場合
        if ($this->is_system && $this->action == "form") {
            $_SESSION[_MEMBER_AUTHINFO] = $MemberModel->get_member_data_id($_GET['id']);
        }
        // フォーム要素のデフォルト値を設定
        $date_defaults = [
            'Y' => substr($_SESSION[_MEMBER_AUTHINFO]['birthday'], 0, 4),
            'm' => substr($_SESSION[_MEMBER_AUTHINFO]['birthday'], 4, 2),
            'd' => substr($_SESSION[_MEMBER_AUTHINFO]['birthday'], 6, 2),
        ];

        $this->form->addDataSource(new HTML_QuickForm2_DataSource_Array(
            [
                // セッション変数に格納していたそれぞれのパラメータを呼び出してセットする
                'username' => $_SESSION[_MEMBER_AUTHINFO]['username'],
                'last_name' => $_SESSION[_MEMBER_AUTHINFO]['last_name'],
                'first_name' => $_SESSION[_MEMBER_AUTHINFO]['first_name'],
                'ken' => $_SESSION[_MEMBER_AUTHINFO]['ken'],
                'birthday' => $date_defaults,
            ]
        ));

        $this->make_form_controle();

        // フォームの妥当性検証
        if (!$this->form->validate()) {
            $this->action = "form";
        }

        if ($this->action == "form") {
            $this->title = '更新画面';
            $this->next_type = 'modify';
            $this->next_action = 'confirm';
            $btn = '確認画面へ';
        } else {
            if ($this->action == "confirm") {
                $this->title = '確認画面';
                $this->next_type = 'modify';
                $this->next_action = 'complete';
                $this->form->toggleFrozen(true);
                $btn = '更新する';
                $btn2 = '戻る';
            } else {
                if ($this->action == "complete" && isset($_POST['submit2']) && $_POST['submit2'] == '戻る') {
                    $this->title = '更新画面';
                    $this->next_type = 'modify';
                    $this->next_action = 'confirm';
                    $btn = '確認画面へ';
                } else {
                    if ($this->action == "complete" && isset($_POST['submit']) && $_POST['submit'] == '更新する') {
                        $userdata = $this->form->getValue();
                        if( ($MemberModel->check_username($userdata) || $PrememberModel->check_username($userdata)) && ($_SESSION[_MEMBER_AUTHINFO]['username'] != $userdata['username']) ){
                            $this->next_type = 'modify';
                            $this->next_action = 'confirm';
                            $this->title = '更新画面';
                            $this->message = "メールアドレスは登録済みです。";
                            $btn = '確認画面へ';
                        } else {
                            $this->title = '更新完了画面';
                            $userdata['id'] = $_SESSION[_MEMBER_AUTHINFO]['id'];
                            // 管理者側から修正する場合に使用
                            if ($this->is_system && is_object($auth)) {
                                $userdata['password'] = $auth->get_hashed_password($userdata['password']);
                            } else {
                                $userdata['password'] = $this->auth->get_hashed_password($userdata['password']);
                            }
                            $userdata['birthday'] = sprintf("%04d%02d%02d",
                                $userdata['birthday']['Y'],
                                $userdata['birthday']['m'],
                                $userdata['birthday']['d']);
                            $MemberModel->modify_member($userdata); // テーブルの更新処理
                            $this->message = "会員情報を修正しました。";
                            $this->file = "message.tpl";
                            if ($this->is_system) {
                                // 管理者画面: 以降の処理では$_SESSION[_MEMBER_AUTHINFO]（ユーザ情報）は不要なので破棄する
                                unset($_SESSION[_MEMBER_AUTHINFO]);
                            } else {
                                // 会員は以降の処理でも自身のデータ$_SESSION[_MEMBER_AUTHINFO]を持ち回るため、更新情報をget_member_data_idメソッドによって再度取得して格納する
                                $_SESSION[_MEMBER_AUTHINFO] = $MemberModel->get_member_data_id($_SESSION[_MEMBER_AUTHINFO]['id']);
                            }
                        }
                    }
                }
            }
        }

        $this->form->addElement('submit', 'submit', ['value' =>$btn]);
        $this->form->addElement('submit', 'submit2', ['value' =>$btn2]);
        $this->form->addElement('reset', 'reset', ['value' =>'取り消し']);
        $this->view_display();
    }

    // DELETE: 会員情報削除
    public function screen_delete() {

        $MemberModel = new MemberModel();

        if ($this->action == "confirm") {
            if ($this->is_system) {
                $_SESSION[_MEMBER_AUTHINFO] = $MemberModel->get_member_data_id($_GET['id']);
                $this->message = "[削除する]をクリックすると　";
                $this->message .= htmlspecialchars($_SESSION[_MEMBER_AUTHINFO]['last_name'], ENT_QUOTES);
                $this->message .= htmlspecialchars($_SESSION[_MEMBER_AUTHINFO]['first_name'], ENT_QUOTES);
                $this->message .= "さん　の会員情報を削除します。";
                $this->form->addElement('submit', 'submit', ['value' => '削除する']);
            } else {
                $this->message = "[退会する]をクリックすると会員情報を削除して退会します。";
                $this->form->addElement('submit', 'submit', ['value' => '退会する']);
            }
            $this->next_type = 'delete';
            $this->next_action = 'complete';
            $this->title = '削除確認画面';
            $this->file = 'delete_form.tpl';
        } else {
            if ($this->action == "complete") {
                $MemberModel->delete_member($_SESSION[_MEMBER_AUTHINFO]['id']);
                if ($this->is_system) {
                    unset($_SESSION[_MEMBER_AUTHINFO]); // 管理者はセッションのみを破棄
                } else {
                    $this->auth->logout(); // 会員はAuthクラスのlogoutメソッドを使用して「セッション」と「クッキー」をすべて破壊する
                }
                $this->message = "会員情報を削除しました。";
                $this->title = '削除完了画面';
                $this->file = 'message.tpl';
            }
        }
        $this->view_display();
    }

    // 確認メールの送信処理
    public function mail_to_premember($userdata) {

        $path = pathinfo(_SCRIPT_NAME)['dirname'];
        //echo $path; // $path = /Bulletin-Board/htdocs

        // メールアドレス
        $to = $userdata['username']; 
        // 件名
        $subject = "会員登録の確認";   
        // 本文
        /**
         * $_SERVER['SERVER_NAME'] = localhost
         * $path = /Management_System/htdocs
         **/
        $message = 
        <<<EOM
            {$userdata['username']} 様

            会員登録ありがとうございます。
            下のリンクにアクセスして会員登録を完了してください。

            http://{$_SERVER['SERVER_NAME']}{$path}/premember.php?username={$userdata['username']}&link_pass={$userdata['link_pass']}

            このメールに覚えがない場合はメールを削除してください。
            なお、本メールは送信専用となっております。


            --
            会員システム
        EOM;

        $add_header = "";
        mb_send_mail($to, $subject, $message, $add_header); // mb_send_mailメソッドによってメールを送信する
    }
    
}
