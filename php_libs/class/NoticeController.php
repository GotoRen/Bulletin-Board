<?php

/**
 * Contents: NoticeController.php
 * Feature: 通知機能の操作
 * @author r0719en@pluslab.org
 */

class NoticeController extends BaseController {

    // 通知メッセージの修正
    public function screen_modify() {

        $NoticeModel = new NoticeModel;
        $noticedata = $NoticeModel->get_notice_data_id('1');
        
        // 通知メッセージのセット
        $this->form->addDataSource(new HTML_QuickForm2_DataSource_Array(
            [
                'subject'  => $noticedata['subject'],
                'body'     => $noticedata['body']
            ]
        ));
        $this->form->addElement('text',    'subject', ['size' => 50, 'maxlength' => 100 ], [ 'label' => '件名']);
        $this->form->addElement('textarea','body',    ['rows'=> 5, 'cols'=> 40], [ 'label' => '内容']);

        if ($this->action == "form") {
            $this->next_type    = 'notice';
            $this->next_action  = 'complete';
            $this->form->addElement('submit','submit', ['value' =>'更新する']);
            $this->message = "会員にお知らせする内容を編集";
            $this->file = "notice_form.tpl";
        } else if ($this->action == "complete") {
            $notice_data = $this->form->getValue();
            $notice_data['id'] = '1';
            $NoticeModel->modify_notice($notice_data);
            $this->message = "お知らせを更新しました。";
            $this->file = "message.tpl";
        }
        $this->title = 'お知らせ画面';
        $this->view_display();
    }    
    
}
