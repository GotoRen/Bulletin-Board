<?php
/* Smarty version 3.1.30, created on 2020-09-02 00:17:39
  from "/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/premember.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f4e6613775ae2_04323146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10caa670e335ac011cca4a2be25c82b450cfb67a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/premember.tpl',
      1 => 1598957225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4e6613775ae2_04323146 (Smarty_Internal_Template $_smarty_tpl) {
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
        <td> <a href="index.php">トップページへ</a> </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
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
