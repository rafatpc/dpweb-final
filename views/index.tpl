{include file="header.tpl"}
{include file=$viewFileTPL}

{if $sess['dpw_user']}
    Logged in!
{else}
    Not logged in!
{/if}

<div id='memory-used'>
    This website used {$usedMemory}MB RAM in total.
</div>
{include file="footer.tpl"}