<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SystemController
 *
 * @author nagatayorinobu
 */
class SystemController extends BaseController {
    //----------------------------------------------------
    // 管理者用メニュー
    //----------------------------------------------------
    public function run() {
        // セッション開始　認証に利用します。
        $this->auth = new Auth();
        $this->auth->set_authname(_SYSTEM_AUTHINFO);
        $this->auth->set_sessname(_SYSTEM_SESSNAME);
        $this->auth->start();

        if (!$this->auth->check() && $this->type != 'authenticate'){
            // 未認証
            $this->type = 'login';
        }
        
        // 共用のテンプレートなどをこのフラグで管理用に切り替えます。
        $this->is_system = true;

        // 会員側の画面を表示するためMemberControllerを利用する。
        $MemberController = new MemberController($this->is_system);
        // 通知機能を追加するためNoticeControllerを利用する。
        $NoticeController = new NoticeController();

        switch ($this->type) {
            case "login":
                $this->screen_login();
                break;
            case "logout":
                $this->auth->logout();
                $this->screen_login();
                break;
            case "modify":
                $MemberController->screen_modify($this->auth);
                break;
            case "delete":
                $MemberController->screen_delete();
                break;
            case "list":
                $this->screen_list();
                break;
            case "regist":
                $MemberController->screen_regist($this->auth);
                break;
            case "authenticate":
                $this->do_authenticate();
                break;
            case "notice":
                $NoticeController->screen_modify();
                break;
            default:
                $this->screen_top();
        }
    }

    //----------------------------------------------------
    // ログイン画面表示
    //----------------------------------------------------
    private function screen_login(){
        $this->form->addElement('text', 'username',     ['size' => 15, 'maxlength' => 50], [ 'label' => 'ユーザ名']);
        $this->form->addElement('password', 'password', ['size' => 15, 'maxlength' => 50], [ 'label' => 'パスワード']);
        $this->form->addElement('submit', 'submit', ['value' =>'ログイン']);
        $this->next_type = 'authenticate';
        $this->title = 'ログイン画面';
        $this->file = "system_login.tpl";
        $this->view_display();
    }
    
    public function do_authenticate(){
        // データベースを操作します。
        $SystemModel = new SystemModel();
        $userdata = $SystemModel->get_authinfo($_POST['username']);
        if(!empty($userdata['password']) && $this->auth->check_password($_POST['password'], $userdata['password'])){
            $this->auth->auth_ok($userdata);
            $this->screen_top();
        } else {
            $this->auth_error_mess = $this->auth->auth_no();
            $this->screen_login();
        }
    }    

    //----------------------------------------------------
    // トップ画面
    //----------------------------------------------------
    /*** Checked by Ren ***/
    private function screen_top(){
        unset($_SESSION['search_key']);
        unset($_SESSION[_MEMBER_AUTHINFO]);
        unset($_SESSION['pageID']);
        $this->title = '管理トップ画面';
        $this->file = 'system_top.tpl';
        $this->view_display();
    }    
    
    //----------------------------------------------------
    // 会員一覧画面
    //----------------------------------------------------
    /*** Checked by Ren ***/
    private function screen_list(){
        $disp_search_key = "";
        $sql_search_key = "";
        // セッション変数の処理
        unset($_SESSION[_MEMBER_AUTHINFO]);
        // 検索キーがあるかどうかを判定
        /* 検索キー有りで検索を実行 */
        if(isset($_POST['search_key']) && $_POST['search_key'] != ""){
            unset($_SESSION['pageID']);
            $_SESSION['search_key'] = $_POST['search_key']; // POSTされたsearch_keyをSESSIONに格納する
            $disp_search_key = htmlspecialchars($_POST['search_key'], ENT_QUOTES); // 入力された検索文字列
            $sql_search_key = $_POST['search_key']; // テーブル内で検索（後にMemberModel内のget_member_listメソッドを使用する）
        }else{
            /* 検索キー無しで検索を実行 */
            if(isset($_POST['submit']) && $_POST['submit'] == "検索する"){
                unset($_SESSION['search_key']); // 全データを表示するため検索キーを破棄する
            /* 検索キーが送信も保持もされない場合、最初の状態を保つ */
            }else{
                if(isset($_SESSION['search_key'])){
                    $disp_search_key = htmlspecialchars($_SESSION['search_key'], ENT_QUOTES); 
                    $sql_search_key = $_SESSION['search_key']; 
                }
            }
        }
        // データベースを操作します。
        $MemberModel = new MemberModel();
        list($data, $count) = $MemberModel->get_member_list($sql_search_key); // $data=会員情報一覧, $count=検索該当件数
        list($data, $links) = $this->make_page_link($data);
        //echo $data[0]['birthday'].'<br />';
        //echo $data[0]['reg_date'];

        $this->view->assign('count', $count);
        $this->view->assign('data', $data);
        $this->view->assign('search_key', $disp_search_key);
        $this->view->assign('links', $links['all']);
        $this->title = '管理 - 会員一覧画面';
        $this->file = 'system_list.tpl';
        $this->view_display();
    }    
}
