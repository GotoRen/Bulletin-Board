<?php
/* Smarty version 3.1.30, created on 2020-09-04 00:07:16
  from "/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/notice_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f5106a4b32bd4_71398040',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50d2fea811b734c29915488b4d2c4f2b0bd46e30' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/notice_form.tpl',
      1 => 1599145634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f5106a4b32bd4_71398040 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<?php echo '<script'; ?>
 type="text/javascript" src="js/quickform.js" async><?php echo '</script'; ?>
>
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
        </td>
        <td>
	        <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

          <form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
          <?php echo $_smarty_tpl->tpl_vars['form']->value['hidden'];?>

          <table>
            <tr>
              <!-- 件名 -->
              <td style="vertical-align:top; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['form']->value['subject']['label'];?>
：</td>
              <td style="text-align:left;">
                <?php if (isset($_smarty_tpl->tpl_vars['form']->value['subject']['error'])) {?>
                  <div style="color:red; font-size: smaller;"><?php echo $_smarty_tpl->tpl_vars['form']->value['subject']['error'];?>
</div>
                <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['form']->value['subject']['html'];?>

              </td>
            </tr>
            <tr>
              <!-- 内容 -->
              <td style="vertical-align:top; text-align:right;"><?php echo $_smarty_tpl->tpl_vars['form']->value['body']['label'];?>
：</td>
              <td style="text-align:left;">
                <?php if (isset($_smarty_tpl->tpl_vars['form']->value['body']['error'])) {?>
                  <div style="color:red; font-size: smaller;"><?php echo $_smarty_tpl->tpl_vars['form']->value['body']['error'];?>
</div><br>
                <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['form']->value['body']['html'];?>

              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>
                <?php echo $_smarty_tpl->tpl_vars['form']->value['submit']['html'];?>

                <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
                <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
              </td>
            </tr>
          </table>
          <br>
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
