<?php
/* Smarty version 3.1.30, created on 2021-01-18 20:01:49
  from "/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/member_top.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60056a9d18bdc9_51574913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52302ef8ad7821758b2e39be83a68841ea314c24' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/member_top.tpl',
      1 => 1610967579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60056a9d18bdc9_51574913 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/libs/plugins/modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>

<body>
    <div style="text-align:center;">
        <hr>
        <strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>
        <hr>
    </div>
    <div style="text-align: left; margin-left: 5%;">
        <table>
            <tr>
                <td style="vertical-align: top;">
                    <!-- status -->
                    <?php echo $_smarty_tpl->tpl_vars['disp_login_state']->value;?>

                    <!------------->
                    <br>
                    <br>
                    <!-- userinfo -->
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['last_name']->value, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['first_name']->value, ENT_QUOTES, 'UTF-8', true);?>
 さん、こんにちは！
                    <br>
                    <br>
                    <!--------------->
                </td>
                <td style="vertical-align: top;">
                    <div style="text-align: left; margin-left: 15px; padding-left: 50px; padding-right: 50px;">
                        <!-- message -->
                        <strong><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</strong>
                        <?php if (($_smarty_tpl->tpl_vars['body']->value)) {?>
                            <div style="border: dashed 1px; padding: 10px;">
                                <div style="color:red; font-size:small; font-weight: bold;">お知らせ</div>
                                <div style="font-size: small; font-weight: bold;">
                                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reg_date']->value,"%Y年%m月%d日");?>
&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subject']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
                                <div style="font-size: small;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['body']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
                            </div>
                        <?php }?>
                        <!------------->
                    </div>
                </td>
                <td style="vertical-align:top;">
                    <div>
                        <!-- logout -->
                        [ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=logout">ログアウト</a> ]
                        <!------------>
                        <br>
                        <br>
                        <!-- fix-userinfo -->
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=modify&action=form">会員登録情報の修正</a>
                        <!------------------>
                        <br>
                        <br>
                        <!-- delete-user -->
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=delete&action=confirm">退会する</a>
                        <!----------------->
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <hr>
    <h1>Hello</h1>
    <hr>
    <h1>サクッと掲示板（DB版）</h1>

    
    <?php if ($_smarty_tpl->tpl_vars['error_message']->value) {?>
        <ul class="error-message">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error_message']->value, 'message');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
?>
                <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </ul>
    <?php }?>

    <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post">
        <table>
            <tr>
                <th>投稿者名</th>
                <td><input type="text" name="name" size="30"></td>
            </tr>
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="title" size="50"></td>
            </tr>
            <tr>
                <th>本文</th>
                <td colspan="2"><textarea name="body" cols="50 rows=" 5"></textarea></td>
            </tr>
        </table>
        <input name="save" type="submit" value="投稿する">
    </form>

    <hr>

    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bbs_list']->value, 'bbs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bbs']->value) {
?>
        <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bbs']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
        <p><?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['bbs']->value['date'],"%Y年%m月%e日 %H:%M:%S"), ENT_QUOTES, 'UTF-8', true);?>
 / 投稿者：<strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bbs']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</strong></p>
        <p><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['bbs']->value['body'], ENT_QUOTES, 'UTF-8', true));?>
</p>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>






    <?php if (($_smarty_tpl->tpl_vars['debug_str']->value)) {?>
    <pre><?php echo $_smarty_tpl->tpl_vars['debug_str']->value;?>
</pre><?php }?>
</body>

</html><?php }
}
