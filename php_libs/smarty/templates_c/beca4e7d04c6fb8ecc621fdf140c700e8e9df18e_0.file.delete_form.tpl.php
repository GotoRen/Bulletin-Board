<?php
/* Smarty version 3.1.30, created on 2021-01-18 07:37:53
  from "/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/delete_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6004bc41dda422_12549977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'beca4e7d04c6fb8ecc621fdf140c700e8e9df18e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/delete_form.tpl',
      1 => 1599513803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6004bc41dda422_12549977 (Smarty_Internal_Template $_smarty_tpl) {
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
          <form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
		    <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

		    <br>
		    <br>
		    <?php echo $_smarty_tpl->tpl_vars['form']->value['submit']['html'];?>

		    <input type="hidden" name="type"   value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
		    <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
          </form>
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
