<?php
/* Smarty version 3.1.30, created on 2020-09-01 05:08:53
  from "/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/testlogin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f4d58d569ba02_56818646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33d6cf39950684f1e2d5eebe9aa6170d7674922e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Management_System/php_libs/smarty/templates/testlogin.tpl',
      1 => 1498222872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4d58d569ba02_56818646 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['title']->value;?>

<form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
<?php echo $_smarty_tpl->tpl_vars['form']->value['username']['label'];?>
:<br>
<?php echo $_smarty_tpl->tpl_vars['form']->value['username']['html'];?>
<br>
<?php echo $_smarty_tpl->tpl_vars['form']->value['password']['label'];?>
:<br>
<?php echo $_smarty_tpl->tpl_vars['form']->value['password']['html'];?>

<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
<?php echo $_smarty_tpl->tpl_vars['form']->value['submit']['html'];?>

</form><?php }
}
