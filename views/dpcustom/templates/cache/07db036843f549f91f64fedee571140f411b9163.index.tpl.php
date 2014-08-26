<?php /*%%SmartyHeaderCode:887053f8f77c2049e7-95454163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07db036843f549f91f64fedee571140f411b9163' => 
    array (
      0 => '.\\redesign\\templates\\index.tpl',
      1 => 1408825208,
      2 => 'file',
    ),
    '719567e46104cedef31b3ef436ccff4541fc5fc1' => 
    array (
      0 => '.\\redesign\\templates\\header.tpl',
      1 => 1408825694,
      2 => 'file',
    ),
    '573b9d13903cba6895129136a1ab02c7c9075ccc' => 
    array (
      0 => '.\\redesign\\templates\\footer.tpl',
      1 => 1408825259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '887053f8f77c2049e7-95454163',
  'cache_lifetime' => 1,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f8f9d4dd6f39_15552789',
  'has_nocache_code' => true,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f8f9d4dd6f39_15552789')) {function content_53f8f9d4dd6f39_15552789($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>DarkPowerMu - Season 3 Episode 1 MuOnline</title>
        <link rel="shortcut icon" href="./redesign/images/favicon.ico">
        <link rel="stylesheet" href="./redesign/css/styles.min.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <div id="wrapper">
            <header class="clearfix">
                <nav>
                    <ul class="gothic-regular">
                                                    <li>
                                <a href="#news">News</a>
                            </li>
                                                    <li>
                                <a href="#events">Events</a>
                            </li>
                                                    <li>
                                <a href="#hof">Hall of Fame</a>
                            </li>
                                            </ul>
                </nav>
                <div id="server-info" class="small-caps tiny">
                    GameServer<br />
                    <span class="online">20</span> / <span class="offline">200</span>
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
                        <img src="./redesign/images/login-footer.png" alt="Contet Footer" />
                    </div>
                    <div id="main-menu" class="gothic-regular">
                                                    <a href="#home">Home</a>
                                                    <a href="#reg">Register</a>
                                                    <a href="#ranks">Rankings</a>
                                                    <a href="#download">Download</a>
                                                    <a href="#cs">Castle Siege</a>
                                                    <a href="#market">Market</a>
                                            </div>
                    <div id="main-menu-footer">
                        <img src="./redesign/images/menu-footer.png" alt="Contet Footer" />
                    </div>
                    <div id="sub-menu-header">
                        <img src="./redesign/images/rss-header.png" alt="Contet Footer" />
                    </div>
                    <div id="sub-menu"></div>
                    <div id="sub-menu-footer">
                        <img src="./redesign/images/rss-footer.png" alt="Contet Footer" />
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
                        </p>
                    </div>
                    <div id="content-footer">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imgs']->value;?>
content-footer.png" alt="Contet Footer" />
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>

<?php }} ?>
