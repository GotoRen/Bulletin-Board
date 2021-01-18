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
        <h1>Hello</h1>
        <hr>
    




    {if ($debug_str)}
    <pre>{$debug_str}</pre>{/if}
</body>

</html>