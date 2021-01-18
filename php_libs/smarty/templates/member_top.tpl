<!DOCTYPE html>
<html lang="ja">

<head>
    <title>{$title}</title>
</head>

<body>
    <div style="text-align:center;">
        <hr>
        <strong>{$title}</strong>
        <hr>
    </div>
    <div style="text-align: left; margin-left: 5%;">
        <table>
            <tr>
                <td style="vertical-align: top;">
                    <!-- status -->
                    {$disp_login_state}
                    <!------------->
                    <br>
                    <br>
                    <!-- userinfo -->
                    {$last_name|escape:"html"} {$first_name|escape:"html"} さん、こんにちは！
                    <br>
                    <br>
                    <!--------------->
                </td>
                <td style="vertical-align: top;">
                    <div style="text-align: left; margin-left: 15px; padding-left: 50px; padding-right: 50px;">
                        <!-- message -->
                        <strong>{$message}</strong>
                        {if ($body)}
                            <div style="border: dashed 1px; padding: 10px;">
                                <div style="color:red; font-size:small; font-weight: bold;">お知らせ</div>
                                <div style="font-size: small; font-weight: bold;">
                                    {$reg_date|date_format:"%Y年%m月%d日"}&nbsp;{$subject|escape:"html"}</div>
                                <div style="font-size: small;">{$body|escape:"html"}</div>
                            </div>
                        {/if}
                        <!------------->
                    </div>
                </td>
                <td style="vertical-align:top;">
                    <div>
                        <!-- logout -->
                        [ <a href="{$SCRIPT_NAME}?type=logout">ログアウト</a> ]
                        <!------------>
                        <br>
                        <br>
                        <!-- fix-userinfo -->
                        <a href="{$SCRIPT_NAME}?type=modify&action=form">会員登録情報の修正</a>
                        <!------------------>
                        <br>
                        <br>
                        <!-- delete-user -->
                        <a href="{$SCRIPT_NAME}?type=delete&action=confirm">退会する</a>
                        <!----------------->
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <hr>

    <h1>Bulletin-Board</h1>

    {* 投稿処理 *}
    <form action="{$smarty.server.SCRIPT_NAME}" method="post">
        <table>
            <input type="hidden" name="name" size="30" value="{$last_name|escape:"html"} {$first_name|escape:"html"}">
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="title" size="50" required></td>
            </tr>
            <tr>
                <th>本文</th>
                <td colspan="2"><textarea name="body" cols="50 rows="5" required></textarea></td>
            </tr>
        </table>
        <input name="save" type="submit" value="投稿する">
    </form>

    <hr>

    {* 掲示板データの表示 *}
    {foreach from=$bbs_list item=bbs}
        <h2>{$bbs.title|escape}</h2>
        <p>{$bbs.date|date_format:"%Y年%m月%e日 %H:%M:%S"|escape} / 投稿者：<strong>{$bbs.name|escape}</strong></p>
        <p>{$bbs.body|escape|nl2br}</p>
    {/foreach}

    {if ($debug_str)}
    <pre>{$debug_str}</pre>{/if}
</body>

</html>