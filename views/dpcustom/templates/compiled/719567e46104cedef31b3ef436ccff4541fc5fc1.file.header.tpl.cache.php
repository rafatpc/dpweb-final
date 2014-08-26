<?php /* Smarty version Smarty-3.1.19, created on 2014-08-23 23:28:16
         compiled from ".\redesign\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125553f8f77c41e4f1-78736682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '719567e46104cedef31b3ef436ccff4541fc5fc1' => 
    array (
      0 => '.\\redesign\\templates\\header.tpl',
      1 => 1408825694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125553f8f77c41e4f1-78736682',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f8f77c44c2e7_14227843',
  'variables' => 
  array (
    'title' => 0,
    'imgs' => 0,
    'css' => 0,
    'navlinks' => 0,
    'v' => 0,
    'k' => 0,
    'online' => 0,
    'limit' => 0,
    'links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f8f77c44c2e7_14227843')) {function content_53f8f77c44c2e7_14227843($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['imgs']->value;?>
favicon.ico">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
styles.min.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <div id="wrapper">
            <header class="clearfix">
                <nav>
                    <ul class="gothic-regular">
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['navlinks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <div id="server-info" class="small-caps tiny">
                    GameServer<br />
                    <span class="online"><?php echo $_smarty_tpl->tpl_vars['online']->value;?>
</span> / <span class="offline"><?php echo $_smarty_tpl->tpl_vars['limit']->value;?>
</span>
                </div>
            </header>
            <div id="content-holder">
                <aside>
                    <div id="user-header"></div>
                    <div id="user">
                        <div id="login-box">
                            <form method="post">
                                <div id="inputs">
                                    <input type="text" name="username" placeholder="Username" tabindex="1" />
                                    <input type="password" name="password" placeholder="Password" tabindex="2" />
                                </div>
                                <div id="submit">
                                    <input type="submit" name="login" value=""  tabindex="3" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="user-footer">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imgs']->value;?>
login-footer.png" alt="Contet Footer" />
                    </div>
                    <div id="main-menu" class="gothic-regular">
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</a>
                        <?php } ?>
                    </div>
                    <div id="main-menu-footer">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imgs']->value;?>
menu-footer.png" alt="Contet Footer" />
                    </div>
                    <div id="sub-menu-header">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imgs']->value;?>
rss-header.png" alt="Contet Footer" />
                    </div>
                    <div id="sub-menu"></div>
                    <div id="sub-menu-footer">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imgs']->value;?>
rss-footer.png" alt="Contet Footer" />
                    </div>
                </aside>
                <section>
                    <div id="content-header" class="gothic-regular">
                        <h1>Server Name</h1>
                    </div>
                    <div id="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla risus orci, convallis ut cursus ac,
                            finibus quis lorem. In viverra odio viverra odio hendrerit, sit amet vestibulum ligula pellentesque.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        </p><?php }} ?>
