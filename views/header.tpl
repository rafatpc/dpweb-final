<!DOCTYPE html>
<html>
    <head>
        <title>{$layout['title']}</title>
        <link rel="shortcut icon" href="{$layout['baseurl']}{$layout['imgs']}favicon.ico">
        <link rel="stylesheet" href="{$layout['baseurl']}{$layout['css']}template.css" />
        <link rel="stylesheet" href="{$layout['baseurl']}{$layout['css']}styles.css" />
        <script type="text/javascript" src="{$layout['baseurl']}{$layout['js']}jquery.min.js"></script>
        <script type="text/javascript" src="{$layout['baseurl']}{$layout['js']}scripts.js"></script>
        <meta charset="utf-8" />
    </head>
    <body>
        <div id="wrapper">
            <header class="clearfix">
                <nav>
                    <ul class="gothic-regular">
                        {foreach from=$layout['navlinks'] key=k item=v}
                            <li>
                                <a href="{$layout['baseurl']}{$v}">{$k}</a>
                            </li>
                        {/foreach}
                    </ul>
                </nav>
                <div id="server-info" class="small-caps tiny">
                    GameServer<br />
                    <span class="online">{$layout['online']}</span> / <span class="offline">{$layout['limit']}</span>
                </div>
            </header>
            <div id="content-holder">
                <aside>
                    <div id="user-header"></div>
                    <div id="user">
                        {if $layout['sess']['dpw_user'] && $layout['sess']['dpw_pass']}
                            {include file="user/userpanel.tpl"}
                        {else}
                            {include file="user/loginform.tpl"}
                        {/if}
                    </div>
                    <div id="user-footer">
                        <img src="{$layout['baseurl']}{$layout['imgs']}login-footer.png" alt="Main Menu Header" />
                    </div>
                    <div id="main-menu" class="gothic-regular">
                        {foreach from=$layout['links'] key=k item=v}
                            <a href="{$layout['baseurl']}{$v}">{$k}</a>
                        {/foreach}
                    </div>
                    <div id="main-menu-footer">
                        <img src="{$layout['baseurl']}{$layout['imgs']}menu-footer.png" alt="Main Menu Footer" />
                    </div>
                    <div id="sub-menu-header">
                        <img src="{$layout['baseurl']}{$layout['imgs']}rss-header.png" alt="Sub Menu Header" />
                    </div>
                    <div id="sub-menu"></div>
                    <div id="sub-menu-footer">
                        <img src="{$layout['baseurl']}{$layout['imgs']}rss-footer.png" alt="Sub Menu Footer" />
                    </div>
                </aside>
                <section>
                    <div id="content-header" class="gothic-regular">
                        <h1>{$layout['servername']}</h1>
                    </div>
                    <div id="content">
                        {if $layout['errors']}
                            <div id="errors">
                                {foreach from=$layout['errors'] item=v}
                                    <div>{$v}</div>
                                {/foreach}
                            </div>
                        {/if}