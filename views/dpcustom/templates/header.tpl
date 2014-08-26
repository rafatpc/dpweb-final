<!DOCTYPE html>
<html>
    <head>
        <title>{$title}</title>
        <link rel="shortcut icon" href="{$imgs}favicon.ico">
        <link rel="stylesheet" href="{$css}styles.min.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <div id="wrapper">
            <header class="clearfix">
                <nav>
                    <ul class="gothic-regular">
                        {foreach from=$navlinks key=k item=v}
                            <li>
                                <a href="{$v}">{$k}</a>
                            </li>
                        {/foreach}
                    </ul>
                </nav>
                <div id="server-info" class="small-caps tiny">
                    GameServer<br />
                    <span class="online">{$online}</span> / <span class="offline">{$limit}</span>
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
                        <img src="{$imgs}login-footer.png" alt="Main Menu Header" />
                    </div>
                    <div id="main-menu" class="gothic-regular">
                        {foreach from=$links key=k item=v}
                            <a href="{$v}">{$k}</a>
                        {/foreach}
                    </div>
                    <div id="main-menu-footer">
                        <img src="{$imgs}menu-footer.png" alt="Main Menu Footer" />
                    </div>
                    <div id="sub-menu-header">
                        <img src="{$imgs}rss-header.png" alt="Sub Menu Header" />
                    </div>
                    <div id="sub-menu"></div>
                    <div id="sub-menu-footer">
                        <img src="{$imgs}rss-footer.png" alt="Sub Menu Footer" />
                    </div>
                </aside>
                <section>
                    <div id="content-header" class="gothic-regular">
                        <h1>{$servername}</h1>
                    </div>
                    <div id="content">
                        {foreach from=$news key=k item=v}
                            <div class="news">
                                <h2>{$k}</h2>
                                <p>{$v}</p>
                            </div>
                        {/foreach}