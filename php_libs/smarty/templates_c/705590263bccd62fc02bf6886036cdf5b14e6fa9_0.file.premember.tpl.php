<?php
/* Smarty version 3.1.30, created on 2021-01-18 07:40:48
  from "/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/premember.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6004bcf0c75809_47277703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '705590263bccd62fc02bf6886036cdf5b14e6fa9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/premember.tpl',
      1 => 1599513803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6004bcf0c75809_47277703 (Smarty_Internal_Template $_smarty_tpl) {
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
