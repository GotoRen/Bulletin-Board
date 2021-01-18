<?php
/* Smarty version 3.1.30, created on 2021-01-18 06:48:54
  from "/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/system_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6004b0c63b57d6_15381280',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0d1a274662d54c0616b7f1da5e68a55f95eabda' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/Bulletin-Board/php_libs/smarty/templates/system_list.tpl',
      1 => 1599513803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6004b0c63b57d6_15381280 (Smarty_Internal_Template $_smarty_tpl) {
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
    <table>
      <tr>
      	<td style="vertical-align: top;">
	        [ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
">トップページへ</a> ]
	        <br>
	        <br>
	        <?php echo $_smarty_tpl->tpl_vars['disp_login_state']->value;?>

      	</td>
        <td>
          <p>[ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=regist&action=form<?php echo $_smarty_tpl->tpl_vars['add_pageID']->value;?>
">新規登録</a> ]
          <br>
          <form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
            名前：<input type="text" name="search_key" value="<?php echo $_smarty_tpl->tpl_vars['search_key']->value;?>
">
            <input type="submit" name="submit" value="検索する">
            <input type="hidden" name="type" value="list">
            <input type="hidden" name="action" value="form">
          </form>
          検索結果は<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
件です。<br>
          <br>
          <?php echo $_smarty_tpl->tpl_vars['links']->value;?>

          <?php if (($_smarty_tpl->tpl_vars['data']->value)) {?>
            <table border="1">
              <tbody>
                <tr>
                  <th>番号</th>
                  <th>氏</th>
                  <th>名</th>
                  <th>生年月日</th>
                  <th>県名</th>
                  <th>登録日</th>
                  <th></th>
                  <th></th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                  <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['last_name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                  <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['first_name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                  <td><?php echo smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['item']->value['birthday']),"%Y年%m月%d日");?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['item']->value['ken'];?>
</td>                                   
                  <td><?php echo smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['item']->value['reg_date']),"%Y年%m月%d日");?>
</td>
                  <!--<td><?php echo smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['item']->value['reg_date']),"%Y&#24180;%m&#26376;%d&#26085;");?>
</td>--> 
                  <td>[<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=modify&action=form&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];
echo $_smarty_tpl->tpl_vars['add_pageID']->value;?>
">更新</a>]</td>
                  <td>[<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=delete&action=confirm&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];
echo $_smarty_tpl->tpl_vars['add_pageID']->value;?>
">削除</a>]</td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

              </tbody>
            </table>
          <?php }?>
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
