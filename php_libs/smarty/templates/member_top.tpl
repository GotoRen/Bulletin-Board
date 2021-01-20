<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>{$title}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../php_libs/smarty/templates/css/member_top.css">
</head>

<body>
    <div style="text-align:center; margin-bottom: 50px;">
        <hr class="line-type-a"> 
        <strong id="title">{$title}</strong>
        <hr class="line-type-a"> 
    </div>
    <div class="row">
        <div class="text-center col-md-4">
            <!-- status -->
            <p class="info">ステータス：{$disp_login_state}</p>
            <!------------->
            <!-- userinfo -->
            <p class="info">{$last_name|escape:"html"} {$first_name|escape:"html"} さん こんにちは！</p>
            <br>
            <br>
            <!--------------->
        </div>
        <div class="text-center col-md-4">
            <!-- message -->
            <strong>{$message}</strong>
            {if ($body)}
                <div style="background:#ced; border: dashed 1px; padding: 10px;">
                    <div style="color:red; font-size:small; font-weight: bold;">📝 お知らせ </div>
                    <div style="font-size: small; font-weight: bold;">
                        {$reg_date|date_format:"%Y年%m月%d日"}&nbsp;{$subject|escape:"html"}</div>
                    <div style="font-size: small;">{$body|escape:"html"}</div>
                </div>
            {/if}
            <!------------->
        </div>
        <div class="text-center col-md-1">
        </div>
        <div id="menu" class="text-left col-md-2">
            <!-- logout -->
            <a href="{$SCRIPT_NAME}?type=logout" class="btn btn-primary">ログアウト</a>
            <!------------>
            <br>
            <br>
            <!-- fix-userinfo -->
            <a href="{$SCRIPT_NAME}?type=modify&action=form" class="btn btn-warning">会員登録情報の修正</a>
            <!------------------>
            <br>
            <br>
            <!-- delete-user -->
            <a href="{$SCRIPT_NAME}?type=delete&action=confirm" class="btn btn-warning">退会する</a>
            <!----------------->
        </div>
    </div>
    <h3 class="text-center">🌱 Bulletin-Board 🌱</h1>
    <hr class="line-type-c">
    <div id="area" class="row">
        <div id="post-form" class="col-md-4">
            {* 投稿処理 *}
            <form action="{$smarty.server.SCRIPT_NAME}" method="post">
                <input type="hidden" name="name" value="{$last_name|escape:"html"} {$first_name|escape:"html"}">
                <p class="post">タイトル</p>
                <input type="text" name="title" size="40" required>
                <br><br>
                <p class="post">本文</p>
                <textarea name="body" cols="40" rows="8" required></textarea>
                <br>
                <br>
                <input name="save" type="submit" class="btn btn-primary" value="投稿する">
            </form>
        </div>
        <div id="content" class="col-md-7">
            {* 掲示板データの表示 *}
            {foreach from=$bbs_list item=bbs}
                <h5>🚀>> {$bbs.title|escape}</h5>
                <p class="name">{$bbs.date|date_format:"%Y年%m月%e日 %H:%M:%S"|escape} / 投稿者：<strong>{$bbs.name|escape}</strong>
                </p>
                <p class="text">{$bbs.body|escape|nl2br}</p>
                <hr class="line-type-b"> 
            {/foreach}
        </div>
    </div>
    {if ($debug_str)}
    <pre>{$debug_str}</pre>{/if}
    <div id="footer">
        <address>Copyright © 2021 K18039 Ren Goto. All Rights Reserved.</address>
    </div><!--footer-->
</body>

</html>