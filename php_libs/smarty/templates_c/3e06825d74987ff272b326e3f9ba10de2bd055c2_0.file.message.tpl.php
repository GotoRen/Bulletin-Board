<?php
/* Smarty version 3.1.30, created on 2020-09-05 16:28:31
  from "/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/message.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f533e1fefef50_12139325',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e06825d74987ff272b326e3f9ba10de2bd055c2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/message.tpl',
      1 => 1599290833,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f533e1fefef50_12139325 (Smarty_Internal_Template $_smarty_tpl) {
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
">トップページへ</a> ]
          <?php if (($_smarty_tpl->tpl_vars['is_system']->value)) {?>
          	<br>
          	<br>
            [ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=list&action=form<?php echo $_smarty_tpl->tpl_vars['add_pageID']->value;?>
">会員一覧</a> ]
          <?php }?>
	        <br>
	        <br>
	        <?php echo $_smarty_tpl->tpl_vars['disp_login_state']->value;?>

        </td>
        <td>
  		    <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

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
