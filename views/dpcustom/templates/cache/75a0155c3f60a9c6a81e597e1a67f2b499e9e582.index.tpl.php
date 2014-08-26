<?php /*%%SmartyHeaderCode:1762653f8fd178bbbd5-20696074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75a0155c3f60a9c6a81e597e1a67f2b499e9e582' => 
    array (
      0 => '.\\dpcustom\\templates\\index.tpl',
      1 => 1408825208,
      2 => 'file',
    ),
    'de506f1459fca5b99bfba048f17d1d14d8f1e237' => 
    array (
      0 => '.\\dpcustom\\templates\\header.tpl',
      1 => 1408826339,
      2 => 'file',
    ),
    'aa945cd982dbba874ceba66b9d507621f77ef4f9' => 
    array (
      0 => '.\\dpcustom\\templates\\footer.tpl',
      1 => 1408826295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1762653f8fd178bbbd5-20696074',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53f8fd198c8579_03441475',
  'has_nocache_code' => false,
  'cache_lifetime' => 1,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f8fd198c8579_03441475')) {function content_53f8fd198c8579_03441475($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>DarkPowerMu - Season 3 Episode 1 MuOnline</title>
        <link rel="shortcut icon" href="./dpcustom/css/favicon.ico">
        <link rel="stylesheet" href="./dpcustom/images/styles.min.css" />
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
                        <img src="./dpcustom/css/login-footer.png" alt="Main Menu Header" />
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
                        <img src="./dpcustom/css/menu-footer.png" alt="Main Menu Footer" />
                    </div>
                    <div id="sub-menu-header">
                        <img src="./dpcustom/css/rss-header.png" alt="Sub Menu Header" />
                    </div>
                    <div id="sub-menu"></div>
                    <div id="sub-menu-footer">
                        <img src="./dpcustom/css/rss-footer.png" alt="Sub Menu Footer" />
                    </div>
                </aside>
                <section>
                    <div id="content-header" class="gothic-regular">
                        <h1></h1>
                    </div>
                    <div id="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla risus orci, convallis ut cursus ac,
                            finibus quis lorem. In viverra odio viverra odio hendrerit, sit amet vestibulum ligula pellentesque.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        </p>
                    </div>
                    <div id="content-footer">
                        <img src="./dpcustom/css/content-footer.png" alt="Content Footer" />
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>

<?php }} ?>
