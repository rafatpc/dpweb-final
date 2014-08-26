<?php /* Smarty version Smarty-3.1.19, created on 2014-08-23 23:44:07
         compiled from ".\dpcustom\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2791553f8fd17954387-03886535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de506f1459fca5b99bfba048f17d1d14d8f1e237' => 
    array (
      0 => '.\\dpcustom\\templates\\header.tpl',
      1 => 1408826339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2791553f8fd17954387-03886535',
  'function' => 
  array (
  ),
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
    'servername' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f8fd179c5347_72243815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f8fd179c5347_72243815')) {function content_53f8fd179c5347_72243815($_smarty_tpl) {?><!DOCTYPE html>
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
login-footer.png" alt="Main Menu Header" />
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
menu-footer.png" alt="Main Menu Footer" />
                    </div>
                    <div id="sub-menu-header">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imgs']->value;?>
rss-header.png" alt="Sub Menu Header" />
                    </div>
                    <div id="sub-menu"></div>
                    <div id="sub-menu-footer">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imgs']->value;?>
rss-footer.png" alt="Sub Menu Footer" />
                    </div>
                </aside>
                <section>
                    <div id="content-header" class="gothic-regular">
                        <h1><?php echo $_smarty_tpl->tpl_vars['servername']->value;?>
</h1>
                    </div>
                    <div id="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla risus orci, convallis ut cursus ac,
                            finibus quis lorem. In viverra odio viverra odio hendrerit, sit amet vestibulum ligula pellentesque.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        </p><?php }} ?>
