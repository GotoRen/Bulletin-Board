<?php
/* Smarty version 3.1.30, created on 2020-09-05 16:20:51
  from "/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/member_top.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f533c53248062_20537940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '367a2c82a604cd3c2e7d4d4db05dcbbe6f64dc04' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/member_top.tpl',
      1 => 1599289500,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f533c53248062_20537940 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/libs/plugins/modifier.date_format.php';
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
    <table>
      <tr>
        <td style="vertical-align:top;">
          [ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=logout">ログアウト</a> ]
	        <br>
	        <br>
	        <?php echo $_smarty_tpl->tpl_vars['disp_login_state']->value;?>

        </td>
        <td style="vertical-align:top;">
          <div style="text-align: left; margin-left:15px;">
            <!-- 情報がある場合に通知枠を作成 -->
            <strong><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</strong>
            <?php if (($_smarty_tpl->tpl_vars['body']->value)) {?>              
              <div style="border: dashed 1px; padding: 10px;">
                <div style="color:red; font-size:small; font-weight: bold;">お知らせ</div>
                <div style="font-size: small; font-weight: bold;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reg_date']->value,"%Y年%m月%d日");?>
&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subject']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
                <div style="font-size: small;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['body']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
              </div>
            <?php }?>
            <br>
            <br>
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['last_name']->value, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['first_name']->value, ENT_QUOTES, 'UTF-8', true);?>
 さん、こんにちは！
            <br>
            <br>
	          <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=modify&action=form">会員登録情報の修正</a>
            <br>
            <br>
	          <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=delete&action=confirm">退会する</a>
            <br>
          </div>
        </td>
      </tr>
    </table>
</div>
<?php if (($_smarty_tpl->tpl_vars['debug_str']->value)) {?><pre><?php echo $_smarty_tpl->tpl_vars['debug_str']->value;?>
</pre><?php }?>
</body>
</html>
<?php }
}
