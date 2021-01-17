<?php
/* Smarty version 3.1.30, created on 2020-09-04 03:59:05
  from "/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/system_top.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f513cf9c324d5_06038451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3eb580dbb6eefa37453d3536292450a7002dfa0a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/system_top.tpl',
      1 => 1599159362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f513cf9c324d5_06038451 (Smarty_Internal_Template $_smarty_tpl) {
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
        <td style="vertical-align: top;">
      	  [ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=logout">ログアウト</a> ]<br><br>
	        <?php echo $_smarty_tpl->tpl_vars['disp_login_state']->value;?>

        </td>
        <td>
          [ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=list&action=form">会員一覧</a> ]   会員の検索・更新・削除を行います。<br>
          [ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=notice&action=form">お知らせ</a> ]   会員トップページのお知らせを更新します。<br><br>
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
