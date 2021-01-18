<?php
/* Smarty version 3.1.30, created on 2021-01-18 21:15:37
  from "/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60057be9658f87_51308071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89843b3d9ee1d48948aaf3fba949f33d368641e9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/login.tpl',
      1 => 1601688556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60057be9658f87_51308071 (Smarty_Internal_Template $_smarty_tpl) {
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
        <td>
	        <form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
          <table>
            <tr>
              <th>会員ページ:</th>
            </tr>
            <tr>
              <td><div style="text-align: right"><?php echo $_smarty_tpl->tpl_vars['form']->value['username']['label'];?>
:</div></td>
              <td><?php echo $_smarty_tpl->tpl_vars['form']->value['username']['html'];?>
</td>
            </tr>
	          <tr>
              <td><div style="text-align: right"><?php echo $_smarty_tpl->tpl_vars['form']->value['password']['label'];?>
:</div></td>
              <td><?php echo $_smarty_tpl->tpl_vars['form']->value['password']['html'];?>
</td>
            </tr>
            <tr>
              <td colspan="2" >
                <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
                <div style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['form']->value['submit']['html'];?>
</div>
		            <br>
                <div style="color:red; font-size: smaller;"><?php echo $_smarty_tpl->tpl_vars['auth_error_mess']->value;?>
</div>
              </td>
            </tr>
          </table>
	        </form>
        </td>
        <td>
          <p>会員の方はログインしてください。</p>
          <p><a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=regist&action=form">未登録の方はこちらから登録できます。</a></p>
        </td>
      </tr>
    </table>
</div>
<?php if (($_smarty_tpl->tpl_vars['debug_str']->value)) {?><pre><?php echo $_smarty_tpl->tpl_vars['debug_str']->value;?>
</pre><?php }?>
</body>
</html><?php }
}
